<?php

require_once 'Dao.php';
$dao = new Dao();
$id = $_GET['id'];
$dao->deletePost($id);
header("Location: blogList.php");
exit;