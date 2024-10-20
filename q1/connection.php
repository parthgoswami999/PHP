<?php

$server ="localhost";
$username= "root";
$password= "";
$db = "assignment1";

$conn = mysqli_connect($server,$username,$password,$db);

if($conn){
    echo "connection established";
}else{
    echo "not connection established";
}

?>