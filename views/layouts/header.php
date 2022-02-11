
<?php

if(isset($_POST['logout']))
{
  session_destroy();
  header('location:index.php');
}

  ?>



<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Carousel Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/carousel/carousel.css" rel="stylesheet">
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Blog Manager</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home </a>
            </li>
            <?php if(isset($_SESSION['email']) && !empty($_SESSION['email'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="blogForm.php">create blog</a>
            </li>
            <?php endif ?>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          
          <?php if(isset($_SESSION['email']) && !empty($_SESSION['email'])): ?>
            <form method="post" action="" class="form-inline mt-2 mt-md-0 ml-2">
              <button name="logout" class="btn btn-outline-danger my-2 my-sm-0" type="submit">logout</button>
            </form>
          <?php endif ?>
          <?php if(!isset($_SESSION['email']) && empty($_SESSION['email'])): ?>
            <form method="get" action="../Auth/login.php" class="form-inline mt-2 mt-md-0 ml-2">
              <button  class="btn btn-outline-success my-2 my-sm-0" type="submit">login</button>
            </form>
          <?php endif ?>

        </div>
      </nav>
    </header>