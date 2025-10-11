<?php 

$con = new PDO("mysql:host=localhost;dbname=quickstock", "root", "");

if(!$con){
    echo "error";
    exit();
}

?>
