<?php
	if (!isset($_SESSION)){
		session_start();
	};
?>
<header>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/index.js"></script>
    <script src="js/DataUpdater.js"></script>
    <script src="js/DataViewer.js"></script>
</header>
<h1>Auction Platform - Hello 『<span><?php echo $_SESSION['name'];?>』</h1>
<a href='logout.php'>Logout</a><br/>
<a href='showInventory.php'>My Bag</a><br/>
<table class="dataViewer">
</table>
