<?php
include_once "./core/Application/AlumnManager.php";

$id = $_GET["id"];

AlumnManager::deleteAlumno($id);

Core::redir("./?view=team&id=$_GET[tid]");
?>