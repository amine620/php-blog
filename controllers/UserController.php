<?php 

include  __DIR__.'/../config/config.php';


$pdo=conexion();


function register($name,$email,$password)
{
    global $pdo;

    if($pdo){
     
       $query='SELECT *from users where email=:email';
       $statement=$pdo->prepare($query);
       $statement->execute([
           ':email'=>$email,
       ]);

       $user=$statement->fetchAll();

    
       if(count($user)==0)
       {
           $query='INSERT INTO users(name,email,password) values(:name,:email,:password)';
            $statement=$pdo->prepare($query);
    
            $statement->execute([
                ':name'=>$name,
                ':email'=>$email,
                ':password'=>$password
            ]);
            return true;
       }
       else{
           return false;
       }
   




    }
}