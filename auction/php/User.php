<?php
require("dbConnect.php");

function checkUser($name, $pwd) {
	global $conn;
	$name =mysqli_real_escape_string($conn,$name);
	$pwd =mysqli_real_escape_string($conn,$pwd);
	$sql = "SELECT playerid, pwd FROM player WHERE account ='$name'";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
			if ($row['pwd'] === $pwd) {
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

?>
