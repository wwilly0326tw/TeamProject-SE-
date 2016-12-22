<?php
if (!isset($_SESSION)){
	session_start();
} else{
	header('Location: auction.php');
}
$_SESSION['playerID'] = "";
?>
<!DOCTYPE html>
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="Content-Style-Type" content="text/css">
<link href='http://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Mono' rel='stylesheet' type='text/css'>
<!--icon-->
<link rel="Shortcut Icon" type="image/x-icon" href="img/www.png" />
<!--css-->
<link href="css/index.css" rel="stylesheet" type="text/css"/>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/login.js"></script>
</head>
<body>
<div id="wraper">
   <div id="banner">
    <img id="bannerimg" src="img/b.png">
    </div>
	<div class="webname">
		<h1><span>Login</span></h1>
	</div>
    <div id="content">
        <div><label><input class="input" id="name" type="text" size="30" name="name" placeholder="User name" /></label></div>
        <div><label><input class="input" id="pwd" type="password" size="30" name="pwd" placeholder="Password" /></label></div>
		<div><button class="btn" onclick="login($('#name').val(), $('#pwd').val())" value="login">Login</button></div>
        <div><input class="btn" type='button' value="To Regist" onclick="location.href='regist.html'"></div>
    </div>
</div>
</body>
</html>