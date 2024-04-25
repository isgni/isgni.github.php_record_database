<?php session_start();
require("connection.php");
?>

<?php
//redirect to search_record.php if the user already logged in to the system
if (isset($_SESSION['session_status'])and$_SESSION['session_status']==1){
	?>
	<script type="text/javascript">
	window.location="search_record.php"
	</script>
	<?php
}
?>
<!doctype html>
<html>
	<head>
		<title>Log in</title>
	</head>
	<body>
		<form method="POST" action="">
		<h2>Log in<h2>
		Username: <input type="text" name="username"/>
		Password: <input type="password" name="password"/>
		<input type="submit" name="login" value="login"/>
		<br/>
<?php
if (isset($_POST['login'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	if (!empty($username) and !empty($password)){
		$q_login=$mysqli->query("SELECT uid, username, password FROM users_tbl WHERE username='$username' and password='$password'");
		if (!$q_login){
			echo $mysqli->error;
			exit();
		}elseif($q_login->num_rows==0){
			echo "Invalid Username or Password.";
		}else{
			$r_login=$q_login->fetch_assoc();
			//check the entered username and password is the same from the table users
	if ($r_login['username']==$username and $r_login['password']==$password){
			$_SESSION['uid']=$r_login['uid'];
			$_SESSION['session_status']=1;
			?>
			<script type="text/javascript">
			window.location="search_record.php";
			</script>
			<?php
			}
		}
	} 
}
?>
		</form>
	</body>
</form>