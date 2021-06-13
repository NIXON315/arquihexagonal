<?php
if(isset($_POST)){
	print_r($_POST);
include_once "./core/Application/BlockManager.php";
BlockManager::addBlock();
Core::redir("./?view=blocks&team_id=".$_POST["team_id"]);
}
?>