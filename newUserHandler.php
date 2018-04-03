<?php
  session_start();
  require_once 'Dao.php';
  $dao = new Dao();
  #echo "<pre>" . print_r($_FILES, 1) . "</pre>";
  #exit;
  $rName = $_REQUEST["rname"];
  $username = $_REQUEST["username"];
  $password = $_REQUEST["password"];
  $user = $dao->login($username);
  $hash = $dao->getPassword();

  //$_SESSION['presets'] = array($_POST);
  $valid = true;
  $messages = array();
  
  if (empty($rName)){
	$messages[] = "PLEASE ENTER YOUR NAME";
	$valid = false;
  }
  
  
  if (empty($username)) {
    $messages[] = "PLEASE ENTER A USERNAME";
    $valid = false;
  }
  
  if (empty($password)){
	$messages[] = "PLEASE ENTER A PASSWORD";
    $valid = false;
  }
  
  
	$upper = preg_match('@[A-Z]@', $password);
	$lower = preg_match('@[a-z]@', $password);
	$num    = preg_match('@[0-9]@', $password);

  if(!$upper || !$lower || !$num || strlen($password) < 8) {
	$_SESSION['text'] = "Password not valid";
	  	header("Location: newUser.php");
		exit;
	} 
  
  if (!$user){
	$dao->newUser($rName, $username, $password);
	$messages[] = "User $username Created";
	$_SESSION['currentUser'] = $username;
	$valid = true;
  } 
  else{
	$messages[] = "Username $username already taken";
	$valid = false;
  }
 

  if (!$valid) {
    $_SESSION['sentiment'] = "bad";
    $_SESSION['messages'] = $messages;
	header("Location: newUser.php");
    exit;
  }
  
  $_SESSION['sentiment'] = "good";
  
  header("Location: index.php");

  exit;
	 
  ?>