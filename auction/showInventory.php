<?php
require("php/dbconnect.php");
session_start();
?>
<html>
<head>
</head>
<body>
<h1>Hello <?php echo $_SESSION['name'] ?></h1>
<a href='logout.php'>登出</a><br/>
<a href='php/getbonus.php'>換獎金</a><br/>
<a href='auction.php'>拍賣平台</a><br/>
<table>
<tr><td>CARDID</td><td>CARD number</td><td>賣出</td></tr>
<?php
global $conn;
$uid=$_SESSION['playerID'];
//取得player的card
$sql="select * from `cardbag` where `playerid`='$uid'";
$res=mysqli_query($conn, $sql) or die("failed to get player's card");
if($res) {
    while($card=mysqli_fetch_assoc($res)) {
        $cid=$card['cardid'];
        $cardnum=$card['count'];
        echo "<tr><td>".$cid."</td>";
        echo "<td>".$cardnum."</td>";
        echo "<td><a href=\"sellform.php?cid=".$cid."\">sell</a>";
        echo "</td></tr>";
    }
}
?>
</table>
</body>
</html>