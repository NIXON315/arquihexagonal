<?php

include "./core/Application/AlumnTeamManager.php"
if(!empty($_GET)){
	$al_id = $_GET["al_id"];
	$t_id = $_GET["t_id"];
	AlumnTeamManager::addAlumnToTeam($al_id, $t_id);
	Core::alert("Asignacion de grupo exitosa!");
	Core::redir("./?view=openalumn&id=".$al_id);
}


?>