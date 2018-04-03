<?php session_start();
 ?>
 
<html>
	<link rel="stylesheet" type="text/css" href="index.css">

	LOGGED OUT	
	
	<?php
		$_SESSION['sentiment'] = "bad";
		$_SESSION['currentUser'] = "";
		echo '<a href="index.php">return</a>';

	?>
	
	
	<div class="footer">
      Facebook : Instagram : Snapchat : Twitter
    </div>
	
</html>