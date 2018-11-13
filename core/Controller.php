<?php
class Controller {

	private $empresa;

	public function __construct(){
		$emp = new Empresa();
		$this->empresa = $emp->getInfo();
		
	}

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

}