<?php
include_once "./core/Application/BlockManager.php";
$user = BlockManager::deleteBlock($_GET["id"]);
Core::redir("./?view=blocks&team_id=".$team);
?>