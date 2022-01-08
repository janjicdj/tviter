<?php

$host = "localhost";
$db = "tviter";
$user = "root";
$pass = "";

$conn = new mysqli($host,$user,$pass,$db);


if ($conn->connect_errno){
    exit("Konekcija neuspela: greska> ".$conn->connect_error.", kod>".$conn->connect_errno);
}

?>