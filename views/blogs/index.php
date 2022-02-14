<?php

include '../../controllers/BlogController.php';

$posts = getPosts();
$success="";

if(isset($_POST['id']) && !empty($_POST['id']))
{
    echo 'ok';
    delete($_POST['id']);
    header('location:index.php');
    $success="post was deleted successfully";
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

       <?php foreach($posts as $post): ?>
        <div class="card col-md-8 mt-2" >
            <img src="../../public/images/<?php echo $post['photo'] ?>" class="card-img-top w-50" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $post['title'] ?></h5>
                <p class="card-text"><?php echo $post['content'] ?></p>
                <p class="card-text"><?php echo $post['name'] ?></p>
                <p class="card-text">published by : <?php echo $post['username'] ?></p>
                <ul class="list-group">
                    <?php if(isset($_SESSION['id'])): ?>
                    <?php if($post['user_id']==$_SESSION['id']): ?>
                    <li class="list-group-item">
                        <form action="" method="post">
                    
                            <input name="id" type="hidden" value='<?php echo $post["postId"] ?>' >
                            <button class="btn btn-danger">delete</button>
                            <a href="#" class="btn btn-warning">edit</a>
                        </form>
                    </li>
                    <?php endif ?>
                    <?php endif ?>
                </ul>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>


<?php include "../layouts/footer.php" ?>