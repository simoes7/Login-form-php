<?php

include 'connection.php';
class Controleur
{

  public function auth($username, $password)
  {

    $msg = "user or password incorrect";
    $c = new Connect();
    $e = $c -> SelectData("SELECT * FROM users_info WHERE username='{$username}' AND password = '{$password}'");


    if($e -> rowCount() > 0)
    {
      setcookie('user', $username, time()+3600, "/");
      setcookie('password', $password, time()+3600, "/");
      $_SESSION['username'] = $username;
      header("location:mainPage.php");
    }
    else{
      header("location:LoginPage.php?msg=".$msg);
    }
  }


  public function register($username, $password, $email){
    $msg = "";
    $c = new Connect();
    $e = $c -> SelectData("SELECT * FROM users_info WHERE username = '{$username}'");
    if($e -> rowCount() > 0){
      $msg = "username exist already. change it please";
      header("Location:register.php?msg=".$msg);
      exit();
    }
    else{
      $ee = $c -> updateData("INSERT INTO users_info VALUES('{$username}', '{$email}', '{$password}')");
      if($ee){
        $msg = "compte created successfully";
        header("Location:register.php?msg=".$msg);
        exit();
      }
    }
  }


  public function AfficherMembers()
{
    $c = new Connect();
    $resu = "";
    $e = $c->SelectData("SELECT * FROM users_info");

    if ($e->rowCount() > 0) {
        while ($row = $e->fetch(PDO::FETCH_ASSOC)) {
            $resu .= "<tr>
                        <td>" . $row['username'] . "</td>
                        <td>" . $row['password'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td><a href='modifier.php?user=" . $row['username'] . "'>Modifier</a></td>
                        <td><a href='mainPage.php?user=" . $row['username'] . "'>Supprimer</a></td>
                      </tr>";
        }
    }

    return $resu;
}



public function Supprimer($username)
{
  $c = new Connect();
  $stmt = $c->updateData("DELETE FROM users_info WHERE username='{$username}'");
  
}


public function Modifier($username, $newusername, $password, $email)
{

  $c = new Connect();
  $msg = "";
  $sttm = $c->updateData("UPDATE users_info SET username='{$newusername}', password='{$password}', email='{$email}' WHERE username='{$username}'");

  if($sttm)
  {
    $msg = "Modifiee avec success";
    header("location:mainPage.php?nmsg=".$msg);
  }
  

}



public function checkEmail($email)
{
  $c = new Connect();
  $e = $c -> SelectData("SELECT username FROM users_info WHERE email='{$email}'");

  if($e -> rowCount() > 0)
  {
    // Generate a unique token
    $token = bin2hex(random_bytes(50));

    // Set token expiration time (e.g., 1 hour)
    $expires = time() + 3600;

    // Save token to the database
    $c -> updateData("INSERT INTO password_resets (email, token, expires) VALUES('{$email}', '{$token}', '{$expires}')");



    // Send email with reset link
    $resetLink = "http://yourdomain.com/setPassword.php?token=" . $token;
    $subject = "Password Reset Request";
    $message = "Click the following link to reset your password: " . $resetLink;
    $headers = '';

    mail($email, $subject, $message, $headers);


    echo "A password reset link has been sent to your email address.";
  }

  else{
    echo "email dont exist daawg";
  }
}






}

?>
