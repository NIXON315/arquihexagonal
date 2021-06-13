<?php
include_once "./core/Application/CalificationManager.php";
if(!empty($_POST)){
	CalificationManager::addCalification();
}

?>