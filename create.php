<?php
require_once "db_connect.php";

if (isset($_POST["create"])) {
  $title = $_POST["title"];
  $image = $_POST["image"];
  $ISBN_code = $_POST["ISBN_code"];
  $short_description = $_POST["short_description"];
  $type = $_POST["type"];
  $author_first_name = $_POST["author_first_name"];
  $author_last_name = $_POST["author_last_name"];
  $publisher_name = $_POST["publisher_name"];
  $publisher_address = $_POST["publisher_address"];
  $publish_date = $_POST["publish_date"];
  $status = $_POST["status"];

  // Using prepared statement to avoid SQL injection
  $stmt = $connect->prepare("INSERT INTO `library_table` (`title`, `image`, `ISBN_code`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssssssss", $title, $image, $ISBN_code, $short_description, $type, $author_first_name, $author_last_name, $publisher_name, $publisher_address, $publish_date, $status);

  if ($stmt->execute()) {
    echo "<div class ='alert alert-success' role='alert'>New record has been created</div>";
    // header("refresh: 3; url=index.php");
  } else {
    echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";
  }

  $stmt->close();
  $connect->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Add New Media</title>
  <style>
    body {
      font-size: 16px;
    }

    .navbar {
      background-color: #f8f9fa;
    }

    .container {
      margin-top: 30px;
    }

    .form-group label {
      font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group input[type="file"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }

    .form-group button[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 14px 20px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 18px;
    }

    .form-group button[type="submit"]:hover {
      background-color: #0056b3;
    }

    .form-group .input-group-addon {
      background-color: #f8f9fa;
      border: 1px solid #ccc;
      padding: 10px;
      border-radius: 4px;
      font-size: 15px;
    }

    .small-placeholder::placeholder {
      font-size: 12px;
    }
  </style>
</head>

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
      </ul>
    </div>
  </div>
</nav>
<!-- navbar ends -->

<body>
  <div class="container mt-5">
    <h2>Add New Media</h2>
    <form method="post" enctype="multipart/form-data">
      <div class="mb-3 mt-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" area-describility="title" id="title" />
      </div>
      <div class="mb-3 mt-3">
        <label for="ISBN_code" class="form-label">ISBN_code</label>
        <input type="text" class="form-control" id="ISBN_code" name="ISBN_code" />
      </div>
      <div class="mb-3 mt-3">
        <label for="image" class="form-label">Image</label>
        <input type="text" class="form-control" name="image" area-describility="image" id="image" />
      </div>
      <div class="mb-3 mt-3">
        <label for="short_description" class="form-label">Short Description</label>
        <input type="text" class="form-control" name="short_description" area-describility="short_description" id="short_description" />
      </div>
      <div class="mb-3 mt-3">
        <label for="type" class="form-label">Type</label>
        <input type="text" class="form-control" name="type" area-describility="type" id="type" />
      </div>
      <div class="mb-3 mt-3">
        <label for="author_first_name" class="form-label">Author First Name</label>
        <input type="text" class="form-control" name="author_first_name" area-describility="author_first_name" id="author_first_name" />
      </div>
      <div class="mb-3 mt-3">
        <label for="author_last_name" class="form-label">Author Last Name</label>
        <input type="text" class="form-control" name="author_last_name" area-describility="author_last_name" id="author_last_name" />
      </div>
      <div class="mb-3 mt-3">
        <label for="publisher_name" class="form-label">Publisher Name</label>
        <input type="text" class="form-control" name="publisher_name" area-describility="publisher_name" id="publisher_name" />
      </div>
      <div class="mb-3 mt-3">
        <label for="publisher_address" class="form-label">Publisher Address</label>
        <input type="text" class="form-control" name="publisher_address" area-describility="publisher_address" id="publisher_address" />
      </div>
      <div class="mb-3 mt-3">
        <label for="publish_date" class="form-label">Publish Date</label>
        <input type="date" class="form-control" name="publish_date" placeholder="Confirm your publish date" required />
      </div>

      <div class="mb-3 mt-3">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control" name="status" area-describility="status" id="status" />
      </div>
      <button type="submit" name="create" class="btn btn-primary">Create</button>
    </form>
  </div>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>