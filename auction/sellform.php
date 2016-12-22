<?php
session_start();
$uID=$_SESSION['playerID'];
$cid=$_GET['cid'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Sell card</title>
    <link href='http://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Mono' rel='stylesheet' type='text/css'>
    <!--icon-->
    <link rel="Shortcut Icon" type="image/x-icon" href="img/www.png" />
    <!--css-->
    <link href="css/test.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="content" style="margin-top:5%;">
    <form class="form" action="php/sellcard.php" method="POST" >
        <input type="hidden" name="uID" value="$uID">
        <input type="hidden" name='cid' value='<?php echo $cid;?>'>
        <div><h1 align=center> <img width="200px" style="border:2px solid #99BBFF" src="img/<?php echo $cid;?>.jpg"> </h1></div>
        <div><h2><span class="selltext">Count</span><br/>
            <input class="input" type="number" name="number" value='1' min="1"></h2>
        </div>
        <div><h2><span class="selltext">Reserve Price</span><br/>
            <input class="input" type="text" name="price" value='1' min="1"></h2>
        </div>
        <div><h2 class="selltext">Deadline<br/>
            <select id="opt" name="deadline" align="center">
                <option value="1">one day</option>
                <option value="2">two days</option>
                <option value="3">three days</option>
                <option value="4">four days</option>
                <option value="5">five days</option>
            </select></h2>
        </div>
       <div><h1 align=center><button class="btn" type="submit" value="sell">Sell</button></h1></div>
    </form>
</div>
</body>
</html>
