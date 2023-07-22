<?php
// Including the database connection file
require_once "db_connect.php";

// Query to select all records from the 'library_table'
$sql = "SELECT * FROM `library_table`";

// Executing the query and storing the result in the $result variable
$result = mysqli_query($connect, $sql);

// Initializing the $layout variable to store the HTML layout
$layout = "";

// Checking if there are any records returned from the query
if (mysqli_num_rows($result) > 0) {
  // Building the HTML layout for displaying the media items in cards
  $layout .= "
    <style>
        .card-img-top {
            height: 200px; 
            object-fit: cover; 
        }
        .card {
            margin-top: 4rem; 
        }
    </style>
    <div class='container'>
        <div class='row'>";

  // Looping through each record and building the card for each media item
  while ($row = mysqli_fetch_assoc($result)) {
    $layout .= "
            <div class='col-lg-4 col-md-6 col-sm-12 mb-4'>
                <div class='card h-100'>
                    <img src='{$row["image"]}' class='card-img-top'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$row["title"]}</h5>
                        <p class='card-text'>{$row["short_description"]}</p>
                        <p class='card-text'>{$row["type"]}<small class='text-muted'></small></p>
                        <a href='details.php?x={$row["id"]}' class='btn btn-primary mt-2'>Show Details</a>
                        <a href='update.php?x={$row["id"]}' class='btn btn-success mt-2'>Update</a>
                        <a href='delete.php?x={$row["id"]}' class='btn btn-danger mt-2'>Delete</a>
                    </div>
                </div>
            </div>";
  }

  // Closing the HTML layout for the cards
  $layout .= "
        </div>
    </div>";
} else {
  // If no records are found, display a message
  $layout .= "<div class='container'><div class='row'><div class='col text-center'><h3>No Result</h3></div></div></div>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Library</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <!-- navbar starts -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">My Library</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="create.php">Create a new Product</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar ends -->

  <!-- Echoing the generated layout of media items -->
  <div>
    <?php echo $layout ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>