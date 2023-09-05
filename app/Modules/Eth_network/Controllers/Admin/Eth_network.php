<?php 
namespace App\Modules\Eth_network\Controllers\Admin;

class Eth_network extends BaseController {
    
     
    public function index()
	{    

	    $uri = service('uri','<?php echo base_url(); ?>');
	    $existEth 		= false;
	    $existEthTest 	= false;
	  	$existNetwork = $this->networks_model->where_rows('blockchain_network', [], 'id', 'desc'); 

	  	foreach ($existNetwork as $key => $exist) {
	  		if($exist->network_slug == 'eth'){
	  			$existEth = true;
	  		}
	  		else if($exist->network_slug == 'ropsten'){
	  			$existEthTest 	= true;
	  		}
	  	}
	  	
	    $data['existEth'] 		= $existEth;
	    $data['existEthTest'] 	= $existEthTest;
	    $data['networks'] = $this->networks_model->where_rows('eth_network', [], 'id', 'desc'); 
	    $data['title']      = display('customers_withdraw_request_list'); 
	    $data['content'] 	= $this->BASE_VIEW . '\index';

	    return $this->template->admin_layout($data);
	}

	public function activateNetwork()
	{
		$net = $this->request->getVar('network');
		if(!empty($net)){

		  	$existNetwork = $this->networks_model->where_row('blockchain_network', ['network_slug' => $net]); 
		  	
		  	if(!empty($existNetwork)){ 
		  		die(json_encode(['status' => 'success', 'msg' => 'Already Exist']));
		  	} 

			$this->networks_model->update('blockchain_network', [], ['status' => 0]);
			$result = $this->networks_model->activateNetwork($net);

			die(json_encode(['status' => 'success', 'msg' => 'Successfully Activated']));

		}
		die(json_encode(['status' => 'success', 'msg' => 'Please Try Again']));
	}

 

	 
}