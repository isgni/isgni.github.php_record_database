<?php seesion_start();
require("connection.php");
?>
<!doctype html>
<html>
	<head>
		<title>Add Record</title>
	</head>
	<body>
		<form method = "POST" action="">
			<h2>Add Record</h2>
			<!--
				<a href="add_record.php">Add Record</a>
				<a href="search_record.php">Search Record</a>
				User: <?=$ufname?> <?=$ulname?> [<a href="logout.php">Log out</a> ]
				<br/><br/>

					<form method="POST" action="">
			-->
			
			<table border = "0" cellpadding="2" cellspacing="2" width="300">
			
			<tr>
				<td>First Name:</td>
				<td><input type="text" name="cfname"/></td>
			</tr>
			
			<tr>
				<td>M.I>:</td>
				<td><input type="text" name="cmi" size="1" maxlength="1"/></td>
			</tr>
			
			<tr>
				<td>Last Name:</td>
				<td><input type="text" name="clname"/></td>
			</tr>
			
			<tr>
				<td>Gender:</td>
				<td>
					<select name="gender">
						<option value ="">Select Gender</option>
						<option value ="Male">Male</option>
						<option value = "Female">Female</option>
					</select> 
				</td>
			</tr>
			
			<tr>
				<td>Contact No.:</td>
				<td><input type="text" name="contact_no"/></td>
			</tr>
			
			<tr>
				<td>Address:</td>
				<td><input type="text" name="address"/></td>
			</tr>
			<td colspan="2" align="center">
				<input type="submit" name="save" value="Save Record"/>
				<input type="reset" value="Clear"/>
			</td>
			</table>

<?php
if(isset($_POST['save'])){
	$cfname=$_POST['cfname'];
	$cmi=$_POST['cmi'];
	$clname=$_POST['clname'];
	$gender=_POST['gender'];
	$contact_no=$_POST['contact_no'];
	$address=$_POST['address'];
	$s_save="INSERT INTO customer_tbl SET 
	cfname='$cfname', cmi='$cmi', clname='$clname', gender='$gender', contact_no='$contact_no', address='$address'";
	$q_save=$mysqli->query($s_save);
	if(!$q_save){
		echo $mysqli->error;
		exit();
	}elseif($mysqli->affected_rows==0){
		echo "Save error";
	}else{
		?>
		<script type="text/javascript">
			alert{"New record has been added."};
			window.location="add_record.php";
			</script>
			<?php
	}
}
?>
			</form>
		</body>
	</html>
				