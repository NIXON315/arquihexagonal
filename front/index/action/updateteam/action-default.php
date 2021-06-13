<?php

include_once "./core/Application/TeamManager.php";
if(count($_POST)>0){

TeamManager::updateTeam();
print "<script>window.location='index.php?view=teams';</script>";


}


?>