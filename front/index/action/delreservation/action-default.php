<?php

include_once "./core/Application/UserManager.php";
$user = EventManager::getEventById($_GET["id"]);
$user->del();
print "<script>window.location='index.php?view=reservations';</script>";

?>