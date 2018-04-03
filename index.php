<?php
session_start();
require_once 'Dao.php';
$dao = new Dao();


//echo "<pre>" . print_r($_SESSION,1) . "</pre>";
?>

<html>
  <head>
    <link rel="stylesheet" href="index.css">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
    
	<?php
		include("navbar.php");
		include("home.php");
	?>
    
    <h2 class="pageTitle">
      
    </h2>

    
    <div class="footer">
      Facebook : Instagram : Snapchat : Twitter
    </div>
</body>
</html>


