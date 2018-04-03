<?php 
	//session_start();
	require_once 'Dao.php';
	$dao = new Dao();
	$posts = $dao->getPosts(); 
	
	?>

	
<html>
  <head>
	<meta charset="utf-8">
</head>

<body>

<?php 
	ob_start();
	foreach($posts as $post){
		$photos = $dao->getPhotos($post['ID']);
		$date = $dao->getDate($post['ID']);

		error_log(print_r($photos,true));
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
			
			<?php
			
		}
	$result = ob_get_clean();
	echo $result;
	?>



</body>
</html>
