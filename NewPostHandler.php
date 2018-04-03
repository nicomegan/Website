<?php
  session_start();
  require_once 'Dao.php';
  $dao = new Dao();
  $title = htmlspecialchars($_REQUEST["title"]);
  $post = htmlspecialchars($_REQUEST["post"]);
  $empty = false;
  

  
  echo print_r($_FILES,true);
 	 echo error_log(" FILE: " . print_r($_FILES,true));

	 
 
 foreach($_FILES['files']['name'] as $key => $val){
	 if (empty($val)) {
		 $empty = true;
		 echo error_log("$key empty");
	} else {
		echo error_log("$key not empty");
		$imagePath = "Photos/" . $val;
	 
	 
	 if (!move_uploaded_file($_FILES["files"]["tmp_name"][$key], $imagePath)) {
			throw new Exception("File move failed " . print_r($_FILES["files"]["error"]),1);
			
		}
	}
	 
 }
 /*
 if(!$empty){
	  if (!move_uploaded_file($_FILES["files"]["tmp_name"][$key], $imagePath)) {
			throw new Exception("File move failed " . print_r($_FILES["files"]["error"]),1);
			
		}
 }
 */
  $dao->insertPost($title, $post);

  if (!empty($_FILES['files']['name'][0])){
	$dao->insertPhotos($_FILES['files']['name'], $title, $post);
  }
 
   header("Location: blogList.php");

 
 
 
 