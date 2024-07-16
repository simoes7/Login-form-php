<?php

require_once 'controleur.php';

$resultemail = "";

if(isset($_POST['submit']))
{
	if(empty($_POST['email']))
	{
		$resultemail = "Email is required";
	}
	else{
		$contro = new Controleur();
		$contro -> checkEmail($_POST['email']);

	}
}
?>


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
      <h2>Forgot Password</h2>
      <form method="post" action="">
        <div class="form-group">
          <label for="username">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Enter email" >
          <span style="color:red"><?php echo $resultemail; ?></span>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary btn-block">Send</button>
        
      </form>
    </div>
  </div>

</body>
</html>