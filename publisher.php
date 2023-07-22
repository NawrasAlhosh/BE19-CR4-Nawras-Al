<?php
// Including the database connection file
require_once "db_connect.php";

// Checking if the 'x' parameter is set in the URL (publisher_name)
if (isset($_GET["x"])) {
  // Getting the value of 'x' (publisher_name) from the URL
  $publisher_name = $_GET["x"];

  // Query to select all records from the 'library_table' where the publisher_name matches the provided value
  $sql = "SELECT * FROM library_table WHERE publisher_name = '$publisher_name'";
  // Executing the query and storing the result in the $result variable
  $result = mysqli_query($connect, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Books by Publisher</title>
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

  <div class="container mt-4">
    <!-- Displaying the publisher name in the heading -->
    <h1 class="text-center">Media by Publisher: <?= $publisher_name ?></h1>
    <?php if (isset($result) && mysqli_num_rows($result) > 0) : ?>
      <!-- If there are media items found for the publisher, display them in a table -->
      <table class="table table-bordered" style="background-color: #f8f9fa; text-align: center;">
        <thead>
          <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Publish Date</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Short Description</th>
            <th>Status</th>
            <th>Image</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <!-- Loop through each media item and display its details in a table row -->
            <tr>
              <td><?= $row["title"] ?></td>
              <td><?= $row["type"] ?></td>
              <td><?= $row["publish_date"] ?></td>
              <td><?= $row["author_first_name"] . " " . $row["author_last_name"] ?></td>
              <td><?= $row["ISBN_code"] ?></td>
              <td><?= $row["short_description"] ?></td>
              <td><?= $row["status"] ?></td>
              <td>
                <img src="<?= $row["image"] ?>" alt="Media Image" style="max-width: 100px;">
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php else : ?>
      <!-- If no media items are found for the publisher, display a message -->
      <p class="text-center">No media found for this publisher.</p>
    <?php endif; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-hzKoQF1SHp2P1jOusDJ4+JMkEFx6Idz5sbbZ5VXXIcgJNAsuVHyWPEQ1WsfEi2H9" crossorigin="anonymous"></script>
</body>

</html>