<?php
//換獎金
require "dbconnect.php";
global $conn;
session_start();
$uid=$_SESSION['uID']; //playerid
$set=$_POST['number']; //兌換獎金的數量
$bonus=1000; //獎金金額

//查詢每種卡片張數
$sql_c1 = "select * from `cardbag` where `playerid`='$uid' and `cardid`='1'";
$resc1=mysqli_query($conn, $sql_c1) or die ("get card 1 error.");
$card1=mysqli_fetch_assoc($resc1);
 
$sql_c2 = "select * from `cardbag` where (`playerid`='$uid' and `cardid`='2')";
$resc2=mysqli_query($conn,$sql_c2) or die("get card 2 error.");
$card2=mysqli_fetch_assoc($resc2);

$sql_c3 = "select * from `cardbag` where `playerid`='$uid' and `cardid`='3'";
$resc3=mysqli_query($conn,$sql_c3) or die("get card 3 error.");
$card3=mysqli_fetch_assoc($resc3);

$sql_c4 = "select * from `cardbag` where `playerid`='$uid' and `cardid`='4'";
$resc4=mysqli_query($conn,$sql_c4) or die("get card 4 error.");
$card4=mysqli_fetch_assoc($resc4);

$sql_c5 = "select * from `cardbag` where `playerid`='$uid' and `cardid`='5'";
$resc5=mysqli_query($conn,$sql_c5) or die("get card 5 error.");
$card5=mysqli_fetch_assoc($resc5);

$sql_c6 = "select * from `cardbag` where `playerid`='$uid' and `cardid`='6'";
$resc6=mysqli_query($conn,$sql_c6) or die("get card 6 error.");
$card6=mysqli_fetch_assoc($resc6);

$sql_c7 = "select * from `cardbag` where `playerid`='$uid' and `cardid`='7'";
$resc7=mysqli_query($conn,$sql_c7) or die("get card 7 error.");
$card7=mysqli_fetch_assoc($resc7);

$sql_c8 = "select * from `cardbag` where `playerid`='$uid' and `cardid`='8'";
$resc8=mysqli_query($conn,$sql_c8) or die("get card 8 error.");
$card8=mysqli_fetch_assoc($resc8);


//檢查所有卡片數量>0
if ((int)$card1['count'] >0 && (int)$card2['count'] >0 && (int)$card3['count'] >0 && (int)$card4['count'] >0 && 
    (int)$card5['count'] >0 && (int)$card6['count'] >0 && (int)$card7['count'] >0 && (int)$card8['count'] >0){

    //更新卡片數量 cardid:1到8都減$set數量
    for ($i=1; $i<9; $i++) { 
        $sql2="update `cardbag` set `count`=count-'$set' where `cardid`='$i' and `playerid`='$uid'";
        mysqli_query($conn, $sql2) or die("db2 error");
    }

    // 取得player money
    $sql3="select * from `player` where `playerid`='$uid'";
    $res3=mysqli_query($conn, $sql3) or die("db3 error");
    $resp = mysqli_fetch_assoc($res3);
    $pmoney=(int)($resp['money']);
    $money = $pmoney + $bonus*$set;
    
    //獎金加到player money
    $sql4="update `player` set `money`='$money' where `playerid`='$uid'";
    $res4=mysqli_query($conn, $sql4) or die("db4 error");

    if ($res3) {
        echo "獲得獎金 $".$bonus."元";
    }
} else {
    echo "卡片不夠喔";
}
header("Refresh: 1; url=showInventory.php");

?>