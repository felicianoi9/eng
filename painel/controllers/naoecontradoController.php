<?php
class naoencontradoController extends Controller{

	public function __construct(){
		
		$u = new Users();
		if($u->isLogged()==false){
			header('Location: '.BASE.'login');
		}
	}

	public function index(){

		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());

		$data['company_name'] = $company->getName();		
		$data['user_name'] = $u->getName();
		
		$this->loadTemplate('naoencontrado',$data);
	}

	


}