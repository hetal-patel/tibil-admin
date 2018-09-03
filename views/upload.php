<?php 
require "common/header.php";
require 'server/server.php';
require 'server/session.php';
upload();

?>

<link rel="stylesheet" type="text/css" href="\css/upload.css">
<div class="container"><!-- container -->
	<form action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">

		<div class="row p-top"><!-- row -->
			<img src="\img/tibil_logo.png" class="profile-img-card">

			<div>
				<h3 class="txt-center">Welcome <?php echo $_SESSION['login_user']; ?></h3> 
			</div>
			
			<div class="col-md-8 col-md-offset-2"><!-- col -->
				<div class="panel panel-default panel-body"><!-- pannel -->

					<div class="form-group">
						<label>Heading</label>
						<input type="text" class="form-control" name="heading" placeholder="Heading">
					</div>

					<div class="form-group">
						<label >Description</label>
						<textarea class="form-control" name="descrip" placeholder="Description"></textarea>
					</div>
					
						<div class="input-group form-group">
							<label class="input-group-btn">
								<div class="btn btn-primary btn-file">
									Browse <input type="file" name="f1" id="f1">
								</div>
							</label>
							<input type="text" id="file_name" class="form-control" readonly>
						</div>
					
					<button type="submit" class="btn btn-default form-group ">Submit</button>
					<a href="server/server.php?fn=logout" class="p-top">Log out</a>
				</div><!-- /pannel -->
			</div><!-- /col -->
		</div><!-- /row -->
	</form><!-- /form -->
</div><!-- /container -->
<script type="text/javascript" src="server/upload.js"></script>
<?php require  "common/footer.php"; ?>