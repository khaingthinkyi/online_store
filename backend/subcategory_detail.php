<?php 
session_start();
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) { 
include 'include/header.php';
include 'dbconnect.php';
$id=$_GET['subcategory_id'];
/*$sql="SELECT subcategories.*,categories.name as category_name FROM subcategories INNER JOIN categories ON subcategories.category_id=categories.id WHERE subcategories.id=:id";*/
$sql="SELECT * FROM subcategories"; 
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$subcategory=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Subcategory Detail</h1>
		<a href="subcategory_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward"></i>Go Back</a>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Subcategory Detail</h5>
		</div>
		<div class="card-body">
			<div class="row">
				
				<div class="col-md-8">
					<h5>NAME:<span class="text-dark"><?=$subcategory['name']?></span></h5>
					<h5>CATEGORY ID:<span class="text-dark"><?=$subcategory['category_id']?></span></h5>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
include 'include/footer.php';
}else{
  header("location:../index.php");
}
 ?>