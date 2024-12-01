<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<html>

<head>
  <title>Homepage</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
  <div class="container mt-4">
    <a class="btn btn-primary" href="add.php">Add New User</a><br /><br />

    <table class="table table-bordered">
      <tr>
      <th>Nomer</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Update</th>
      </tr>
      <?php
      while ($user_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $user_data['id'] . "</td>";
        echo "<td>" . $user_data['name'] . "</td>";
        echo "<td>" . $user_data['mobile'] . "</td>";
        echo "<td>" . $user_data['email'] . "</td>";
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";
      }
      ?>
    </table>
  </div>
</body>

</html>