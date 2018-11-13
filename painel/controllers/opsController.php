<?php

class opsController extends Controller{

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

		

			$permissions = new Permissions();
			$data['permissions_list']= $permissions->getList($u->getCompany());
			$data['permissions_group_list'] = $permissions->getGroupList($u->getCompany());

			$data['users_list'] = $u->getList($u->getCompany());

		
		

		$this->loadTemplate('ops',$data);
		
	}
}	