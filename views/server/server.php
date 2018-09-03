
<?php 
	require 'config.php';
	

	if ($_GET['fn'] == 'login') {
		login();
	} else if ($_GET['fn'] == 'upload') {
		upload();
	}else if ($_GET['fn'] == 'logout') {
		logout();
	}


// login funtion
function login(){
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$username = $_POST['uname']; 
		$password = $_POST['pwd'];

		$str = "SELECT id FROM login.users WHERE username = '".$username."' AND password = '".$password."'";
		$result = pg_query($str);
		$row = pg_fetch_array($result);
		// $active = $row['active'];
		$count = pg_num_rows($result);

		if($count == 1){
			// session_register("username");
			$_SESSION['login_user'] = "$username";
			header("Location:/views/common/home.php");
		}
		else
		{
			$error = "Your Username or Password is Invalid";
			header("Location:\index.php");
		}
	}

}



// To upload file
function upload(){
	
	if (isset($_POST['submit1'])) {
		$fnm = $_FILES["f1"]["name"];
		$fsz = $_FILES["f1"]["size"];
		$t = time();
		$dst = "/home/hetal/Pictures/" .$t .$fnm;
		$file_ext = strtolower(end(explode('.',$_FILES["f1"]["name"])));
		if($file_ext != "jepg" && $file_ext != "jpg" && $file_ext != "png" && $file_ext != "zip") {

			echo "<h5 class='txt-center txt-color'>Extension not allowed, please choose a JPEG or PNG or ZIP file.</h5>";

			$uploadOk = 0;
		}

		else if(move_uploaded_file($_FILES["f1"]["tmp_name"], $dst)){
			echo "<h4 class='txt-center txt-color'>Successfully Uploaded</h4>";
		}else{
			echo "Not able to upload";
		}
	}
}

// logout function
function logout(){
	session_start();
	if(session_destroy()){

		header("Location: \index.php"); 
	}
}

?>