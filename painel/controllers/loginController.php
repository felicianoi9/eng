<?php
class loginController extends Controller{

	public function index(){

		$data = array();

		if(isset($_POST['email'])&& !empty($_POST['email']) ){

			$email = addslashes($_POST['email']);
			$pass = md5(addslashes($_POST['password']));

			$u = new Users();

			if($u->doLogin($email, $pass)){

				$data['ok'] = "Entrando...";

				header('Location: '.BASE);
				exit;
			}else{
				$data['error'] = "E-mail e/ou senha incorretos!";
			}

		}

		$this->loadView('login',$data);
	}

	public function logout(){

		$u = new Users();
		$u->logout();
		
		header('Location: '.BASE);
		
		
	}


}