<?php
  session_start();
  require_once 'Dao.php';
  $dao = new Dao();
  $title = $_REQUEST["title"];
  $post = $_REQUEST["post"];
  $valid = true;

  
if(empty($_FILES) && empty($_REQUEST) ){ //catch file overload error...
				 echo error_log("not working");

       // $postMax = ini_get('post_max_size'); //grab the size limits...
        //echo "<p style=\"color: #F00;\">\nPlease note files larger than {$postMax} will result in this error!<br>Please be advised this is not a limitation in the CMS, This is a limitation of the hosting server.<br>For various reasons they limit the max size of uploaded files, if you have access to the php ini file you can fix this by changing the post_max_size setting.<br> If you can't then please ask your host to increase the size limits, or use the FTP uploaded form</p>"; // echo out error and solutions...
		header("Location: pictures.php");
		exit;
		}
else {// continue on with processing of the page...
  
  echo print_r($_FILES,true);
 	 echo error_log(" FILE: " . print_r($_FILES,true));

	 
 
 foreach($_FILES['files']['name'] as $key => $val){
	 if (empty($val)) {
		 echo error_log("$key empty");
	} else {
		echo error_log("$key not empty");
		$imagePath = "Photos/" . $val;
	 
	 
	 if (!move_uploaded_file($_FILES["files"]["tmp_name"][$key], $imagePath)) {
			$valid = false;
			//throw new Exception("File move failed " . print_r($_FILES["files"]["error"]),1);
			
		}
	}
	 
 }
  if(empty($_FILES) && empty($_POST) && isset($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) == 'post'){ //catch file overload error...
        $postMax = ini_get('post_max_size'); //grab the size limits...
        echo "<p style=\"color: #F00;\">\nPlease note files larger than {$postMax} will result in this error!<br>Please be advised this is not a limitation in the CMS, This is a limitation of the hosting server.<br>For various reasons they limit the max size of uploaded files, if you have access to the php ini file you can fix this by changing the post_max_size setting.<br> If you can't then please ask your host to increase the size limits, or use the FTP uploaded form</p>"; // echo out error and solutions...
        addForm(); //bounce back to the just filled out form.
}
elseif(// continue on with processing of the page...
 
	if (!move_uploaded_file($_FILES["files"]["tmp_name"][$key], $imagePath)) {
		$valid = false;
			//throw new Exception ("File move failed " . print_r($_FILES["files"]["error"]),1);		
		}
 
	if(!$valid){
		$_SESSION['text'] = "Image(s) too large";
		header("Location: CreatePost.php");
		exit;
	}
 
  $dao->insertPost($title, $post);

  if (!empty($_FILES['files']['name'][0])){
	$dao->insertPhotos($_FILES['files']['name'], $title, $post);
  }
  }
 
   header("Location: blogList.php");

 
 
 
 