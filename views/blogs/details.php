<?php

include '../../controllers/BlogController.php';

$error="";
$post;
$comments;
if(isset($_GET['id']) && !empty($_GET['id']))
  {
      $post=details($_GET['id']);
      $comments=getComments($_GET['id']);
  }
  else{
      header('location:index.php');
  }


  if(isset($_POST['comment']))
  {
      if(!empty($_POST['comment']))
      {
          comment($_POST['comment'],$_GET['id']);
         header('location:index.php');

      }
      else{
          $error='field missing';
      }
  }

?>

<?php include "../layouts/header.php" ?>



<div class="container mt-5">

    <div class="row">
        <div class="card col-md-8 mt-2" >
            <img src="../../public/images/<?php echo $post['photo'] ?>" class="card-img-top w-50" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $post['title'] ?></h5>
                <p class="card-text"><?php echo $post['content'] ?></p>
                <p class="card-text"><?php echo $post['name'] ?></p>
                <p class="card-text">published by : <?php echo $post['username'] ?></p>
               
            </div>
        </div>
    </div>
</div>


<div class="container">
    <?php if(isset($_SESSION['id'])): ?>
    <div class="row">
    <form action="" method="post" class="col-md-6 form-group" >

<?php if ($error != ''):?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
    </div>
<?php endif ?>
    <input type="text"  placeholder="comment.." name="comment" class="form-control mt-2">
     <button class="btn btn-dark mt-2 ">add</button>
</form>
    </div>
    <?php endif ?>

    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                <?php foreach($comments as $comment): ?>
                <li class="list-group-item">
                     <?php echo $comment['content'] ?>
                     <span class="fw-bold float-right">by : <?php echo $comment['name'] ?> </span>
                </li>
                <?php endforeach ?>
            </ul>

              
        </div>
    </div>
</div>
<?php include "../layouts/footer.php" ?>