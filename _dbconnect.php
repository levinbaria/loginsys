<?php
$servername='localhost';
$username='root';
$password="";
$dbname="loginsys";

$connect=mysqli_connect($servername,$username,$password,$dbname);

if(!$connect){
    die("Connection Not Established with the database".mysqli_connect_error());
}

?>