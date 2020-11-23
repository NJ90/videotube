<?php
ob_start();

// data_default_timezone_set('Asia/Seoul');

try{
    $con = new PDO("mysql:dbname=VideoTube;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>