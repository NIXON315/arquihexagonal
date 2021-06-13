<?php
include_once "./core/Application/UserManager.php";
if(count($_POST)>0){
	$is_admin=0;
	if(isset($_POST["is_admin"])){$is_admin=1;}
	UserManager::registerUser();

print "<script>window.location='index.php?view=users';</script>";


}


?>