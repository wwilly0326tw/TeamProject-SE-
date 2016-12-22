 <?php
    session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Mono' rel='stylesheet' type='text/css'>
    <!--icon-->
    <link rel="Shortcut Icon" type="image/x-icon" href="img/www.png" />
    <!--css-->
    <link href="css/index.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="wraper">
<h1><span>logout...</span></h1>
<?php
//將session清空
unset($_SESSION);
echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
?>
</div>
</body>
</html>