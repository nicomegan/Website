<!DOCTYPE html>
<html>

	<link rel="stylesheet" type="text/css" href="home.css">

<body>

<h2>New Post</h2>

<form action="NewPostHandler.php" method="post" id="postform" enctype="multipart/form-data">
  Title:<br>
  <input type="text" name="title" class="title" required>
  <br>
  Post:<br>  
    <textarea rows="25" cols="75" name="post" > </textarea>
  <br><br>
   
	<input type="file" name="files[]" id="files" multiple></div>



 <div> <input type="submit" value="Submit"> </div>
 
	
</form> 









</body>
</html>


