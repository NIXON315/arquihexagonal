<?php
class Lb {

	public function Lb(){
		$this->get = new Get();
		$this->post = new Post();
		$this->request = new Request();
		$this->cookie = new Cookie();
		$this->session = new Session();
	}

	public function loadModule($module){
			if(!isset($_GET['module'])){
				Module::setModule($module);
				include_once "front/".$module."/autoload.php";
				include_once "front/".$module."/superboot.php";
				include_once "front/".$module."/init.php";
			}else{
				Module::setModule($_GET['module']);
				if(Module::isValid()){
					include_once "front/".$_GET['module']."/init.php";
				}else {
					Module::Error();
				}
			}

	}

}

?>