<?php
require_once 'controleur.php';
session_set_cookie_params(3600);
session_start();

$_SESSION['time'] = time();
session_regenerate_id(true);

if(isset($_SESSION['time']) && time()-$_SESSION['time']>10)
{
  session_destroy();
  header("Location:LoginPage.php");
  exit();
}

$resultat = "";


if(isset($_SESSION['username']))
{
  $result = $_SESSION['username'];
}
else {
  header("Location: LoginPage.php");
  exit();// code...
}


if(isset($_POST['button'])){
  session_destroy();
  header("Location:LoginPage.php");
  exit();
}






if(isset($_POST['afficher']))
{
  $controleur = new Controleur();
  $resultat = $controleur -> AfficherMembers();

}


if(isset($_GET['user'])){
  $user = $_GET['user'];
  $contro = new Controleur();
  $contro -> Supprimer($user);

  $controleur = new Controleur();
  $resultat = $controleur -> AfficherMembers();

}


if(isset($_GET['nmsg'])){
  echo "<div class='alert alert-success'>" . htmlspecialchars($_GET['nmsg']) . "</div>";
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title></title>
    <style media="screen">
      table,th,tr,td{
        border: solid 2px black;
      }
      table{
        width: 50%;
        margin-left: 25%
      }
    </style>
  </head>
  <body>
    <form action="" method="post">
        <h1>helllllllllllllllllllllllllllllo <span style="color:blue;font-family:verdana;"><b><?php echo $result; ?></b></span></h1>
        <button type="submit" class="btn btn-danger" name="button">Log OUt</button>
        <input type="submit" class="btn btn-info" name="afficher" value="afficher"><br><br>
        <table>
          <tr>
            <th class="text-center">Username</th>
            <th class="text-center">Password</th>
            <th class="text-center">Email</th>
          </tr>
          <?php echo $resultat; ?>
        </table>
    </form>
  </body>
</html>
