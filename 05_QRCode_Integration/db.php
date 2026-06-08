<?php

$host = "localhost:3307";
$user = "root";
$password = "";
$database = "qrdemo";

$conn = mysqli_connect($host,$user,$password,$database);

if (!$conn)
{
    die( "Database Connection Failed : ". mysqli_connect_error() );
}


?>