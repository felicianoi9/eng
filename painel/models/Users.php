<?php
class Users extends Model{

	private $userInfo;
	private $permissions;		

	public function isLogged(){

		if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])){

			return true;
		}else{
			return false;
		}
	}

	public function doLogin($email, $pass){


		$sql = $this->db->prepare("SELECT * FROM users WHERE email=:email AND password=:password ");
		$sql->bindValue(':email', $email);
		$sql->bindValue(':password', $pass);
		$sql->execute();



		
		if($sql->rowCount()>0){
			$row = $sql->fetch();
			
			
			$_SESSION['ccUser'] = $row['id'];

			$ip = $_SERVER['REMOTE_ADDR'];
			$id_user = $row['id'];
			$id_company = $row['id_company'];
			
			$this->loginHistory($id_user, $id_company, $ip);

			return true;
		}else{

			return false;
		}

	}

	public function loginHistory($id_user, $id_company, $ip){
		$sql = $this->db->prepare("INSERT INTO log_in (id_user, id_company, ip, date_log) VALUES (:id_user, :id_company, :ip, NOW()) ");
		$sql->bindValue(':id_user', $id_user);
		$sql->bindValue(':id_company', $id_company);
		$sql->bindValue(':ip', $ip);
		$sql->execute();
	}

	public function setLoggedUser(){

		if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])){

			$id = $_SESSION['ccUser'];

			$sql = $this->db->prepare("SELECT * FROM users WHERE id=:id ");
			$sql->bindValue(':id', $id);
			$sql->execute();

			
			if($sql->rowCount()>0){

				$this->userInfo = $sql->fetch();
				$this->permissions = new Permissions();
				$this->permissions->setGroup($this->userInfo['id_group'], $this->userInfo['id_company'] );


			}

		}

	}

	public function getInfo($id='', $id_company=''){
		$array= array();

		if(empty($id) && empty($id_company)){
			return $this->userInfo;
		}else{
			$sql = $this->db->prepare("SELECT * FROM users WHERE id=:id AND id_company=:id_company");
			$sql->bindValue(':id',$id);
			$sql->bindValue(':id_company',$id_company);
			$sql->execute();
			if($sql->rowCount()>0){
				$array = $sql->fetch();
			}

		}

		return $array;
		
	}

	public function getCompany(){

		if(isset($this->userInfo['id_company'])){
			return $this->userInfo['id_company'];
		}else{
			return 0;
		}

		
	}

	public function getPermissions(){
		return $this->permissions;
	}

	public function findUsersInGroup($id){
		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM users WHERE id_group = :id_group ");
		$sql->bindValue(':id_group',$id);
		$sql->execute();
		$row = $sql->fetch();
		if($row['c'] =='0'){
			return false;
		}else{
			return true;
		}
	}

	public function getName(){

		if(isset($this->userInfo['name'])){
			return $this->userInfo['name'];
		}else{
			return 0;
		}

		
	}

	public function getId(){
		if(isset($this->userInfo['id'])){
			return $this->userInfo['id'];
		}else{
			return 0;
		}
	}

	public function logout(){
		unset($_SESSION['ccUser']);
	}

	public function hasPermission($name){
		return $this->permissions->hasPermission($name); 

		

	}

	public function getList($id_company){
		$array=array();
		$sql = $this->db->prepare("
			SELECT
				users.id,
				users.name,
				users.email,
				permission_groups.group_name
			FROM users 
			LEFT JOIN permission_groups ON permission_groups.id = users.id_group
			WHERE users.id_company = :id_company ");
		$sql->bindValue(':id_company', $id_company);
		$sql->execute();

		if($sql->rowCount()>0){
			$array = $sql->fetchAll();
		}

		return $array;
	} 

	public function add($name, $pass, $email, $group, $id_company){
		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM users WHERE email=:email");
		$sql->bindValue(':email',$email);
		$sql->execute();
		$row = $sql->fetch();

		if($row['c']=='0'){

			$sql = $this->db->prepare("INSERT INTO users SET name=:name , password=:password, email=:email, id_group=:id_group, id_company = :id_company");
			$sql->bindValue(':name',$name);
			$sql->bindValue(':password',$pass);
			$sql->bindValue(':email',$email);
			$sql->bindValue(':id_group',$group);
			$sql->bindValue(':id_company',$id_company);
			$sql->execute();
			return '1'; 
		}else{
			return '0';
		}

		
	}

	public function del($id, $id_company){
		$sql = $this->db->prepare("DELETE FROM users WHERE id = :id AND id_company=:id_company");
		$sql->bindValue('id',$id);
		$sql->bindValue('id_company',$id_company);
		$sql->execute();
	}

	public function edit($name, $pass, $group, $id, $id_company){
		$sql = $this->db->prepare("UPDATE users SET name=:name , id_group=:id_group WHERE id=:id AND id_company = :id_company");
		$sql->bindValue(':name',$name);
		$sql->bindValue(':id_group',$group);
		$sql->bindValue(':id_company',$id_company);
		$sql->bindValue(':id',$id);
		$sql->execute();

		if(!empty($pass)){

			$sql = $this->db->prepare("UPDATE users SET password=:password  WHERE id=:id AND id_company = :id_company");
			
			$sql->bindValue(':password',md5($pass));
			$sql->bindValue(':id_company',$id_company);
			$sql->bindValue(':id',$id);
			$sql->execute();

		}
	}
}