<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['ganti'])) {
  $id = $_POST['id'];

  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];

  // update user data
  $result = mysqli_query($mysqli, "UPDATE users SET name='$name',email='$email',mobile='$mobile' WHERE id=$id");

  // Redirect to homepage to display updated user in list
  header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while ($user_data = mysqli_fetch_array($result)) {
  $name = $user_data['name'];
  $email = $user_data['email'];
  $mobile = $user_data['mobile'];
}
?>
<html>

<head>
  <title>Edit User Data</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-4">
    <a href="index.php">Home</a>
    <br /><br />

    <form name="update_user" method="post" action="edit.php">
      

      <div class="form-group">
        <label for="exampleInputName1">Name</label>
        <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter Name" name="name" value=<?php echo $name; ?>>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value=<?php echo $email; ?>>
      </div>

      <div class="form-group">
        <label for="exampleInputMobile1">Mobile</label>
        <input type="text" class="form-control" id="exampleInputMobile1" placeholder="Enter mobile" name="mobile" value=<?php echo $mobile; ?>>
      </div>

      <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
      <input class="btn btn-primary" type="submit" name="ganti" value="Ganti">

    </form>
  </div>
</body>

</html>