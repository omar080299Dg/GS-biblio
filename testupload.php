<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include 'header.php'; $long = strtotime('2012-03-27 18:47:00'); //--> which results to 1332866820
echo date('Y-m-d H:i:s', $long)."<br>";
echo $long;

$ling = strtotime('2013-03-27 18:47:00'); //--> which results to 1332866820
echo date('Y-m-d H:i:s', $ling)."<br>";
echo $ling;
?>
<div class="progress-bar progress-bar-striped progress-bar-animated" style="width:40%"></div>
<div class="progress">
  <div class="progress-bar bg-primary rogress-bar-striped progress-bar-animated" style="width:90%"></div>
</div>
</body>
</html>