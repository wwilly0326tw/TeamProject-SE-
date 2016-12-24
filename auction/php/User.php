<?php
require("dbConnect.php");
if (!isset($_SESSION)){
	session_start();
}

function checkUser($name, $pwd) {
	global $conn;
	$name =mysqli_real_escape_string($conn,$name);
	$pwd =mysqli_real_escape_string($conn,$pwd);
	$sql = "SELECT playerid, pwd, money FROM player WHERE account ='$name'";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
			if ($row['pwd'] === $pwd) {
				updateMoney($name);
				return $row['playerid'];
			} 
		}
	}
	return false;
}

function registUser($name, $pwd){
	global $conn;

	if(isset($pwd) && isset($name) && $pwd != "" && $name != ""){
		$pwd =mysqli_real_escape_string($conn,$pwd);
		$name =mysqli_real_escape_string($conn,$name);
		$sql = "INSERT INTO player(account, pwd) VALUES ('$name', '$pwd')";
	
		if(mysqli_query($conn, $sql)){
			return true;
		} else {
			return false;
		}
	}
}

function updateMoney($name){
	global $conn;
	$sql = "SELECT money FROM player WHERE account ='$name'";
	$rel = mysqli_fetch_assoc(mysqli_query($conn, $sql));
	$_SESSION['money'] = $rel['money'];
	return;
}

?>
