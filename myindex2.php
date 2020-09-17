<?php  
include 'include/header.php';
include 'backend/dbconnect.php';
$sql="SELECT items.*,brands.name as brand_name,subcategories.name as sub_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id LIMIT 8";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$items=$stmt->fetchAll();
/*var_dump($items);die();*/
?>
<!-- carousel -->
<div class="container-fluid p-0 mb-5" style="position: relative;top: 0;height: 100vh;width: 100%;margin: 0;">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100 h-100" src="images/w1.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100 h-100" src="images/w2.jpg" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100 h-100" src="images/w3.jpg" alt="Third slide">
			</div>
		</div>
		<!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a> -->
	</div>
</div>
<!-- end carousel -->
<!-- benifit -->
<div class="container-fluid bg-light">
	<div class="row py-3">
		<div class="col-12 col-md-3 text-center">
			<div class="icon" style="font-size: 50px;">
				<i class="fas fa-info-circle text-info"></i>			
			</div>
			<h5 class="text-uppercase text-secondary" style="font-weight: bold;">Help</h5>
			<p style="font-size: 15px;">Our support center is available 24/7 for your questions and concerns.</p>
		</div>
		<div class="col-12 col-md-3 text-center">
			<div class="icon" style="font-size: 50px;">
				<i class="fas fa-shield-alt text-info"></i>
			</div>
			<h5 class="text-uppercase text-secondary" style="font-weight: bold;">Security</h5>
			<p style="font-size: 15px;">Worry about nothing when you click to pay with Visa.</p>
		</div>
		<div class="col-12 col-md-3 text-center">
			<div class="icon" style="font-size: 50px;">
				<i class="fas fa-globe-europe text-info"></i>
			</div>
			<h5 class="text-uppercase text-secondary" style="font-weight: bold;">Acceptance</h5>
			<p style="font-size: 15px;">Shop for anything. From anywhere. Click to pay with Visa at millions of merchants online across the world</p>
		</div>
		<div class="col-12 col-md-3 text-center">
			<div class="icon" style="font-size: 50px;">
				<i class="fas fa-thumbs-up text-info"></i>
			</div>
			<h5 class="text-uppercase text-secondary" style="font-weight: bold;">Convenience</h5>
			<p style="font-size: 15px;">More time to play. Dinner in a snap. A new look. No matter what you crave, shopping online is fast and convenient when you click to pay with Visa.</p>
		</div>
	</div>
</div>
<!-- latest -->
<div class="container">
		<div class="row justify-content-center my-5">
			<div class="col-7 text-center">
				<h1 class="text-uppercase">Latest</h1>
				<hr>
			</div>
		</div>
	</div>
<div class="container" id="latest">
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="row">
					<?php foreach ($items as $item) {
						if($item['id']<5){?>
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
						<?php }}?>
					</div>
				</div>
			<div class="carousel-item">
				<div class="row">
					<?php foreach ($brands as $brand) {
						if($brand['id']<5){?>
							<div class="col-md-3 col-12 mb-md-4 mb-2">
								<div class="card shadow">
									<div class="card-img-top">
										<img src="backend/<?=$brand['logo']?>">
									</div>
									<div class="card-body">
										<h5 style="font-size: 20px;">
											<span style="font-size: 20px;" class="text-dark">Name:</span>
											<span class="text-secondary"><?=$brand['name']?></span>
										</h5>
										<p class="text-warning mb-1">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star-half-alt"></i>
										</p>
										<a href="javascript:void(0)" class="btn text-light addtocart" data-id="<?=$brand['id']?>" data-name="<?=$brand['name']?>" data-logo="<?=$brand['logo']?>" style="background-color: #F8A145;"><i class="fas fa-shopping-cart mr-2"></i>Add to Cart</a>
									</div>
								</div>
							</div>
						<?php }}?>
					</div>
				</div>	
			</div>
			<div class="carousel-item">
				<div class="row">
					<?php foreach ($items as $item) {
						if($item['id']<5){?>
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
						<?php }}?>
					</div>
				</div>	
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
	<!-- end latest -->
	<!-- end benifit -->
	<div class="container">
		<div class="row justify-content-center my-5">
			<div class="col-7 text-center">
				<h1 class="text-uppercase"> New Arrival</h1>
				<hr>
			</div>
		</div>
	</div>
	<!-- items  -->
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
	<!-- end items -->
	<!-- view more -->
	<div class="row mt-5">
		<div class="container text-center">
			<div class="col-12">
				<a href="product.php" class="btn btn-primary btn-lg" id="btn">View More</a>
			</div>
		</div>
	</div>
	<!-- end  -->
	<?php  
	include 'include/footer.php';
	?>