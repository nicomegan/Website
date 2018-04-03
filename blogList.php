<?php session_start();
	require_once 'Dao.php';
	$dao = new Dao();
	$posts = $dao->getPosts(); 
?>
  
<html>
  <head>
    <link rel="stylesheet" href="index.css">
	<meta charset="utf-8">
	
</head>
<body>
    <?php
		include("navbar.php");
	?>
    
	 <?php
		if($_SESSION['sentiment'] == "good"){	
			if($dao->getAccess($_SESSION['currentUser']) == 1){
				echo '<button class="newPost" type="button"><a href="CreatePost.php">New Post</a></button>';
			}
		}
	?>
			

    <div class="content">
      <ul class="blogList">
	  
		<?php if($dao->getAccess($_SESSION['currentUser']) == 1){ 
				foreach($posts as $post){ ?>
					<div> 
						<li class="blogListElement"> <a href="blogPost.php?id=<?= $post['ID'] ?>"><?=$post['Title']?></a></li> 
						<button class="delete" type="button"><a href="deletePost.php?id=<?= $post['ID'] ?>">Delete</a></button>
					</div>
			<?php } 
		} else { 
			foreach($posts as $post){ ?>
		<div> 
				<li class="blogListElement"> <a href="blogPost.php?id=<?= $post['ID'] ?>"><?=$post['Title']?></a></li> 
		</div>
			<?php } }?>
	  

	 </ul>
    </div>
    
    <div class="footer">
      Facebook : Instagram : Snapchat : Twitter
    </div>
</body>
</html>