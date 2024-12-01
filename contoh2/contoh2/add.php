<html>

<head>
  <title>Add Users</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-4">
    <a href="index.php">Go to Home</a>
    <br /><br />

    <form action="add.php" method="post" name="form1">
      <!-- <table width="25%" border="0">
        <tr>
          <td>Name</td>
          <td><input type="text" name="name"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="text" name="email"></td>
        </tr>
        <tr>
          <td>Mobile</td>
          <td><input type="text" name="mobile"></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" name="Submit" value="Add"></td>
        </tr>
      </table> -->

      <div class="form-group">
        <label for="exampleInputName1">Name</label>
        <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter Name" name="name">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
      </div>

      <div class="form-group">
        <label for="exampleInputMobile1">Mobile</label>
        <input type="text" class="form-control" id="exampleInputMobile1" placeholder="Enter mobile" name="mobile">
      </div>

      <input class="btn btn-primary" type="submit" name="Submit" value="Add">
    </form>


    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $mobile = $_POST['mobile'];

      // include database connection file
      include_once("config.php");

      // Insert user data into table
      $result = mysqli_query($mysqli, "INSERT INTO users(name,email,mobile) VALUES('$name','$email','$mobile')");

      // Show message when user added
      echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
  </div>
</body>

</html>