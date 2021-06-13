<?php

include_once "./core/Application/AlumnTeamManager.php";
include_once "./core/Application/AlumnManager.php";
if(count($_POST)>0){

	$u = AlumnManager::addAlumn();
	$al_id =  $u[1];
	$t_id = $_POST["team_id"];

	AlumnTeamManager::addAlumnToTeam($al_id, $t_id);
print "<script>window.location='index.php?view=team&id=$_POST[team_id]';</script>";


}


?>