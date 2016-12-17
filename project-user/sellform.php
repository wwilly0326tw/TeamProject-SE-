<?php
session_start();
$uID=$_SESSION['uID'];
$cid=$_GET['cid'];

//設定時區
date_default_timezone_set("Asia/Taipei");
//取得現在時間，用字串的形式
$Y=date('Y');
$m=date('m');
$d=date('d');
$H=date('H');
$i=date('i');
$s=date('s');
//預設結標時間+2天
$default=date( ("Y-m-d H:i:s"), mktime($H,$i,$s,$m,$d+2,$Y) );
?>
<form action="sellcard.php" method="POST">
<input type="hidden" name="uID" value="$uID">
<input type="hidden" name='cid' value='<?php echo $cid;?>'>
Card: <?php echo $cid;?><br/>
數量: <input type="number" name="number" value='1'><br/>
底價: <input type="text" name="price" value='100'><br/>
結標時間: <input type="text" name="deadline" value="<?php echo $default;?>"><br/>
<input type=submit value="賣出">
</form>
