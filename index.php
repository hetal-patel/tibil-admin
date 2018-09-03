<?php 
	
	require 'views/common/header.php';
	
	require 'views/server/server.php';
	
 ?>
 <link rel="stylesheet" type="text/css" href="css/login.css">
 <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="img/tibil_logo.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="views/server/server.php?fn=login" method="POST">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="uname" class="form-control" placeholder="Username" required autofocus>
                <input type="password" name="pwd" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-success btn-block btn-signin" type="submit">Sign in </button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->

<?php require 'views/common/footer.php'; ?>