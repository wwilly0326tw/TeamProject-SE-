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
			echo "Success";
		} else {
			//set login mark to empty
			$_SESSION['playerID'] = "";
			echo "Invalid Username or Password - Please try again <br />";
			// echo "Going to login page in 2 seconds... <br />";
			// header('Refresh: 2;url=../index.php');
		}
		break;

	case "regist":
		$pwd = $_POST['pwd'];
		$name = $_POST['name'];
		$res = registUser($name, $pwd);

		if($name == "" || $pwd == ""){
			echo "Please Input Username and Password.";
			break;
		}

		if($res){
			echo "Success";
		} else{
			echo "Account Duplicated.";
		}
		break;

	case "getItem":
		checkItemOutOfDate();
		updateMoney();
		echo getItem();
		break;

	case "bid":
		echo bidding($_POST['productID'], $_SESSION['playerID'], $_POST['price']);
		break;
		
	case "createPackage":
		creatPackage();
		break;

	case "lottery":
		$rel = doLottery($_SESSION['playerID'], $_POST['productID'], $_POST['price']);
		if ($rel == 1){
			echo "You don't have enough money.";
		} else{
			updateMoney();
			echo $rel;
		}
		break;
	default:
}
?>
