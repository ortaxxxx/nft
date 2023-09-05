<?php 
namespace App\Modules\Avalanche_network\Controllers\Admin;

class Avalanche_network extends BaseController {
    
     
    public function index()
	{   
	    $uri = service('uri','<?php echo base_url(); ?>');
	    $existEth 		= false;
	    $existEthTest 	= false;
	  	$existNetwork = $this->networks_model->where_rows('blockchain_network', [], 'id', 'desc'); 
	  	foreach ($existNetwork as $key => $exist) {
	  		if($exist->network_slug == 'avalanche'){
	  			$existEth = true;
	  		}
	  		else if($exist->network_slug == 'avalanche-testnet'){
	  			$existEthTest 	= true;
	  		}
	  	}
	  	
	    $data['existEth'] 		= $existEth;
	    $data['existEthTest'] 	= $existEthTest;
	    $data['networks'] 	= $this->networks_model->where_rows('avalanche_network', [], 'id', 'desc'); 
	    $data['title']      = display('customers_withdraw_request_list'); 
	    $data['content'] 	= $this->BASE_VIEW . '\index';

	    return $this->template->admin_layout($data);
	}

	public function activateNetwork()
	{
		 
		$net = $this->request->getVar('network'); 
		if(!empty($net)){

			$this->networks_model->update('blockchain_network', [], ['status' => 0]);
			$result = $this->networks_model->activateNetwork($net);

			die(json_encode(['status' => 'success', 'msg' => 'Successfully Activated']));

		}
		die(json_encode(['status' => 'success', 'msg' => 'Please Try Again']));
	}

 

	 
}