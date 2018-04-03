<?php session_start();
	require_once 'Dao.php';
	$dao = new Dao();
	$photos = $dao->getAllPhotos(); 
	$count = 0;
?>

<html>
  <head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="index.css">
	
</head>

<body>
  
	<?php
		include("navbar.php");
	?>
   
    <h2 class="pageTitle">
      
    </h2>
    <div class="content">
     
	<?php foreach ($photos as $photo){ ?>
		<div><img class="image" src= "<?='Photos/' . $photo['Title']?>"</img> </div>
	<br><br>
	
	<?php } ?>
	
	<div class="picture"><img /></div>
	<div class="picture"><img /></div>
	<div class="picture"><img /></div>
	
	
	
   </div>
    
   <div class="footer">
      Facebook : Instagram : Snapchat : Twitter
    </div>
</body>
</html>


