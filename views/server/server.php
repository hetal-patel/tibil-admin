
<?php 
require 'config.php';


if ($_GET['fn'] == 'login') {
	login();
} else if ($_GET['fn'] == 'upload') {
	upload();
}else if ($_GET['fn'] == 'logout') {
	logout();
}else if ($_GET['fn'] == 'download') {
	
	download($_GET['file_path']);

}


// login funtion
function login(){
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$username = $_POST['uname']; 
		$password = md5($_POST['pwd']);
		

		// $str = "SELECT id FROM login.users WHERE username = '".$username."' AND password = '".$password."'";
		$str = "SELECT * FROM login.users WHERE username = '".$username."'";
		$result = pg_query($str);
		$row = pg_fetch_array($result);

		$count = pg_num_rows($result);
		// echo $count;
		if($count == 1){
        	// echo $row['password'];
			if($password == $row['password']){
				$_SESSION['login_type'] = $row['user_type'];
				$_SESSION['login_user'] = "$username";
				header("Location:/views/common/home.php");
			}else{
				echo "Your Username or Password is Invalid";
				header("Location:\index.php");
			}
		}
	}
}


// To upload file
function upload(){
	
	if (isset($_POST['submit1'])) {
		$_SESSION['flash1'] = "Extension not allowed, please choose a JPEG or PNG or ZIP file.";
		$_SESSION['flash2'] = "Successfully Uploaded";
		$fnm = $_FILES["f1"]["name"];
		$fsz = $_FILES["f1"]["size"];
		$t = time();
		$date=date('d.m.y h:i:s');
		$dst = "/home/hetal/Pictures/" .$t .$fnm;
		$file_ext = strtolower(end(explode('.',$_FILES["f1"]["name"])));

		$str = "INSERT INTO login.files VALUES('$_POST[head]','$_POST[descrip]','$fnm','$file_ext','$dst','$date')";
		$dbcon = pg_query($str);

		if($file_ext != "jepg" && $file_ext != "jpg" && $file_ext != "png" && $file_ext != "zip") {
			 
		}else if(move_uploaded_file($_FILES["f1"]["tmp_name"], $dst)){
			
		}else{
			echo "Not able to upload";
		}
	}
}

// to download file
function download($file_path){

	if(file_exists($file_path)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file_path));
		flush();
		readfile($file_path);
		exit;
	}
}


// to view file
function view()
{
	$result = pg_query( "SELECT * FROM login.files ORDER BY date DESC");

	while ($row = pg_fetch_array($result)) {

		echo "<tr>";
		echo "<td>" . $row['heading'] . "</td>";
		echo "<td>" . $row['descrip'] . "</td>";
		echo "<td>" . $row['file_name'] . "</td>";
		echo "<td>" . $row['file_type'] . "</td>";
		echo "<td>" . $row['date'] . "</td>";
		echo "<td><a href ='/views/server/server.php?fn=download&file_path=".$row['file_path']."'</a> <span class='glyphicon glyphicon-download' aria-hidden='true'></td>";
		echo "</tr>";
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