<?php 

include  __DIR__.'/../config/config.php';
session_start();

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

            $_SESSION['email']=$email;
            return true;
       }
       else{
           return false;
       }
   
    }
}

function login($email,$password){
    global $pdo;

    if($pdo){
     
       $query='SELECT *from users where email=:email and password=:password';
       $statement=$pdo->prepare($query);
       $statement->execute([
           ':email'=>$email,
           ':password'=>$password,
       ]);
       $user=$statement->fetch();
      
       if(count($user)==0)
       {
           return false;
       }
       else{
           $_SESSION['email']=$email;
           $_SESSION['id']=$user['id'];
           return true;
       }
    }
}
