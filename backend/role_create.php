<?php  
include 'include/header.php';
?>
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800 text-center">Role Create</h1>
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form method="POST" action="addRole.php" enctype="multipart/form-data">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="role_name" class="form-control">
				</div>
				<input type="submit" class="btn btn-outline-primary float-right mb-3" value="Save">
			</form>
		</div>
	</div>
</div>
<?php  
include 'include/footer.php';
?>