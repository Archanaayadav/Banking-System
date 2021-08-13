<?php

  //connection

  $conn = mysqli_connect('localhost','root','','my_database');
  $sql = "SELECT * FROM `customertable`";
  $result = mysqli_query($conn, $sql);

?>
