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

function create($title,$content,$photo,$category_id){

    global $pdo;

    if($pdo)
     {
         $query='INSERT INTO posts(title,content,photo,category_id,user_id) values(:title,:content,:photo,:category_id,:user_id)';

         $statement=$pdo->prepare($query);

         $statement->execute([
             'title'=>$title,
             'content'=>$content,
             'photo'=>$photo,
             'category_id'=>$category_id,
             'user_id'=>1,
         ]);

        

     }
     
}



?>