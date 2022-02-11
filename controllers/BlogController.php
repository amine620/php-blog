<?php 

include  __DIR__.'/../config/config.php';
session_start();

$pdo=conexion();


function getCategories()
{
    global $pdo;

    if($pdo)
     {
         $query='SELECT *from categories';

         $statement=$pdo->prepare($query);

         $statement->execute();

         return $statement->fetchAll();

     }
}




?>