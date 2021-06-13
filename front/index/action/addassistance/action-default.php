<?php
include_once "./core/Application/AssistanceManager.php";
if(!empty($_POST)){
	AssistanceManager::addAssistence();
}

?>