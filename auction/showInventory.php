<?php
require("php/dbconnect.php");
session_start();
?>
<html>

<head>
<title>Card Bag</title>
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});	
</script>
</head>

<body>
    <nav>
        <ul class="fancyNav">
            <li id="home"><a href="showInventory.php" class="homeIcon">Home</a></li>            
            <li id="acution"><a href="auction.php">Auction</a></li>
            <li id="bonus"><a href="php/getbonus.php">Bonus</a></li>
            <li id="about"><a href="#about">About us</a></li>
            <li id="logout"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
	<h2 align="right" id="name">
		User: <?php echo $_SESSION['name'] ?>  CASH: $<?php echo $_SESSION['money'] ?> 
	</h2>
<table class="dataViewer" width="1000" border="1" cellspacing="1" cellpadding="1" align="center">
    <th>Card</th>
    <th>Name</th>
    <th>Count</th>
    <th>Sell</th>
    <?php
		global $conn;
		$uid=$_SESSION['playerID'];
		// 取得player的card
		$sql="select * from cardbag, card where cardbag.playerid=$uid and card.cardid = cardbag.cardid";
		$res=mysqli_query($conn, $sql) or die("failed to get player's card");
		if($res) {
		    while($card=mysqli_fetch_assoc($res)) {
		        $cardnum=$card['count'];
		        $imgPath = "<a class='fancybox' rel='group' href='".$card['cardurl']."'><img width='80px' src='".$card['cardurl']."' alt='' /></a>";

		        echo "<tr><td>".$imgPath."</td>";
		        echo "<td><h3><u>".$card['name']."</u></h3></td>";
		        echo "<td><h3>".$card['count']."</h3></td>";
		        echo "<td><a href=\"sellform.php?cid=".$card['cardid']."\"><img src='./img/sell-icon.png' width='40' height='40'></a>";
		        echo "</td></tr>";
		    }
		}
	?>
</table>
</body>
</html>