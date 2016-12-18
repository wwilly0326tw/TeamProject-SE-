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
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/index.js"></script>
    <script src="js/DataUpdater.js"></script>
    <script src="js/DataViewer.js"></script>
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

<img src="img/fudai.jpg" width="250px" border="0">
<table width="1000" border="1" cellspacing="1" cellpadding="1" align="center">
 <!--         <tr>
            <th>名稱</th>
            <th >數量</th>
            <th>金額</th>
            <th>購買</th>
         </tr>
         <tr align="center" id="row1" onMouseOver="changeColor('row1')" onMouseOut="resetColor('row1')">
            <td>福袋A</td>
            <td> 1 </td>
            <td> $300 </td>
            <th><input id="b" type="button" value="購買" onclick="run();" /></th>
         </tr> 
        <tr align="center" id="row2" onMouseOver="changeColor('row2')" onMouseOut="resetColor('row2')"> 
             <td>福袋B</td>
            <td> 1 </td>
            <td> $300 </td>
            <th><input id="b" type="button" value="購買" onclick="run();" /></th>
        </tr>
        <tr align="center" id="row3" onMouseOver="changeColor('row3')" onMouseOut="resetColor('row3')"> 
            <td>福袋C</td>
            <td> 1 </td>
            <td> $300 </td>
            <th><input id="b" type="button" value="購買" onclick="run();" /></th>

        </tr> -->
</table>
<hr>
<hr>
<img src="img/list.jpg" width=250px border="0">
<table class="dataViewer" width="1000" border="1" cellspacing="1" cellpadding="1" align="center"></table>
</body>
</html>