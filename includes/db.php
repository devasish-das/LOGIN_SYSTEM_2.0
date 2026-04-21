<?php
    $servername="localhost";
    $username= "root";
    $password="";
    $database="login_system";

    $conn=mysqli_connect($servername,$username,$password,$database);
    if(!$conn) echo "failed";
 

?>