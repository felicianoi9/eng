<?php
class reportsController extends Controller {

    public function __construct() {
        $u = new Users();

        if($u->isLogged() == false){
        	header("Location: ".BASE."login");
        }
    }

    public function index() {
    	$data = array();

        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_name'] = $u->getName();

        
        
        if($u->hasPermission('reports_view')){
        	
            
            
            $this->loadTemplate("reports", $data);

        }else{
            header("Location: ".BASE);
        }	
    }

    public function sales() {
        $data = array();

        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_name'] = $u->getName();

        $data['statuses'] = array(
            '0'=>'Aguardando Pgto.',
            '1'=>'Pago',
            '2'=>'Cancelado'
        );
        
        if($u->hasPermission('reports_view')){
            
            
            
            $this->loadTemplate("reports_sales", $data);

        }else{
            header("Location: ".BASE);
        }   
    }

    public function sales_pdf(){
        $data = array();

        $u = new Users();
        $u->setLoggedUser();
       

        $data['statuses'] = array(
            '0'=>'Aguardando Pgto.',
            '1'=>'Pago',
            '2'=>'Cancelado'
        );
        
        if($u->hasPermission('reports_view')){
            $client_name = addslashes($_GET['client_name']);
            $period1 = addslashes($_GET['period1']);
            $period2 = addslashes($_GET['period2']);
            $status = addslashes($_GET['status']);
            $order = addslashes($_GET['order']);

            $s = new Sales();

            $data['sales_list'] = $s->getSalesFiltered($u->getCompany(), $client_name, $period1, $period2, $status, $order );   
            $data['filters'] = $_GET ; 

            $this->loadLibrary('autoload');    
            ob_start();
            $this->loadView("reports_sales_pdf", $data);
            $html = ob_get_contents();
            ob_end_clean();

            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            header("Location: ".BASE);
        }       
    }

     public function inventory() {
        $data = array();

        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_name'] = $u->getName();

        
        
        if($u->hasPermission('reports_view')){
            
            
            
            $this->loadTemplate("reports_inventory", $data);

        }else{
            header("Location: ".BASE);
        }   
    }

    public function inventory_pdf(){
        $data = array();

        $u = new Users();
        $u->setLoggedUser();
               
        if($u->hasPermission('reports_view')){
            $i = new Inventory();

            $data['inventory_list'] = $i->getInventoryFiltered($u->getCompany() ); 
            $data['filters'] = $_GET;

            if($data['inventory_list'][0]['dif']<0){
                $data['inventory_list'][0]['dif']=0;
            }

             
            $this->loadLibrary('autoload');    
            ob_start();
            $this->loadView("reports_inventory_pdf", $data);
            $html = ob_get_contents();
            ob_end_clean();

            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            header("Location: ".BASE);
        }       
    }

    public function purchases() {
        $data = array();

        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_name'] = $u->getName();

        $this->loadTemplate("ops", $data);

         
    }
    public function clients() {
        $data = array();

        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_name'] = $u->getName();

        $this->loadTemplate("ops", $data);

         
    }
    public function providers() {
        $data = array();

        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_name'] = $u->getName();

        $this->loadTemplate("ops", $data);

         
    }
}    