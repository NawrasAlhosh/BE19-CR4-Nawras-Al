<?php

// Database configuration
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "BE19_CR4_NawrasAlhosh_BigLibrary.";

// Create a connection
$connect = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}
// $alter_query = "ALTER TABLE library_table MODIFY COLUMN ISBN_code BIGINT(20)";
// if ($connect->query($alter_query)) {
//   echo "ISBN_code column updated successfully.";
// } else {
//   echo "Error updating ISBN_code column: " . $connect->error;
// }
