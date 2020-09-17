<?php
session_start();  
include 'backend/dbconnect.php';
$sql="SELECT * FROM subcategories";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$subcategories=$stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<!-- css -->
  <link rel="icon" href="images/banner.jpeg" type="image/gif" sizes="16x16">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css"  href="icofont/icofont.min.css">
  <link rel="stylesheet" type="text/css"  href="fontawesome/css/all.min.css">	
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand text-white" href="#" style="margin-right: 300px;">My Online Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-white" href="index.php">HOME<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="product.php">PRODUCTS</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="product.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CATEGORIES
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php  
        foreach ($subcategories as $subcategory) {
        	# code...
        
          ?>
          <a class="dropdown-item" href="category.php?id=<?=$subcategory['id']?>"><?=$subcategory['name']?></a>
          <?php } ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="about.php">ABOUT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="contact.php">CONTACT</a>
      </li>
      <?php 
      	if(isset($_SESSION['loginuser'])){
       ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=$_SESSION['loginuser']['name']?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="logout.php">LOGOUT</a>
          
        </div>
      </li>
  <?php } ?>
   <?php
      if(!isset($_SESSION['loginuser'])){
      	?>
      <li class="nav-item">
        <a class="nav-link text-white" href="login.php">LOGIN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="register.php">REGISTER</a>
      </li>
  		<?php } ?>
      <li class="nav-item"><a href="checkout.php" class="nav-link" id="count"><span class="p1 fa-stack has-badge" id="item_count"><i class="far fa-shopping-cart"></i></span></a></li>
      
    </ul>
  </div>
</nav>
			</div>
		</div>
		