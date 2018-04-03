<?php session_start(); ?>

<html>
  <head>
    <link rel="stylesheet" href="login.css">
  </head>
  
  
<form action="newUserHandler.php" method = "POST">
 
  <div class="container">
	<label for="rname"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="rname" required>
  
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b> (must contain at least one uppercase letter, one lowercase letter, one number, and be at least 8 characters long)</label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit">Create User</button>
	<?php if(isset($_SESSION['messages'])){
			echo "<strong class='error'>" . $_SESSION['messages'][0] . "</strong>";
			unset($_SESSION['messages']);
	}
	?>
	
	<?php if(isset($_SESSION['text'])){
			echo "<strong class='error'>" . $_SESSION['text'] . "</strong>";
			unset($_SESSION['text']);
	}
	?>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn"><a href="index.php">Cancel</a></button>
	<a class="newUser" href="newUser.php">newUser</a>
  </div>
</form>