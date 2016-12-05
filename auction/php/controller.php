<?php
require("User.php");
require("Item.php");

if (!isset($_SESSION)){
	session_start();
}

if(! isset($_POST["act"])) {
	exit(0);
}

$act = $_POST["act"];

switch($act) {
	case "login":
		$loginName = $_POST['name'];
		$password = $_POST['pwd'];
		$loginID = "";
		if ($loginID = checkUser($loginName, $password)) {
			//set login session mark
			$_SESSION['playerID'] = $loginID;
			$_SESSION['name'] = $loginName;
			header('Location: ../auction.php');
		} else {
			//set login mark to empty
			$_SESSION['playerID'] = "";
			echo "Invalid Username or Password - Please try again <br />";
			echo "Going to login page in 2 seconds... <br />";
			header('Refresh: 2;url=../index.html');
		}
		break;

	case "regist":
		$pwd = $_POST['pwd'];
		$name = $_POST['name'];
		$res = registUser($name, $pwd);
		if($res){
			echo "Regist successed. <br>";
			echo "<a href='../index.html'>Login</a>";
		} else{
			echo "failed <br>";
			echo "Going to regit page in 2 seconds... <br />";
			header('Refresh: 2;url=../regist.html');
		}
		break;

	case "getItem":
		checkItemOutOfDate();
		echo getItem();
		break;

	default:
}
?>
