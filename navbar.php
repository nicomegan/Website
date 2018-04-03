




	<div class = "headerBar">
		<span class="homeLink">
			<a class="homeLink" href="index.php"><h1>VivirMinMejorVida</h1></a>
				<link rel="stylesheet" type="text/css" href="home.css">

		</span>
		<span class="login" id="logg">
			<?php 
			if($_SESSION['sentiment'] == "good"){ 
				//echo '<div class="w3-container">';
					//  echo'<button class="w3-button w3-xlarge w3-circle w3-teal">+</button>';
 
			
				echo '<a class="log" href="logout.php"><h1>LOGOUT</h1></a>';
			}else{
				echo '<a class="log" href="login.php"><h1>LOGIN</h1></a>'; }
			?>
						
		</span>
	</div>
 
  


    <div class="navBar">
	<ul class="nav">

		<li class="navTab"><a href="About.php">About</a></li> 
		<li class="navTab"><a href="pictures.php">Pictures</a></li>
		<li class="navTab"><a href="music.php">Music</a></li>
		<li class="navTab currentTab"><a href="blogList.php">Blog List</a></li>
		
		<!-- <li class="navTab"><a href="tripList.php">Trips</a></li> -->
		


	</ul>
    </div>