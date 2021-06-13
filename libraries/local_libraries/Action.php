<?php

class Action {
	public static function load($action){
		
		if(!isset($_GET['action'])){
			include_once "front/".Module::$module."/action/".$action."/action-default.php";
		}else{


			if(Action::isValid()){
				include_once "front/".Module::$module."/action/".$_GET['action']."/action-default.php";				
			}else{
				Action::Error("<b>404 NOT FOUND</b> Action <b>".$_GET['action']."</b> folder  !!");
			}



		}
	}
	public static function isValid(){
		$valid=false;
		if(file_exists($file = "front/".Module::$module."/action/".$_GET['action']."/action-default.php")){
			$valid = true;
		}
		return $valid;
	}

	public static function Error($message){
		print $message;
	}

	public function execute($action,$params){
		$fullpath =  "front/".Module::$module."/action/".$action."/action-default.php";
		if(file_exists($fullpath)){
			include $fullpath;
		}else{
			assert("wtf");
		}
	}

}



?>