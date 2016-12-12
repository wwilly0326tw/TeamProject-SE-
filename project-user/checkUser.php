<?php
require("dbconnect.php");
session_start();

$uID = $_POST['id'];
$password = $_POST['pwd'];
$role=-1;

global $conn;
$uID =mysqli_real_escape_string($conn, $uID);
$sql = "SELECT * FROM `player` WHERE `account`='$uID'";

if ($result = mysqli_query($conn, $sql)) {
    if ($row = mysqli_fetch_assoc($result)) {
        if ($row['pwd'] == $password) {
            $_SESSION['uID']=$row['playerid'];
            $_SESSION['name']=$row['account'];
            header("Location: showPlat.php");
        } 
    }
} else {
    $_SESSION['uID'] = "";
	$_SESSION['role'] = -1;
	echo "Login failed.<br>";
	echo "<a href='index.php'>login</a>";
}
/*
if ( $role> -1 ) {
    //set login session mark
    $_SESSION['uID'] = $uID;
    header("Location: showPlat.php");
} else {
	//set login mark to empty
	$_SESSION['uID'] = "";
	$_SESSION['role'] = -1;
	echo "Login failed.<br>";
	echo "<a href='index.php'>login</a>";
}*/
?>