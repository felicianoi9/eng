<?php
class Empresa extends Model{

	public function getInfo(){
		$array = array();
		$sql = "SELECT texto, missao, visao, valores FROM site_empresa WHERE id=1 ";
		$sql = $this->db->query($sql);
		if($sql->rowCount()>0){
			$array = $sql->fetch();
		}

		return $array;
	}

	
}