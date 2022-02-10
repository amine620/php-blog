<?php 


const ROOT="mysql:dbname=db_blog;host=localhost;port=3306";
const USERNAME='root';
const PASSWORD="";

function conexion()
{
   try {
       return  new PDO(ROOT,USERNAME,PASSWORD);

   } catch (PDOException $ex) {

         return false;
   }
}
