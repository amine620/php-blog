<?php
  include '../../controllers/BlogController.php';

  $categories=getCategories()

 ?>


<?php include "../layouts/header.php" ?>
<div class="container mt-5">
    <div class="row">
        <form action="" method="post" class="col-md-6 form-group offset-3" enctype="multipart/form-data">
            <input type="text"  placeholder="title" name="title" class="form-control mt-2">
            <input type="text"  placeholder="content" name="content" class="form-control mt-2">
             <select name="category_id" id="" class="form-control mt-2">

                 <?php foreach($categories as $category): ?>
                 <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                 <?php endforeach ?>
             </select>
             <input type="file" class="form-control mt-2">
             <button class="btn btn-dark mt-2 form-control">save</button>
        </form>
    </div>
</div>





<?php include "../layouts/footer.php" ?>