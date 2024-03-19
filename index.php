
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form </title>
 
  <link rel="stylesheet" href="style.css">
</head>
<body>



  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form method="post" action="signin.php">
      
      <input type="hidden" name="action" value="signin">
        <input type="text" name=username placeholder="Enter your email">
        <input type="password" name=password placeholder="Enter your password">
        <a href="#">Forgot password?</a>
        <input type="submit" class="button" value="Login">
        <?php
if (isset($_GET['error'])) {
    echo "<div style = 'font-size:15px; color:#cc0000; margin-top:10px'>".$_GET['error']."</div>";
}
?>
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check">Signup</label>
        </span>
      </div>
    </div>
    <div class="registration form">
      <header>Signup</header>
      <form method="post" action="signin.php">
      <input type="hidden" name="action" value="signup">
        <input type="text" name=username placeholder="Enter your email">
        <input type="password" name=password placeholder="Create a password">
        
        <input type="submit" class="button" value="Sign Up">
        
      </form>
      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>
</body>
</html>
