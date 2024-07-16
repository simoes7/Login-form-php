<?php
include 'controleur.php';

$resultusername = "";
$resultfrstpass = "";
$resultscndpass = "";
$resultdiff = "";
$reslutemail = "";

$username = "";
$password = "";
$confirmpassword = "";
$email = "";

if(isset($_POST['submit'])){
  if(empty($_POST['username'])){
    $resultusername = "Username is required";
  } else {
    $username = $_POST['username'];
  }

  if(empty($_POST['password'])){
    $resultfrstpass = "Password is required";
  } else {
    $password = $_POST['password'];
  }

  if(empty($_POST['confirmpassword'])){
    $resultscndpass = "Confirm password is required";
  } else {
    $confirmpassword = $_POST['confirmpassword'];
  }

  if(empty($_POST['email'])){
    $reslutemail = "Email addresse is required";
  } else {
    $email = $_POST['email'];
  }


  if($_POST['password'] !== $_POST['confirmpassword']){
    $resultdiff = "Unmatching passwords please check again";
  }

  if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirmpassword']) && $_POST['password'] == $_POST['confirmpassword'])
  {
    $contro = new Controleur();
    $ee = $contro -> register($_POST['username'], $_POST['password'], $_POST['email']);
    echo $ee;
  }



}


if (isset($_GET['msg'])) {
    $msg = htmlspecialchars($_GET['msg']);

    if ($msg == "compte created successfully") {
        echo "<div class='alert alert-success'>" . $msg . "</div>";
        echo "<button><a href='LoginPage.php' style='text-decoration:none;color:black'>Click here to <span style='color:green;'>log in</span></a></button>";
    } else {
        echo "<div class='alert alert-danger'>" . $msg . "</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <style>
    /* Custom styles for the form */
    .custom-form {
      max-width: 400px;
      margin: 0 auto;
      padding: 30px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #f8f9fa;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .custom-form h2 {
      margin-bottom: 20px;
      font-weight: bold;
      color: #333;
      text-align: center;
    }
    .custom-form .form-control {
      border-radius: 0;
    }
    .custom-form .btn-primary {
      border-radius: 0;
    }
    .custom-form .links {
      text-align: center;
      margin-top: 15px;
    }
    .custom-form .links a {
      color: #007bff;
      text-decoration: none;
    }
    .custom-form .links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="custom-form">
      <h2>Register</h2>
      <form method="post" action="">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" placeholder="Enter username" value="<?php echo htmlspecialchars($username); ?>">
          <span style="color:red"><?php echo $resultusername; ?></span>
        </div>
        <div class="form-group">
          <label for="username">Email</label>
          <input type="text" class="form-control" name="email" placeholder="Enter email" value="<?php echo htmlspecialchars($email); ?>">
          <span style="color:red"><?php echo $reslutemail;  ?></span>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter password" value="<?php echo htmlspecialchars($password); ?>">
          <span style="color:red"><?php echo $resultfrstpass; ?></span>
        </div>
        <div class="form-group">
          <label for="confirmpassword">Confirm Password</label>
          <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm password" value="<?php echo htmlspecialchars($confirmpassword); ?>">
          <span style="color:red"><?php echo $resultscndpass; ?></span>
          <span style="color:red"><?php echo $resultdiff; ?></span>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
        <div class="links">
          Already have an account? <a href="LoginPage.php">Login</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/boots
