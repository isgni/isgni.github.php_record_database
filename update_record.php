<?php session_start();
require("connection.php");
?>
<?php
//fetch the record to be updated 
if(isset($_GET['cid'])){
    $cid=$_GET['cid'];
    $q_cust=$mysqli->query("SELECT * FROM customer_tbl WHERE cid='$cid'");
    $r_cust=$q_cust->fetch_assoc();
}
?>
<!doctype html>
<html>
<head>
    <title>Update Record</title>
    <script type="text/javascript">
        function cancelChanges(){
            var con=confirm("Are you sure you want to cancel this update?");
            if (con){
                window.location="search_record.php";
            }
        }
    </script>
</head>
<body>
<form method="POST" action="">
    <h2>Update Record</h2>
    <table border="0" cellpadding="2" cellspacing="2" width="300">
        <tr>
            <td>First Name:</td>
            <td><input type="text" name="cfname" value="<?=$r_cust['cfname'];?>"/></td>
        </tr>

        <tr>
            <td>M.I.:</td>
            <td><input type="text" name="cmi" value="<?=$r_cust['cmi'];?>" size="1" maxlength="1"/></td>
        </tr>

        <tr>
            <td>Last Name:</td>
            <td><input type="text" name="clname" value="<?=$r_cust['clname'];?>"/></td>
        </tr>

        <tr>
            <td>Gender:</td>
            <td>
                <select name="gender">
                    <option value="<?=$r_cust['gender'];?>"><?=$r_cust['gender'];?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Contact No.:</td>
            <td><input type="text" name="contact_no" value="<?=$r_cust['contact_no'];?>"/></td>
        </tr>

        <tr>
            <td>Address:</td>
            <td><input type="text" name="address" value="<?=$r_cust['address'];?>"/></td>
        </tr>

        <td colspan="2" align="center">
            <input type="submit" name="save_changes" value="Save Changes"/>
            <input type="button" onclick="cancelChanges()" value="Cancel"/>
        </td>
    </table>
</form>

<?php
if (isset($_POST['save_changes'])){
    $cfname=$_POST['cfname'];
    $cmi=$_POST['cmi'];
    $clname=$_POST['clname'];
    $gender=$_POST['gender'];
    $contact_no=$_POST['contact_no'];
    $address=$_POST['address'];

    $s_update="UPDATE customer_tbl SET cfname='$cfname', cmi='$cmi', clname='$clname', gender='$gender', contact_no='$contact_no', address='$address' WHERE cid='$cid'";
    $q_update=$mysqli->query($s_update);

    if(!$q_update){
        echo $mysqli->error;
        exit();
    }elseif ($mysqli->affected_rows==0){
        echo "Update error.";
    }else{
        ?>
        <script type="text/javascript">
            alert("Record has been successfully updated.");
            window.location="<?=$_SERVER['REQUEST_URI'];?>";
        </script>
        <?php
    }
}
?>
</body>
</html>