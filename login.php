<?php session_start(); ?>

<html>
  <head>
    <link rel="stylesheet" href="login.css">
  </head>
  
  
<form action="loginHandler.php" method = "POST">
 
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit">Login</button>
	<?php if(isset($_SESSION['messages'])){
			echo "<strong class='error'>" . $_SESSION['messages'][0] . "</strong>";
			unset($_SESSION['messages']);
	}
	?>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn"><a href="index.php">Cancel</a></button>
	<a class="newUser" href="newUser.php">newUser</a>
  </div>
</form>