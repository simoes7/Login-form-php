<?php 
require_once 'controleur.php';

if(isset($_POST['modifier']) && isset($_GET['user'])){
	
	
	
	$contro = new Controleur();
	$contro -> Modifier($_GET['user'], $_POST['username'], $_POST['password'], $_POST['email']);
	
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Styled Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
      <h2>Modifier</h2>
      <form method="post" action="">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" placeholder="Enter new username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter new password">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Enter new email">
        </div><br>
        <button type="submit" name="modifier" class="btn btn-primary btn-block">Modifier</button>
        
      </form>
    </div>
  </div>

  <!-- Bootstrap JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
