<?php
session_start();
$uID=$_SESSION['playerID'];
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
<head>
    <style type="text/css">
    .form {
        width: 200px;
    	margin: 0 auto;
    }
    .form input {
        width: 90%;
       	align: 'center';
    }	
    </style>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<form class="form" action="php/sellcard.php" method="POST">
<input type="hidden" name="uID" value="$uID">
<input type="hidden" name='cid' value='<?php echo $cid;?>'>
<h1 align=center> <img width="200px"src="img/<?php echo $cid;?>.jpg"> <h1>
<h1 align=center> 數量:<input type="number" name="number" value='1'><br/></h2>
<h1 align=center> 底價:<input type="text" name="price" value='100'><br/></h3>
<h1 align=center> 結標時間: <input type="text" name="deadline" value="<?php echo $default;?>"></h4>
<h1 align=center><input type=submit value="賣出"></h5>
</form>
