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
             'user_id'=>$_SESSION['id'],
         ]);

        

     }
     
}

function getPosts(){
    global $pdo;

    if($pdo)
     {
    $query='SELECT  posts.id as postId,user_id ,title,content,photo,users.name as username,categories.name from posts
     inner join users 
     on posts.user_id=users.id
     inner join categories
     on
     posts.category_id=categories.id
     ';
      $statement=$pdo->prepare($query);

      $statement->execute();

      return $statement->fetchAll();
     }
}

function delete($id)
{
    global $pdo;

    if($pdo)
     {
    $query='DELETE from posts where id=:id';

    $statement=$pdo->prepare($query);

    $statement->execute([
        ':id'=>$id
    ]);
     }

}

function search($word){
    global $pdo;

    if($pdo)
     {
    $query='SELECT  posts.id as postId,user_id ,title,content,photo,users.name as username,categories.name from posts
     inner join users 
     on posts.user_id=users.id
     inner join categories
     on
     posts.category_id=categories.id

     where posts.title like :title
      or 
      users.name like :name
      or 
      categories.name like :category_name
     ';
      $statement=$pdo->prepare($query);

      $statement->execute([
          ':title'=>"$word%",
          ':name'=>"$word%",
          ':category_name'=>"$word%",
      ]);

      return $statement->fetchAll();
     }
}

?>