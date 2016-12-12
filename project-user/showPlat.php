<?php
require("dbconnect.php");
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="a.css">
</head>
<body>
<h1>Hello <?php echo $_SESSION['name'] ?></h1>
<a href='logout.php'>登出</a><br/>
<a href='getbonus.php'>換獎金</a><br/>
<a href='showInventory.php'>卡片倉庫</a><br/>
<div id='DIV1'>
<table>
<tr>
<td>卡片名稱</td>
<td>數量</td>
<td>底價</td>
<td>現在價格</td>
<td>結標時間</td>
<td>目前買者</td>
<td>出價</td>
</tr>
<?php
global $conn;
$uID = $_SESSION['uID'];
$sql = "SELECT * FROM `products`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo '<tr><td>'.$row['cardid'].'</td>';
echo '<td>'.$row['count'].'</td><';
echo '<td>'.$row['reserve_price'].'</td>';
echo '<td>'.$row['deadline']. '</td>';
echo '<td>'.$row['buyerid']. '</td>';
echo '<td><a href=biding.php>出價</a></td></tr></table>';

?>

</div>
</body>
</html>