<?php

//require_once 'KLogger.php';
class Dao {
  private $host = "us-cdbr-iron-east-05.cleardb.net"; //"localhost";
  private $db = "heroku_91a63d0f5d5bb3f"; //"MeganDatabase";
  private $user = "bb9ed37c91e92c"; //"root";
  private $pass = "f6fe1a54"; //"";
 // protected $logger;
 
 
   private function getConnection () {
    try {
      $conn =
        new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->pass);
     // $this->logger->logDebug("Established a database connection.");
      return $conn;
    } catch (Exception $e) {
      echo "connection failed: " . $e->getMessage();
     // $this->logger->logFatal("The database connection failed.");
    }
  }
  
  
  public function getPosts(){
	 $conn = $this->getConnection();
     $query = $conn->prepare("select * from posts order by DatePosted desc");
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
     $results = $query->fetchAll();
     //$this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
     return $results;
  }
  
  public function getPost($PostID){
	 $conn = $this->getConnection();
     $query = $conn->prepare("select * from posts where ID = :PostID");
	 $query->bindParam(':PostID', $PostID);
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
     $results = $query->fetch();
     //$this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
     return $results;
  }
  
  public function login($username){
	 $conn = $this->getConnection();
     $query = $conn->prepare("select * from Users where Username = :username");
	 $query->bindParam(':username', $username);
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
     $results = $query->fetchAll();
		 
     //$this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
     return !empty($results);
	  
  }
  
  
  public function insertPost($title, $post){
	 $conn = $this->getConnection();
     $query = $conn->prepare("insert into Posts (Title, PostContent) values (:title, :post)");
	 $query->bindParam(':title', $title);
	 $query->bindParam(':post', $post);
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
	
  }
  
  private function getPostID($title, $post){
	 $conn = $this->getConnection();
     $query = $conn->prepare("select ID from Posts where Title = :title and PostContent = :post");
	 $query->bindParam(':title', $title);
	 $query->bindParam(':post', $post);
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
	 $results = $query->fetch();
	 error_log(" GET POST ID RESULT: " . print_r($results,true));
	 return $results['ID'];
  }
  
  public function getAccess($username){
	  $conn = $this->getConnection();
     $query = $conn->prepare("select access from Users where Username = :username");
	 $query->bindParam(':username', $username);
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
	 $results = $query->fetch();
	 error_log(" GET ACESS RESULT: " . print_r($results,true));
	 return $results['access'];
  }
  
  
  public function insertPhotos($photos, $title, $post){
	$conn = $this->getConnection();
	$postID = $this->getPostID($title, $post);
	foreach($photos as $photo){
		$query = $conn->prepare("insert into Photos (Title, PostID) values (:photo, :postID)");
		$query->bindParam(':photo', $photo);
		$query->bindParam(':postID', $postID);
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->execute();
	  }
	  
  }
  
  public function getPhotos($PostID){
	 $conn = $this->getConnection();
     $query = $conn->prepare("select * from Photos where PostID = :PostID");
	 $query->bindParam(':PostID', $PostID);
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
	 $results = $query->fetchAll();
	 return $results;
  }
  
  public function getAllPhotos(){
	 $conn = $this->getConnection();
     $query = $conn->prepare("select * from Photos order by datePosted desc");
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
	 $results = $query->fetchAll();
	 return $results;
  }
  
  
  public function getDate($PostID){
	 $conn = $this->getConnection();
     $query = $conn->prepare("SELECT DATE_FORMAT(select date(, '%M %d, %Y');");
	 $query->bindParam(':PostID', $PostID);
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
	 $results = $query->fetchAll();
	 return $results;
  }
  
    public function newUser($rName, $username, $password){
	 $conn = $this->getConnection();
     $query = $conn->prepare("insert into Users (Name, Username, Password) values (:rName, :username, :password)");
	 $query->bindParam(':rName', $rName);
	 $query->bindParam(':username', $username);
	 $query->bindParam(':password', $password);
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();  
  }
  
  
    public function deletePost($PostID){
	 $conn = $this->getConnection();
     $query1 = $conn->prepare("DELETE FROM Photos where PostID = :PostID");
	 $query1->bindParam(':PostID', $PostID);
     $query1->setFetchMode(PDO::FETCH_ASSOC);
     $query1->execute();
	 
	 $query2 = $conn->prepare("DELETE FROM Posts where ID = :PostID");
	 $query2->bindParam(':PostID', $PostID);
     $query2->setFetchMode(PDO::FETCH_ASSOC);
     $query2->execute();
  }
  
  
    public function getUserID($username){
	 $conn = $this->getConnection();
     $query = $conn->prepare("select ID from Users where Username = :username");
	 $query->bindParam(':username', $username);
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
     $results = $query->fetch();
		 
     //$this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
	 	  	 error_log(" GET UserID REsult: " . print_r($results,true));

     return $results['ID'];
	  
  }
  
  
	public function getPassword($UserID){
	 $conn = $this->getConnection();
     $query = $conn->prepare("SELECT Password from Users where ID = :UserID");
	 $query->bindParam(':UserID', $UserID);
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
	 $results = $query->fetch();
	 	 	  	 error_log(" GET Password REsult: " . print_r($results,true));

	 return $results['Password'];
  }
  
  
  
  
  
}
?>