<?php

include '../../controllers/BlogController.php';

$success="";
$post;
if(isset($_GET['id']) && !empty($_GET['id']))
  {
      $post=details($_GET['id']);
  }
  else{
      header('location:index.php');
  }


?>

<?php include "../layouts/header.php" ?>



<div class="container mt-5">

<?php if ($success != ''):?>
            <div class="alert alert-success" role="alert">
                <?php echo $success ?>
            </div>
<?php endif ?>

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


<?php include "../layouts/footer.php" ?>