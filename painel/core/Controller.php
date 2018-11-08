<?php
class Controller {

	public function loadView($viewName, $viewData = array()){

		extract($viewData); 

		require 'views/'.$viewName.'.php';

	}

	public function loadTemplate($viewName, $viewData = array()){

		extract($viewData); 

		require 'views/template.php';

	}

	public function loadViewInTemplate($viewName, $viewData = array()){

		extract($viewData); 

		require 'views/'.$viewName.'.php';

	}
	public function loadLibrary($uto){
		if(file_exists('libraries/vendor/'.$uto.'.php')){
			include 'libraries/vendor/'.$uto.'.php';
		}
		

	}

}