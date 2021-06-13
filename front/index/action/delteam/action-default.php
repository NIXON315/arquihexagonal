<?php
include_once "./core/Application/TeamManager.php";

TeamManager::deleteTeamById($_GET["id"]);

print "<script>window.location='index.php?view=teams';</script>";

?>