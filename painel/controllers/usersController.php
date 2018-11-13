<?php
class usersController extends Controller{

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

		if($u->hasPermission('users_view')){

			$permissions = new Permissions();
			$data['permissions_list']= $permissions->getList($u->getCompany());
			$data['permissions_group_list'] = $permissions->getGroupList($u->getCompany());

			$data['users_list'] = $u->getList($u->getCompany());

			$this->loadTemplate('users',$data);
		}else{
			header('Location: '.BASE.'ops');
		}
		
	}

	public function add(){

		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());

		$data['company_name'] = $company->getName();		
		$data['user_name'] = $u->getName();

		if($u->hasPermission('users_view')){

			$permissions = new Permissions();
			$data['permissions_list']= $permissions->getList($u->getCompany());
			$data['permissions_group_list'] = $permissions->getGroupList($u->getCompany());

			if(isset($_POST['name']) && !empty($_POST['name'])){
				$name = addslashes($_POST['name']);
				$pass = md5(addslashes($_POST['password']));
				$email = addslashes($_POST['email']);
				$group = addslashes($_POST['group']);

				$a = $u->add($name, $pass, $email, $group, $u->getCompany() );

				if($a=='1'){
					header('Location: '.BASE.'users');
				}else{
					$data['error_msg'] = "Já existe usuário com esse e-mail! ";
				}
				

			}

			$this->loadTemplate('users_add',$data);
		}else{
			header('Location: '.BASE);
		}
		
	}

	public function delete($id){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());

		$data['company_name'] = $company->getName();		
		$data['user_name'] = $u->getName();

		if($u->hasPermission('users_view')){

			$permissions = new Permissions();
			$data['permissions_list']= $permissions->getList($u->getCompany());
			$data['permissions_group_list'] = $permissions->getGroupList($u->getCompany());
			$data['users_list'] = $u->getList($u->getCompany());
			$u->del($id, $u->getCompany());
			
			
			$this->loadTemplate('users',$data);
		}else{
			header('Location: '.BASE);
		}

	}

	public function edit($id){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());

		$data['company_name'] = $company->getName();		
		$data['user_name'] = $u->getName();

		if($u->hasPermission('users_view')){

			$permissions = new Permissions();
			$data['permissions_list']= $permissions->getList($u->getCompany());
			$data['permissions_group_list'] = $permissions->getGroupList($u->getCompany());
			$data['user_info'] = $u->getInfo($id, $u->getCompany());

			if(isset($_POST['group']) && !empty($_POST['group'])){
				$name = addslashes($_POST['name']);
				$pass = md5(addslashes($_POST['password']));
				$group = addslashes($_POST['group']);

				$u->edit($name, $pass,  $group, $id, $u->getCompany() );
				header('Location: '.BASE.'users');

			}
			
			
			
			$this->loadTemplate('users_edit',$data);
		}else{
			header('Location: '.BASE);
		}

	}


}