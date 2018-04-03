<?php session_start();
	require_once 'Dao.php';
	$dao = new Dao();
	$posts = $dao->getPosts(); 
?>

<html>
  <head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="default.css">
</head>

<body>

    <?php
		include("navbar.php");
		$PostID = ( $_REQUEST['id']);
		$post = $dao->getPost($PostID);
	?>
	
    
    
    <div class="content">
	
	<?php
		$photos = $dao->getPhotos($post['ID']);
		//$date = $dao->getDate($post['ID']);
		?>
		
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
					<h2><?=$post['Title']?></h2>
					<h5><?=$post['DatePosted']?></h5>
					<?php if(isset($photos[0])){ ?>
					<img class="image" src="<?= 'Photos/' . $photos[0]['Title'] ?>"></img>
					<?php } ?>
					<p><?=$post['PostContent']?></p>
					<?php 
					if(isset($photos[0])){
						unset ($photos[0]);
					foreach($photos as $photo){ ?>
						<img class="image" src="<?= 'Photos/'. $photo['Title']?>"></img>
					<?php
					}
					}
					?>
				</div>
			</div>
		</div>
   
   
   
   
   
   
   
   
    </div>
    
    <div class="footer">
      Facebook : Instagram : Snapchat : Twitter
    </div>
</body>
</html>


