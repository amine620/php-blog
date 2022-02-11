<?php

include '../../controllers/BlogController.php';

$posts = getPosts();

?>

<?php include "../layouts/header.php" ?>



<div class="container mt-5">
    <div class="row">

       <?php foreach($posts as $post): ?>
        <div class="card col-md-8 mt-2" >
            <img src="../../public/images/<?php echo $post['photo'] ?>" class="card-img-top w-50" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $post['title'] ?></h5>
                <p class="card-text"><?php echo $post['content'] ?></p>
                <p class="card-text"><?php echo $post['name'] ?></p>
                <p class="card-text">published by : <?php echo $post['username'] ?></p>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>


<?php include "../layouts/footer.php" ?>