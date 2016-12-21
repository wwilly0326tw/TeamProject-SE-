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
<link rel="Shortcut Icon" type="image/x-icon" href="www.png" />
<!--css-->
<link href="test.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="wraper">
   <div id="banner">
    <img id="bannerimg" src="banner (Copy).png">
    </div>
	<div class="webname">
		<h1><span>Login</span></h1>
	</div>
    <div id="content">
        <form method="post" action="php/controller.php">
            <input type="hidden" name="act" value="login">
            <div><label><input class="input" type="text" size="30" name="name" placeholder="User name" /></label></div>
	        <div><label><input class="input" type="password" size="30" name="pwd" placeholder="Password" /></label></div>
			<div><button class="btn" type="submit" value="login">Login</button></div>
            <div><button class="btn" value="regist" onclick="location.href='regist.html'">To Regist</button></div>
        </form>
    </div>
</div>
</body>
</html>