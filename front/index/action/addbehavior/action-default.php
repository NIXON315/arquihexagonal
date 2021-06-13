<?php

include_once "./core/Application/BehaviorManager.php";

if(!empty($_POST)){
	BehaviorManager::addBehavior();
}

?>