<?php 
include 'dbconnect.php';
$name=$_POST['user_name'];
$email=$_POST['user_email'];
$password=$_POST['user_password'];
$phone=$_POST['user_phone'];
$role=$_POST['user_role'];
$address=$_POST['user_address'];
$status=$_POST['user_status'];
$profile=$_FILES['user_profile'];
$basepath="images/users/";//convert array to string,//to store place
$fullpath=$basepath.$profile['name'];//convert array to string//photo's name
move_uploaded_file($profile['tmp_name'], $fullpath);//convert array to string//add to place
//var_dump($name.$email.$password.$phone."this is role".$role.$address.$status);
// print_r($profile);die();
$sql="INSERT INTO users(name,profile,email,password,phone,address,status,role_id) VALUES(:user_name,:user_profile,:user_email,:user_password,:user_phone,:user_address,:user_status,:user_role)";//query code
$stmt=$pdo->prepare($sql);//data code
$stmt->bindParam(':user_name',$name);
$stmt->bindParam(':user_profile',$fullpath);
$stmt->bindParam(':user_email',$email);
$stmt->bindParam(':user_password',$password);
$stmt->bindParam(':user_phone',$phone);
$stmt->bindParam(':user_address',$address);
$stmt->bindParam(':user_status',$status);//data code
$stmt->bindParam(':user_role',$role);//item_sub=sql's name
$stmt->execute();//add to database
if ($stmt->rowCount()) {
header("location:index.php");
}else{
echo "Error";
}
?>