<?php 
include 'include/header.php';
if (!isset($_SESSION['loginuser'])) {
  # code...
 ?>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800 text-center mt-5" style="color: blue;"><b>LOGIN FORM</b></h1>
  <div class="row" style="background: linear-gradient(0deg,rgba(6,12,34,0.8),rgba(6,12,34,0.8)),
  url(images/login5.jpeg) no-repeat;">
    <div class="offset-md-2 col-md-8">
      <form method="POST" action="signin.php" enctype="multipart/form-data">
        <div class="imgcontainer">
          <img src="images/img_avatar2.png" alt="Avatar" class="avatar"> 
        </div>
        <div class="container">
    <!-- <label for="uemail"><b>Email</b></label> -->
    <input type="email" placeholder="Enter Email" name="email" required>

    <!-- <label for="psw"><b>Password</b></label> -->
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
</div>
  </div>
</div>
</body>
</html>
<?php 
}else{
  header("location:index.php");
}
 ?>

  