<?php

  session_start();

  if ( isset($_SESSION["Login"])) {
    header("location: ../home/home.php");
    exit;
  }
  
  require '../admin/funtions.php';

  if (isset($_POST ["Login"])) {
    
    $username = $_POST["username2"];
    $password = $_POST["password3"];

    $result = mysqli_query($link, "SELECT * FROM akun WHERE username = '$username'");
    $admin = mysqli_query($link, "SELECT * FROM admin WHERE username = '$username'");

    if (mysqli_num_rows($admin) === 1) {
      
      $row = mysqli_fetch_assoc($admin);
      if (password_verify($password, $row["password"]) ){

        $_SESSION["Login"] = true;

        header("location: ../admin/unesa/account.php");
        exit;
      }
    }
    elseif (mysqli_num_rows($result) === 1) {
      
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row["password"]) ){

        $_SESSION["Login"] = true;

        header("location: ../home/home.php");
        exit;
      }
    }

    $error = true;
  }

  if (isset($_POST["register"])){

    if (registrasi($_POST) > 0 ){
      echo "<script>
            alert('Berhasil Mewmbuat Akun !!!');
            </script>";
    }else {
      echo mysqli_error($link);
    }

  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
  <div class="cont">
    <div class="form sign-in">
      <h2>Sign In to Event Box</h2>

      <?php if (isset($error) ) : ?>
        <p style="color: red; font-style: italic;"> Username / Password salah</p>
      <?php endif; ?>


      <form action="" method="post">

         <label for="username2">
          USERNAME
          <input type="text" name="username2" id="username2">
        </label>

        <label for="password3">
          PASSWORD
          <input type="password" name="password3" id="password3">
        </label>

        <button class="submit" type="submit" name="Login">Sign In</button>

      </form>
     
      <p class="forgot-pass">Forgot Password ?</p>

      <div class="social-media">
        <ul>
          <li><img src="images/facebook.png"></li>
          <li><img src="images/twitter.png"></li>
          <li><img src="images/linkedin.png"></li>
          <li><img src="images/instagram.png"></li>
        </ul>
      </div>
    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>Hallo, Friend!</h2>
          <p>Enter your personal details and start journey with us</p>
        </div>
        <div class="img-text m-in">
          <h2>Welcome Back!</h2>
          <p>If you already has an account, just sign in. We've missed you!</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
      <div class="form sign-up">
        <h2>Create Account</h2>
        <form action="" method="post">

             <label for="username">
              Username
              <input type="text" name="username" id="username" required>
            </label>
            <label for="Email">
              Email
              <input type="email" name="Email" id="Email" required>
            </label>
            <label for="password">
              Password
              <input type="password" name="password" id="password" required>
            </label>
            <label for="password2">
              Confirm Password
              <input type="password" name="password2" id="password2" required>
            </label>
         
            <button type="submit" class="submit" name="register">Sign Up Now</button>
            <p>By clicking "Sign Up Now" I agree to Term of Service and Privacy Policy</p>

        </form>
         
        
      </div>
    </div>
  </div>
<script type="text/javascript" src="script.js"></script>
</body>
</html>