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
               create($_POST['title'],$_POST['content'],$_FILES['photo']['name'],$_POST['category_id']);
               $success="post was published successfully";


                //    file upload
               $path=$_FILES['photo']['tmp_name'];
               $destination='../../public/images/'.$_FILES['photo']['name'];
               move_uploaded_file($path,$destination);
           }
           else{
              $error = 'file should be in the range of (jpg,jpeg,png)';
           }
      }
      else{
        $error = 'filed missing';
      }

      
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
        
            <input type="text"  placeholder="title" name="title" class="form-control mt-2">
            <input type="text"  placeholder="content" name="content" class="form-control mt-2">
             <select name="category_id" id="" class="form-control mt-2">

                 <?php foreach($categories as $category): ?>
                 <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                 <?php endforeach ?>
             </select>
             <input name="photo" type="file" class="form-control mt-2">
             <button class="btn btn-dark mt-2 form-control">save</button>
        </form>
    </div>
</div>





<?php include "../layouts/footer.php" ?>