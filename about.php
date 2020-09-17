<?php  
include 'include/header.php';
include 'backend/dbconnect.php';
$sql="SELECT items.*,brands.name as brand_name,subcategories.name as sub_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id LIMIT 8";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$items=$stmt->fetchAll();
/*var_dump($items);die();*/
?>
<div id="banner" style="margin-top: 10px;">
			<div class="conteiner-fluid">
				<div class="row">
					<div class="col-12">
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row mt-5">
				<div class="col-12">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="images/tshirtcoursel.jpg" class="d-block w-100" alt="...">
							</div>
							<div class="carousel-item">
								<img src="images/shoecoursel3.jpg" class="d-block w-100" alt="...">
							</div>
							<div class="carousel-item">
								<img src="images/sweatercoursel.jpg" class="d-block w-100" alt="...">
							</div>
							<div class="carousel-item">
								<img src="images/shoecoursel2.jpg" class="d-block w-100" alt="...">
							</div>
							<div class="carousel-item">
								<img src="images/smartcoursel2.jpg" class="d-block w-100" alt="...">
							</div>
							<div class="carousel-item">
								<img src="images/hoodiescoursel.jpg" class="d-block w-100" alt="...">
							</div>
							<div class="carousel-item">
								<img src="images/watchcoursel2.jpg" class="d-block w-100" alt="...">
							</div>
							<div class="carousel-item">
								<img src="images/hoodiescoursel1.jpg" class="d-block w-100" alt="...">
							</div>
							<div class="carousel-item">
								<img src="images/applewatch1.jpeg" class="d-block w-100" alt="...">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>
		
<div class="container">
	<div class="row justify-content-center my-5">
		<div class="col-7 text-center">
			<h1 class="text-uppercase"> New Arrival</h1>
			<hr>
		</div>
	</div>
</div>
<div class="container" id="items">
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
	</div>
<div class="row mt-5">
	<div class="container text-center">
		<div class="col-12">
			<a href="product.php" class="btn btn-primary" id="btn">View More</a>
		</div>
	</div>
</div>
	
<?php  
include 'include/footer.php';
?>