<?php
include_once "./core/Application/EventManager.php";
if(count($_POST)>0){

	EventManager::updateEvent();

	print "<script>window.location='index.php?view=reservations';</script>";


}


?>