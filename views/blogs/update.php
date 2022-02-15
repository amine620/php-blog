<?php
  include '../../controllers/BlogController.php';
  $categories=getCategories();
  $error="";
  $success="";
  $types=['image/jpeg','image/jpg','image/png'];


  if(!isset($_SESSION['email']) && empty($_SESSION['email']))
        {
        header('location:../Auth/login.php');
        }

  
  if(isset($_POST['title']) && isset($_POST['content']) && isset($_FILES['photo']['name']))
  {

      if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES['photo']['name']))
      {
           if(in_array($_FILES['photo']['type'],$types))
           {
               update($_POST['title'],$_POST['content'],$_FILES['photo']['name'],$_POST['category_id'],$_GET['id']);
              
                //    file upload
               $path=$_FILES['photo']['tmp_name'];
               $destination='../../public/images/'.$_FILES['photo']['name'];
               move_uploaded_file($path,$destination);

               header('location:index.php');

           }
           else{
              $error = 'file should be in the range of (jpg,jpeg,png)';
           }
      }
      else{
        $error = 'filed missing';
      }

      
  }


  $post;

  if(isset($_GET['id']) && !empty($_GET['id']))
  {
      $post=getOnePost($_GET['id']);
  }
  else{
      header('location:index.php');
  }

 ?>

<?php include "../layouts/header.php" ?>

<div class="container mt-5">
    <div class="row">
        <form action="" method="post" class="col-md-6 form-group offset-3" enctype="multipart/form-data">

        <?php if ($error != ''):?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div>
        <?php endif ?>

        <?php if ($success != ''):?>
            <div class="alert alert-success" role="alert">
                <?php echo $success ?>
            </div>
        <?php endif ?>
        
            <input value="<?php echo $post['title'] ?>" type="text"  placeholder="title" name="title" class="form-control mt-2">
            <input value="<?php echo $post['content'] ?>" type="text"  placeholder="content" name="content" class="form-control mt-2">
             <select name="category_id" id="" class="form-control mt-2">

                 <?php foreach($categories as $category): ?>
                 <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                 <?php endforeach ?>
             </select>
             <input name="photo" type="file" class="form-control mt-2">
             <div class="card col-md-8 mt-2" >
              <img src="../../public/images/<?php echo $post['photo'] ?>" class="card-img-top w-50" alt="...">
            </div>
             <button class="btn btn-warning mt-2 form-control">save</button>
        </form>
    </div>
</div>





<?php include "../layouts/footer.php" ?>