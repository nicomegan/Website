<?php
  session_start();
  require_once 'Dao.php';
  $dao = new Dao();
  #echo "<pre>" . print_r($_FILES, 1) . "</pre>";
  #exit;
  $username = $_REQUEST["username"];
  $password = $_REQUEST["password"];
  $user = $dao->login($username);

  $valid = true;
  $messages = array();
  
  
  if (empty($username)) {
    $messages[] = "PLEASE ENTER A USERNAME";
    $valid = false;
  }
  
  if (empty($password)){
	$messages[] = "PLEASE ENTER A PASSWORD";
    $valid = false;
  }
  
  
  if (!$user){
	$messages[] = "User does not exist";
	$valid = false;
  }
  else{
	  $ID = $dao->getUserID($username);
	  $pass = $dao->getPassword($ID);
	  	 error_log(" UserID from Dao: " . $ID);
	  	 error_log(" Password from Post: " . $password);
	  	 error_log(" Password from Post: " . $password);
		 error_log(" Password from Dao: " . $pass);


	 // if(!password_verify($password, $hash)){
		 if($password != $pass){
		$messages[] = "Incorrect Password";
		$valid = false;
	  } else{
		$messages[] = "Welcome $username";
		$_SESSION['currentUser'] = $username;
		$valid = true;
	  }
  
  }

 

  if (!$valid) {
    $_SESSION['sentiment'] = "bad";
    $_SESSION['messages'] = $messages;
	header("Location: login.php");
    exit;
  }
  
  $_SESSION['sentiment'] = "good";
  
  header("Location: index.php");

  exit;
  
  ?>