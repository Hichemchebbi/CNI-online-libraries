<?php
	$title = "Administration section";
	require_once "./template/header.php";
?>
	<div class="content">
      <?php if (isset($_GET['error'])) { ?>
      <div class="alert alert-danger" role="alert">
          <?=$_GET['error']?>
      </div>
      <?php } ?>
	<form class="form-horizontal" method="post" action="admin_verify.php">

		<div class="form-group">
			<label for="name" class="control-label col-md-4">Name</label>
			<div class="col-md-4">
				<input type="text" name="name" class="form-control" placeholder="UserName">
			</div>
		</div>
		<div class="form-group">
			<label for="pass" class="control-label col-md-4">Password</label>
			<div class="col-md-4">
				<input type="password" name="pass" class="form-control" placeholder="Password">
			</div>
		</div>
		<div style="margin-left: 39rem;">
		<button type="submit" class="btn btn-primary">Login</button>
		</div>
	</form>
	</div>
<?php
	require_once "./template/footer.php";
?>