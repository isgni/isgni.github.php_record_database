<?php session_start();
require("connection.php");
?>
<!doctype html>
<html>
	<head>
		<title>Search Record</title>
	</head>
	<body>
		<form method="POST" action="">
		<h2>Search Record</h2>
		
		<!--
				<a href="add_record.php">Add Record</a>
				<a href="search_record.php">Search Record</a>
				User: <?=$ufname?> <?=$ulname?> [<a href="logout.php">Log out</a> ]
				<br/><br/>

					<form method="POST" action="">
			-->
			
		Search: <input type="text" name="srch_val"/>
		<input type="submit" name ="search" value="Search"/>
		<br/>
		<br/>
<?php
if (isset($_POST['search'])){
	$srch_val=$_POST['srch_val'];
	if(!empty($srch_val)){
		$s_srch="SELECT * FROM customer_tbl WHERE cfname='$srch_val' OR clname='$srch_val'";
		$q_srch=$mysqli->query($s_srch);
		if(!$q_srch){
			echo $mysqli->error;
			exit();
		}elseif($q_srch->num_rows==0){
			echo "No record found.";
		}else{
			?>
			<table border cellpadding="3" width="700" style="border-collapse: collapse;">
			<tr>
				<th width="20">#</th>
				<th>Name</th>
				<th width"70">Gender</th>
				<th width="120">Contact No.</th>
				<th width="110">Address</th>
				<th width="70"></th>
				<th width="70"></th>
			</tr>
			
			<?php
			$cnt=1;
			while($r_srch=$q_srch->fetch_assoc()){
				?>
					<tr>
						<td align="right"><?=$cnt++;?>.</td>
						<td><?=$r_srch['clname'];?>, <?=$r_srch['cfname'];?> <?=$r_srch['cmi'];?>.</td>
						<td><?=$r_srch['gender'];?></td>
						<td><?=$r_srch['contact_no'];?></td>
						<td><?=$r_srch['address'];?></td>
						<td align="center">
							<a href="update_record.php?cid=<?=$r_srch['cid']?>">Update</a>
						</td>
						<td align="center">
							<a href="delete_record.php?cid=<?=$r_srch['cid']?>&con=delete">Remove</a>
						</td>
					</tr>
					<?php		
			}
			?>
			</table>
			<?php
		}
	}
}
?>
		</form>
	</body>
</html>