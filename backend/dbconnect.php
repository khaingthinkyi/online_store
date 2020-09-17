<?php 
$servername="localhost";
$dbname="online_store";
$user="root";
$pass="";
$dsn="mysql:host=$servername;dbname=$dbname";
$pdo=new pdo($dsn,$user,$pass);
try{
$conn=$pdo;
$conn->setAttribute(pdo::ATTR_ERRMODE,pdo::ERRMODE_EXCEPTION);
//echo "Connection Successfully";
}catch(pdoexception $e){
echo "Server Error".$e->getMessage();
	}
 ?>

