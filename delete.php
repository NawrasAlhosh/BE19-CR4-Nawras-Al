<?php
// Including the database connection file
require_once "db_connect.php";

// Getting the 'id' parameter from the URL using GET method
$id = $_GET["x"];

// Query to fetch the record with the specified 'id' from the database
$sql = "SELECT * FROM library_table WHERE id = $id";
$result = mysqli_query($connect, $sql);

// Fetching the row data associated with the given 'id'
$row = mysqli_fetch_assoc($result);

// Preparing the DELETE query to remove the record with the specified 'id'
$delete = "DELETE FROM `library_table` WHERE id = $id";

// Executing the DELETE query
if (mysqli_query($connect, $delete)) {
  // If the deletion is successful, redirect the user to the index.php page
  header("Location: index.php");
  exit; // Terminate the script to prevent further execution
} else {
  // If an error occurs during deletion, display the error message
  echo "Error deleting record: " . mysqli_error($connect);
}
