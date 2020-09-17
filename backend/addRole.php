<?php 
include 'dbconnect.php';
$name=$_POST['role_name'];
$sql="INSERT INTO roles (name) VALUES (:role_name)";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':role_name',$name);
$stmt->execute();
if ($stmt->rowCount()) {
header("location:index.php");
}else{
	echo "Error";
}
?>