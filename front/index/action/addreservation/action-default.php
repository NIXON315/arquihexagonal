<?php

include_once "./core/Application/EventManager.php";

EventManager::addEvent();
Core::redir("./index.php?view=reservations");
?>