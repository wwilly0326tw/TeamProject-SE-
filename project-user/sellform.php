<?php
session_start();
$uID=$_SESSION['uID'];
$cid=$_GET['cid'];
?>
<form action="sellcard.php" method="POST">
<input type="hidden" name="uID" value="$uID">
<input type="hidden" name='cid' value='<?php echo $cid;?>'>
Card: <?php echo $cid;?><br/>
數量: <input type="number" name="number" value='1'><br/>
底價: <input type="text" name="price" value='100'><br/>
結標時間: <input type="date" name="deadline"><br/>
<input type=submit value="賣出">
</form>
