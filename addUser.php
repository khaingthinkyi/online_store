<?php 
include 'backend/dbconnect.php'; 
$name=$_POST['user_name'];
$email=$_POST['user_email'];
$password=$_POST['user_password'];
$phone=$_POST['user_phone'];
$status=1;
$address=$_POST['user_address'];
$role_id=1;
$profile=$_FILES['user_profile'];
$basepath="backend/images/users/";//convert array to string,//to store place
$fullpath=$basepath.$profile['name'];//convert array to string//photo's name
move_uploaded_file($profile['tmp_name'], $fullpath);//convert array to string//add to place
$sql="INSERT INTO users(name,profile,email,password,phone,address,role_id) VALUES(:user_name,:user_profile,:user_email,:user_password,:user_phone,:user_address,:role_id)";//query code
$stmt=$pdo->prepare($sql);//data code
$stmt->bindParam(':user_name',$name);
$stmt->bindParam(':user_profile',$fullpath);
$stmt->bindParam(':user_email',$email);
$stmt->bindParam(':user_password',$password);
$stmt->bindParam(':user_phone',$phone);
$stmt->bindParam(':user_address',$address);
//$stmt->bindParam(':status',$status);//data code
$stmt->bindParam(':role_id',$role_id);//item_sub=sql's name
$stmt->execute();//add to database
if ($stmt->rowCount()) {
header("location:index.php");
}else{
echo "Error";
}
?>