<?php
class ajaxController extends Controller{

	public function __construct(){
		
		$u = new Users();
		if($u->isLogged()==false){
			header('Location: '.BASE.'login');
		}
	}

	public function index(){}

	public function searchClients(){
		$data = array();
                $u = new Users();
                $u->setLoggedUser();
                $company = new Companies($u->getCompany());
                $c = new Clients();
                if(isset($_GET['m']) && !empty($_GET['m'])){
                	$m = $_GET['m'];
                	$clients = $c->searchClientByName($m, $u->getCompany());
                	
                        if($u->hasPermission('clients_edit')){
                                foreach ($clients as $citem) {
                                        $data[] = array(
                                                'name'=>$citem['name'],
                                                'link'=>BASE.'clients/edit/'.$citem['id'],
                                                'id'  => $citem['id']

                                        );
                                }
                        }else{
                                if($u->hasPermission('clients_view')){
                                        foreach ($clients as $citem) {
                                                $data[] = array(
                                                        'name'=> $citem['name'],
                                                        'link'=> BASE.'clients/view/'.$citem['id'],
                                                        'id'  => $citem['id']

                                                );
                                        }
                                }

                        }
                	
                	
                }        

                echo json_encode($data);
	}



    public function searchProviders(){
                $data = array();

                $u = new Users();
                $u->setLoggedUser();
                

                $p = new Providers();

                if (isset($_GET['m']) && !empty($_GET['m'])){
                    $q = addslashes($_GET['m']);

                    $providers = $p->searchClientByName($q, $u->getCompany() );

                    if($u->hasPermission('providers_edit')){
                                foreach ($providers as $citem) {
                                        $data[] = array(
                                                'name'=>$citem['name'],
                                                'link'=>BASE.'providers/edit/'.$citem['id']

                                        );
                                }
                    }else{
                                if($u->hasPermission('providers_view')){
                                        foreach ($providers as $citem) {
                                                $data[] = array(
                                                        'name'=>$citem['name'],
                                                        'link'=>BASE.'providers/view/'.$citem['id']

                                                );
                                        }
                                }

                    }

                    
                }

                echo json_encode($data);
    }

    public function searchProvidersToPurchases(){
                $data = array();

                $u = new Users();
                $u->setLoggedUser();
                

                $p = new Providers();

                if (isset($_GET['m']) && !empty($_GET['m'])){
                    $q = addslashes($_GET['m']);

                    $data = $p->searchClientByName($q, $u->getCompany() );

                    

                    
                }

                echo json_encode($data);
    }

    public function searchInventory(){

        $data = array();

                $u = new Users();
                $u->setLoggedUser();
                

                $i = new Inventory();

                if (isset($_GET['m']) && !empty($_GET['m'])){
                    $m = addslashes($_GET['m']);

                    $inventory = $i->searchProductsByName($m, $u->getCompany() );
                    
                   
                    foreach ($inventory as $citem) {
                        $data[] = array(
                           'name'=>$citem['name'],
                           'link'=>BASE.'inventory/edit/'.$citem['id']
                        );
                    }

                    if($u->hasPermission('inventory_edit')){
                                foreach ($inventory as $citem) {
                                        $data[] = array(
                                                'name'=>$citem['name'],
                                                'link'=>BASE.'inventory/edit/'.$citem['id']

                                        );
                                }
                    }
                    if($u->hasPermission('inventory_view')){
                        foreach ($inventory as $citem) {
                            $data[] = array(
                                'name'=>$citem['name'],
                                'link'=>BASE.'inventory/view/'.$citem['id']
                            );
                        }
                    }
                    if($u->hasPermission('inventory_add')){
                        foreach ($inventory as $citem) {
                            $data[] = array(
                                'name'=>$citem['name'],
                                'link'=>BASE.'inventory/view/'.$citem['id']
                            );
                        }
                    }

                    

                    
                }

    }

    public function add_client(){
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $c = new Clients();

        if (isset($_POST['name']) && !empty($_POST['name'])){
            $name = addslashes($_POST['name']);

            $data['id'] = $c->add($u->getCompany(), $name);            
        }

        echo json_encode($data);
    }

    public function add_provider(){
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $p = new Providers();

        if (isset($_POST['name']) && !empty($_POST['name'])){
            $name = addslashes($_POST['name']);

            $data['id'] = $p->add($u->getCompany(), $name);            
        }

        echo json_encode($data);
    }

     public function searchProducts(){
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $i = new Inventory();

        if (isset($_GET['m']) && !empty($_GET['m'])){
            $m = addslashes($_GET['m']);

            $products = $i->searchProductsByName($m, $u->getCompany() );
            foreach ($products as $pitem) {
                        $data[] = array(
                           'name'=>$pitem['name'],
                           'link'=>BASE.'inventory/edit/'.$pitem['id'],
                           'id'  =>$pitem['id']
                        );
            }
           
        }

        echo json_encode($data);
    }

    public function searchProductsToSales(){
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $i = new Inventory();

        if (isset($_GET['m']) && !empty($_GET['m'])){
            $m = addslashes($_GET['m']);

            $data = $i->searchProductsByName($m, $u->getCompany() );
            

            
        }

        echo json_encode($data);
    }

} 