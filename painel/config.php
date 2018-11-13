<?php
require 'environment.php';

$config = array();

if(ENVIRONMENT=='development'){

	$config['dbname'] = 'primeng';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
	$config['url_site'] = 'localhost';
	$config['dir'] = 'primeng/painel';

	define("BASE","http://".$config['url_site']."/".$config['dir']."/");

}else{

	$config['dbname'] = 'felicianoi93';
	$config['host'] = 'mysql.felicianoi9.com.br';
	$config['dbuser'] = 'felicianoi93';
	$config['dbpass'] = 'T97ju21@t@t';
	$config['url_site'] = 'www.felicianoi9.com.br';
	$config['dir'] = 'primeengenharia/painel';

	define("BASE","https://".$config['url_site']."/".$config['dir']."/");



}

global $db;

try {

	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass'] );

} catch(PDOException $e){

	echo "ERRO: ".$e->getMessage();
	exit;
}