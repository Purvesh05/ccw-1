<?php

$roll_no = 501550;
$name = "Harshit Rai";

?>




<!DOCTYPE html>
<html>
<head>
	<title>CC : Add Blogs</title>
</head>
<body>
	<div id="add_blog_div">
		<form id="add_blog" method="POST" action="blog_upload.php">
			<label>Roll No : </label>
			<input name="roll_no" type='text' required="true" disabled="true" value="<?=$roll_no?>">
			<br>
			<label>Author's Name : </label>
			<input name="author" type='text' required='true' disabled="true" value="<?=$name?>">
			<br>
			<label>Blog Title :</label>
			<input name="title" type="text" required="true"><br>
			<label>Blog Content</label>
			<textarea name="content" type="text" required="true" form="add_blog"></textarea><br>
			<input type="submit" value="UPLOAD BLOG" name="blog_upload">

		</form>
	</div>
</body>
</html>