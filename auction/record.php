<?php
	if (!isset($_SESSION)){
		session_start();
	};
?>
<html>
<head>
    <title>Auction Reocrd</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />
    <!--icon-->
    <link rel="Shortcut Icon" type="image/x-icon" href="img/www.png" />
    <!--css-->
    <!--<link href="css/test.css" rel="stylesheet" type="text/css"/>-->
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
    <img src="img/arecored.png" height="70px" />
    <ul class="fancyNav">
        <li id="home"><a href="showInventory.php" class="homeIcon">Home</a></li>            
        <li id="acution"><a href="auction.php">Auction</a></li>
        <li id="about"><a href="record.php">Record</a></li>
        <li id="bonus"><a href="php/getbonus.php">Bonus</a></li>
        <li id="logout"><a href="logout.php">Logout</a></li>
    </ul>
</nav>
<h1 id="userInfo" align="right">
    <img src="img/user.png" height="24px"><a id="username"><?php echo $_SESSION['name'];?></a>
    <img src="img/money.png" height="20px"><a id="cash"> $<?php echo $_SESSION['money'];?></a>
</h1>
<!--競標中清單-->
<img src="img/blist.png" height="65px" border="0">
<table class="dataViewer" id="table1" width="1000" border="1" cellspacing="1" cellpadding="1" align="center">    
</table>
<hr>
<hr>
<br/>
<!--得標清單-->
<img src="img/bwin.png" height="48px" border="0">
<table class="dataViewer" id="table2" width="1000" border="1" cellspacing="1" cellpadding="1" align="center"></table>
</body>
</html>