<?php
$host="localhost"; //host name
$user="root"; //username
$password=""; //empty if password is not applied 
$db_name="project_db";//database name

$mysqli=new mysqli($host, $user, $password, $db_name);
if ($mysqli -> connect_error ){
			die("Connection failed: " .$mysqli->connect_error);
}
?>