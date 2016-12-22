<?php
	if (!isset($_SESSION)){
		session_start();
	};
?>
<html>
<head>
    <title>Auction Platform</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />
    <!--icon-->
    <link rel="Shortcut Icon" type="image/x-icon" href="img/www.png" />
    <!--css-->
    <!-- <link href="css/test.css" rel="stylesheet" type="text/css"/> -->
    <link href='http://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Mono' rel='stylesheet' type='text/css'>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/index.js"></script>
    <script src="js/DataUpdater.js"></script>
    <script src="js/DataViewer.js"></script>
</head>

<body>
<nav>
    <img src="img/platform.png" height="70px" />
    <ul class="fancyNav">
        <li id="home"><a href="showInventory.php" class="homeIcon">Home</a></li>            
        <li id="acution"><a href="auction.php">Auction</a></li>
        <li id="bonus"><a href="php/getbonus.php">Bonus</a></li>
        <li id="about"><a href="#about">About us</a></li>
        <li id="logout"><a href="logout.php">Logout</a></li>
    </ul>
</nav>
<h2 id="userInfo" align="right" id="name">
    <a id="username">User- <?php echo $_SESSION['name'] ?></a>
    <a id="cash" value=<?php echo $_SESSION['money']?>>CASH- $<?php echo $_SESSION['money']?></a>
</h2>
<img src="img/fukubag.png" height="50px" border="0">
<div class="lottery">
    <div id="left" style="margin-left: 35%;float:left"></div>
    <div id="right" style="margin-right: 34%;float:right"></div>
    <div id="center" style="margin-left:46%;margin-right:50%;"></div>
</div>
<table class="dataViewer" id="table1" width="1000" border="1" cellspacing="1" cellpadding="1" align="center">    
</table>
<hr>
<hr>
<br/>
<img src="img/list.png" width="250px" border="0">
<table class="dataViewer" id="table2" width="1000" border="1" cellspacing="1" cellpadding="1" align="center"></table>
</body>
</html>