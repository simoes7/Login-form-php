<?php
include 'controleur.php';
session_start();

$controleur = new Controleur();

$resultusername = "";
$resultpassword = "";

if(isset($_POST['submit']))
{
  if(empty($_POST['username']))
  {
    $resultusername = "Username is required";
  }

  if(empty($_POST['password']))
  {
    $resultpassword = "Password is required";
  }

  if(!empty($_POST['username']) && !empty($_POST['password']))
  {
    $controleur->auth($_POST['username'], $_POST['password']);
  }
}

if(isset($_GET['msg']))
{
  echo "<div class='alert alert-danger'>" . htmlspecialchars($_GET['msg']) . "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Professional Bootstrap Form</title>
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
      <h2>Login</h2>
      <form method="post" action="">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" placeholder="Enter username" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
          <span style="color:red"><?php echo $resultusername; ?></span>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter password">
          <span style="color:red"><?php echo $resultpassword; ?></span>
        </div><br>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
        <div class="links">
          <a href="forgotPassword.php">Forgot password?</a><br><br>
          Don't have an account? <a href="register.php">Register</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
