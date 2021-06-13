<?php
include_once "./core/Application/PostManager.php";
if(isset($_POST)){	
	PostManager::addPost();
 	print "<script>window.location='index.php?view=newpost';</script>";
}
