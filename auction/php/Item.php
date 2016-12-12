<?php 
	require "dbconnect.php";
	date_default_timezone_set("Asia/Taipei");
	function getItem(){
		global $conn;
		$sql = "SELECT a.*, b.account FROM products as a LEFT JOIN player as b on a.buyerid = b.playerid";
		$res = mysqli_query($conn, $sql) or die("db error");
		$rows = array();
		while($r = mysqli_fetch_assoc($res)) {
	    	$rows[] = $r;
		}
		return json_encode($rows);
	}


	# 將到期的物品刪除
	function checkItemOutOfDate() {
		global $conn;
		$sql = "select productid, sellerid, buyerid, deadline, current_price from products";
		$result = mysqli_query($conn, $sql) or die ("checkItemOutOfDate: select productid deadline error.");
		while ($res = mysqli_fetch_assoc($result)) {
			#商品結標
			if (strtotime($res['deadline']) <= strtotime(Date("Y-m-d H:i:s"))) {
				transaction($res['productid']);
				$sql = "delete from products where productid = " . $res['productid'];
				mysqli_query($conn, $sql) or die ("checkItemOutOfDate: delete expired item error.");
			}
			# 購買福袋(缺少提供加入卡片給玩家的功能)
			else if ($res['buyerid'] && $res['sellerid'] == 1){
				# 買家減少金錢
				$sql = "update player set money=money-" . $res['current_price'] . " where playerid = " . $res['buyerid'];
				mysqli_query($conn, $sql) or die ("transaction: sub money error.");

				$sql = "delete from products where productid = " . $res['productid'];
				mysqli_query($conn, $sql) or die ("checkItemOutOfDate: delete bag item error.");
			}
		}
	}

	# 將商品及金錢進行交易
	function transaction($productid){
		global $conn;
		$sql = "select cardid, sellerid, count, current_price, buyerid from products where productid = " . $productid;
		$result = mysqli_query($conn, $sql) or die ("transaction: select traction info error.");
		$res = mysqli_fetch_assoc($result);
		if ($res['buyerid']){
			#賣家增加金錢
			$sql = "update player set money=money+" . $res['current_price'] . " where playerid = " . $res['sellerid'];
			mysqli_query($conn, $sql) or die ("transaction: add money error.");
			# 買家減少金錢
			$sql = "update player set money=money-" . $res['current_price'] . " where playerid = " . $res['buyerid'];
			mysqli_query($conn, $sql) or die ("transaction: sub money error.");
			# 買家增加卡片
			$sql = "update cardbag set count=count+" . $res['count'] . " where playerid= " . $res['buyerid'] . " and cardid=" . $res['cardid'];
			mysqli_query($conn, $sql) or die ("transaction: buyer add card error.");
		} else{ # 商品未賣出而結束競標時間
			# 賣家增加卡片
			$sql = "update cardbag set count=count+" . $res['count'] . " where playerid=" . $res['sellerid'] . " and cardid=" . $res['cardid'];
			mysqli_query($conn, $sql) or die ("transaction: seller add card error.");
		}
	}

	# 進行出價
	function bidding($productID, $buyerID, $price){
		global $conn;
		$sql = "update products set buyerid = $buyerID, current_price = $price where productid = $productID";
		echo $sql;
		mysqli_query($conn, $sql) or die ("bidding: bidding error.");
	}
?>