<?php

$mysqli = new mysqli("localhost", "root", "", "dbbookstore");

$query = "SELECT * FROM books";

$booksArray = array();

if ($res = $mysqli->query($query)) {

    while ($row = mysqli_fetch_assoc($res)) 
	{
       array_push($booksArray, $row);
    }
  
  }
  print_r($booksArray);  
 
 ?>