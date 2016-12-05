<?php
if (!isset($_SESSION)){
	session_start();
} else{
	header('Location: auction.html');
}
$_SESSION['playerID'] = "";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<h1>Login Form</h1><hr />
<form method="post" action="php/controller.php">
<input type="hidden" name="act" value="login">
User Name: <input type="text" name="name"><br />
Password : <input type="password" name="pwd"><br />
<input type="submit" value="login">
<input type="button" value="regist" onclick="location.href='regist.html'">
</form>