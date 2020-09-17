<?php  
include 'include/header.php';
include 'dbconnect.php';
?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800 text-center">Register</h1>
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
        <div class="form-group">
          <label>Status</label>
          <input type="number" name="user_status" class="form-control">
        </div>
        <div class="form-group">
          <label>Role</label>
          <select name="user_role" class="form-control">
            <option>Choose role...</option>
            <?php
            $sql="SELECT * FROM roles";
            $stmt=$pdo->prepare($sql);
            $stmt->execute();
            $roles=$stmt->fetchAll();
            foreach($roles as $role){

             ?>
             <option value="<?=$role['id']?>"><?=$role['name'] ?></option>
            <?php  
            } 
            ?> 
          </select>
        </div>
        <input type="submit" class="btn btn-outline-primary float-right mb-3" value="Save">
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php  
include 'include/footer.php';
?>
