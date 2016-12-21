<?php
session_start();
$uID=$_SESSION['playerID'];
$cid=$_GET['cid'];

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
    form {
        display: table;
    }
    form p{
        display: table-row;
    }
    form h1{
        display: table-cell;
        /*margin: 3px;*/
    }
    </style>
     
    <link href='http://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Mono' rel='stylesheet' type='text/css'>
    <!--icon-->
    <link rel="Shortcut Icon" type="image/x-icon" href="img/www.png" />
    <!--css-->
    <link href="css/test.css" rel="stylesheet" type="text/css"/>
</head>
<form class="form" action="php/sellcard.php" method="POST" >
<input type="hidden" name="uID" value="$uID">
<input type="hidden" name='cid' value='<?php echo $cid;?>'>
<p><h1 align=center> <img width="200px" style="border:2px solid #99BBFF" src="img/<?php echo $cid;?>.jpg"> </h1></p>
<p><h1 align=center> 數量<input type="number" name="number" value='1' min="1"></h1></p>
<p><h1 align=center> 底價<input type="text" name="price" value='1' min="1"></h1></p>
<p><h1 align=center> 結標時間<br>
<select name="deadline" align="center">
    <option value="1">一天</option>
    <option value="2">兩天</option>
    <option value="3">三天</option>
    <option value="4">四天</option>
    <option value="5">五天</option>
</select>
</h1></p>
<p><h1 align=center><input type=submit value="賣出"></h1></p>
</form>
