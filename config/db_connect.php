<?php
    // connect to database then
    // check the connection if it is successfull
     $conn = mysqli_connect('localhost', 'root', '', 'ramen_shop');

     if(!$conn) {
         echo "Connection error: ".mysqli_connect_error();
     }
?>