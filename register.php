<?php 
include 'include/header.php'; 
include 'backend/dbconnect.php';
if (!isset($_SESSION['loginuser'])) {
?>
<!-- Begin Page Content -->
<div class="container-fluid mt-5" style="background-color: pink;">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800 text-center">REGISTER</h1>
  <div class="row">
    <div class="offset-md-2 col-md-8">
      <form method="POST" action="addUser.php" enctype="multipart/form-data">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="user_name" class="form-control">
        </div>
        <div class="form-group">
          <label>Profile</label>
          <input type="file" name="user_profile" class="form-control-file">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="user_email" class="form-control">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="user_password" class="form-control">
        </div>
        <div class="form-group">
          <label>Phone</label>
          <input type="text" name="user_phone" class="form-control">
        </div>
        <div class="form-group">
          <label>Address</label>
          <textarea class="form-control" name="user_address"></textarea>
        </div>
        <!-- <div class="form-group">
          <label>Status</label>
          <input type="number" name="user_status" class="form-control">
        </div> -->
        <input type="submit" class="btn btn-outline-primary float-right mb-3" value="Register"> 
        <div class="form-group">
          <label>Already a member?<a href="login.php">Sign in</a></label>
        </div>
        </div>
      </form>
    
  </div>

</div>
<?php 
}else{
  header("location:index.php");
}
 ?>
<!-- /.container-fluid -->

