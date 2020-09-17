<?php  
include 'include/header.php';
include 'backend/dbconnect.php';
$sql="SELECT items.*,brands.name as brand_name,subcategories.name as sub_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$items=$stmt->fetchAll();
?>
<div class="container mt-5" id="items">
	<div class="row">
		<?php foreach ($items as $item) { ?>
			<div class="col-md-3 col-12 mb-md-4 mb-2">
				<div class="card shadow">
					<div class="card-img-top">
						<img src="backend/<?=$item['photo']?>">
					</div>
					<div class="card-body">
						<h5 style="font-size: 20px;">
							<span style="font-size: 20px;" class="text-dark">Name:</span>
							<span class="text-secondary"><?=$item['name']?></span>
						</h5>
						<p class="text-warning mb-1">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star-half-alt"></i>
						</p>
						<p style="font-size: 18px;" class="mb-1">
							<span class="text-dark">Price</span>
							<span><?php if($item['discount']){
									echo $item['discount'];
									?>
									<del><?=$item['price']?></del>
								<?php }else{
									echo $item['price'];
								} ?></span>
						</p>
						<p style="font-size: 18px;" class="mb-3">
							<span class="text-dark">CodeNo</span>
							<span class="text-danger" style="font-size: 15px;"><?=$item['codeno']?></span>
						</p>
						<a href="javascript:void(0)" class="btn text-light addtocart" data-id="<?=$item['id']?>" data-name="<?=$item['name']?>" data-photo="<?=$item['photo']?>" data-price="<?=$item['price']?>" data-discount="<?=$item['discount']?>" style="background-color: #F8A145;"><i class="fas fa-shopping-cart mr-2"></i>Add to Cart</a>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<div class="container-fluid mt-5">
<div class="row">
  <ul class="pagination" style="margin-left: auto; margin-right: auto;">
    <li class="page-item">
      <a class="page-link" href="index.php" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="category.php">1</a></li>
    <li class="page-item"><a class="page-link" href="about.php">2</a></li>
    <li class="page-item"><a class="page-link" href="contact.php">3</a></li>
    <li class="page-item"><a class="page-link" href="login.php">4</a></li>
    <li class="page-item"><a class="page-link" href="register.php">5</a></li>
    <li class="page-item">
      <a class="page-link" href="checkout.php" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</div>	
</div>	
<?php  
include 'include/footer.php';
?>