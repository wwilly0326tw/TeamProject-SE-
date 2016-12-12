<?php
//換獎金
require "dbconnect.php";
global $conn;
session_start();
$uid=$_SESSION['playerID']; //playerid
//$quantity=$_GET[]; //兌換獎金的數量
$bonus=1000; //獎金金額

$sql="select * from `cardbag` where `playerid`='$uid'";
$res=mysqli_query($conn, $sql) or die("db1 error");
$row=mysqli_fetch_assoc($res);
$array[]=$row['count'];

//數量均>0
if (in_array(0, $array)){
    echo "卡片不夠喔";
    header("Refresh: 1; url=../showInventory.php");
} else {
    //更新卡片數量 cardid:1到8都減1
    for ($i=1; $i<9; $i++){ 
        $sql2="update `cardbag` set `count`=count-1 where `cardid`='$i' and `playerid`='$uid'";
        mysqli_query($conn, $sql2) or die("db2 error");
    }

    // 取得player money
    $sql3="select * from `player` where `playerid`='$uid'";
    $res3=mysqli_query($conn, $sql3) or die("db3 error");
    $resp = mysqli_fetch_assoc($res3);
    $pmoney=(int)($resp['money']);
    $money = $pmoney + $bonus;
    
    //獎金加到player money
    $sql4="update `player` set `money`='$money' where `playerid`='$uid'";
    $res4=mysqli_query($conn, $sql4) or die("db4 error");

    if ($res3) {
        echo "獲得獎金 $".$bonus."元";
    }
    header("Refresh: 1; url=../showInventory.php");
}

?>