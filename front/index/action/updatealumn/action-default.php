<?php
include_once "./core/Application/AlumnManager.php";
if(count($_POST)>0){

AlumnManager::updateAlumno();
Core::alert("Actualizado Exitosamente!");
print "<script>window.location='index.php?view=team&id=$_POST[tid]';</script>";


}
