<?php
//賣卡片
require "dbconnect.php";
global $conn;
session_start();
$uid=$_SESSION['playerID']; //player id
$cardid=$_POST['cid']; //要賣的卡片id
$num=$_POST['number']; //要賣的數量
$price=$_POST['price']; //底價
$deadline=$_POST['deadline'];

//select //要賣的那張卡片id
$sql="select * from `cardbag` where `playerid`='$uid' and `cardid`=$cardid";
$res=mysqli_fetch_assoc(mysqli_query($conn, $sql));
$number=(int)($res['count']);

if ($number >= $num) { //擁有卡片>賣出
    $count = $number - $num; //扣掉賣掉的數量

    //update倉庫card中數量
    $sql2="update `cardbag` set `count`='$count' where `playerid`='$uid' and `cardid`='$cardid'";
    mysqli_query($conn, $sql2) or die ("update count error");

    //insert到拍賣品
    $sql3="insert into `products`(cardid, sellerid, count, reserve_price, current_price, deadline) values($cardid, $uid, $num, $price, $price, '$deadline')";
    mysqli_query($conn, $sql3) or die ("insert products error");

    echo '<meta http-equiv=REFRESH CONTENT=0;url=../auction.php>';
} else {
    echo "卡片不夠";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=../showInventory.php>';
}
?>