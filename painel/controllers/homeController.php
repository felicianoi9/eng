<?php
class homeController extends Controller{

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

		$sp = new Sales();
		$ex = new Expenses();

		$data['statuses'] = array(
            '0'=>'Aguardando Pgto.',
            '1'=>'Pago',
            '2'=>'Cancelado'
        ); 

		$data['products_sold'] = $sp-> getSoldProducts(date('Y-m-d',strtotime('-30 days')), date('Y-m-d'), $u->getCompany());
		$data['revenue'] = $sp->getTotalRevenue(date('Y-m-d',strtotime('-30 days')), date('Y-m-d', strtotime('+1 days')), $u->getCompany());
		$data['revenue'] = number_format($data['revenue'],2);
		$data['revenue'] = str_replace(',','', $data['revenue'] );
		$data['revenue'] = str_replace('.',',', $data['revenue'] );
		        
       
		$data['expense'] = $sp->getTotalExpenses(date('Y-m-d',strtotime('-30 days')), date('Y-m-d' , strtotime('+1 days')), $u->getCompany()) ;
		$data['expense']+= $ex->getTotalExpenses(date('Y-m-d',strtotime('-30 days')), date('Y-m-d' , strtotime('+1 days')), $u->getCompany()) ;
		$data['expense'] = number_format($data['expense'],2);
		$data['expense'] = str_replace(',','', $data['expense'] );
		$data['expense'] = str_replace('.',',', $data['expense'] );

		$data['days_list'] = array();
		for($q=30;$q>=0;$q--){
			$data['days_list'][] = date('d/m', strtotime('-'.$q.' days') );
		}
		$data['revenue_list'] = $sp->getRevenueList(date('Y-m-d',strtotime('-30 days')), date('Y-m-d', strtotime('+1 days')), $u->getCompany());

		$data['expense_list'] = $ex->getExpensesList(date('Y-m-d',strtotime('-30 days')), date('Y-m-d',strtotime('+1 days')), $u->getCompany());

		$data['status_list'] = $sp->getQuantStatusList(date('Y-m-d',strtotime('-30 days')), date('Y-m-d',strtotime('+1 days')), $u->getCompany());

		$data['status_name_list'] =

		$this->loadTemplate('home',$data);
	}

	


}