<?php
error_reporting(E_ALL);
ini_set('display_error',1);
mysqli_report(MYSQLI_REPORT_ERROR);


$host ='localhost';
$usename ='root';
$pass_word ='';
$db_name ='healthy_mind';


$conn = mysqli_connect($host, $usename, $pass_word, $db_name);
?>