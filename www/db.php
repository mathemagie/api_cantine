<?php
$production = 1;

if ($_SERVER["USER"] == 'aurel') $production = 0;
if (strstr($_SERVER['HTTP_HOST'],'localhost')) $production = 0;

if (!$production){
    $hostname = 'localhost';
    $username = 'xxx';
    $password = 'xxx';
    ini_set('display_errors', '1');
    error_reporting(E_ALL ^ E_NOTICE);
}
else {
    ini_set('display_errors', '0');
    $hostname = 'localhost';
    $username = 'xxx';
    $password = 'xxx';
}

try
{
    $db = new PDO('mysql:host=localhost;dbname=api_cantine', $username,$password);
}
catch(PDOException $ex) {
   echo $ex;
}
?>
