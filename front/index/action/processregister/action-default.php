<?php

include_once "./core/Application/UserManager.php";
if(!empty($_POST)){
	UserManager::registerUser();
	Core::alert("Registro Exitoso!, ya puedes a iniciar sesion con tu nombre de usuario y password.");
	Core::redir("./");
}


?>