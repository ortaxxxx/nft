<?php $uri = service('uri','<?php echo base_url(); ?>');?>
  
<div class="row">

    <?php foreach ($networks as $key => $network) {  ?>
    <div class="col-md-6 col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fs-17 font-weight-600 mb-0"><?php echo esc($network->network_name); ?></h6> 
                    </div>
                    <?php if(($network->network_slug == 'avalanche-testnet' && $existEthTest == false) || ($network->network_slug == 'avalanche' && $existEth == false)){ ?>
                        <div class="active_now_btn">
                            <a href="javascript:;" id="<?php echo esc($network->network_slug); ?>" class="btn btn-danger avax_network_active">Active now</a>
                        </div> 
                    <?php } ?>
                </div>
            </div>            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover">
                        <?php if (!empty($network)){ ?> 
                        
                        <tr>
                            <th><?php echo display('Network_Name'); ?></th>
                            <td><?php echo ($network->network_name == 'bsc') ? display('Binance_Smart_Chain') : esc($network->network_name); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo display('Chain_ID'); ?></th>
                            <td><?php echo esc($network->chain_id); ?></td>
                        </tr>
                         <tr>
                            <th><?php echo display('Symbol'); ?></th>
                            <td><?php echo esc($network->currency_symbol); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo display('RPC'); ?></th>
                            <td><?php echo esc($network->rpc_url); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo display('Block_Explorer_URL'); ?></th>
                            <td><?php echo esc($network->explore_url); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo display('status'); ?></th>
                            <td>
                                <?php 
                               
                                if ($network->network_slug == 'polygon' || $network->network_slug == 'polygon-testnet') {
                                    echo '<span class="btn btn-success">Active default</span>';
                                }
                                else if(($network->network_slug == 'ftm-testnet' && $existEthTest == true) || ($network->network_slug == 'ftm' && $existEth == true)){ ?> 
                                    <div>
                                        <a href="javascript:;" class="btn btn-success">Active</a>
                                    </div> 

                                <?php 
                                } 
                                else 
                                    echo '<a href="javascript:;" class="btn btn-warning">Inactive</a>';
                                ?>
                                    
                            </td>
                        </tr>
                         
                        <?php  
                    }else{
                       echo "<span class='text-danger'>".display('Not found')." </span>"; 
                   }  
                    ?>
                    </table>  
                </div> 
            </div>
        </div>

    </div>
    <?php } ?>
   
   
</div> 
<script src="<?php echo base_url("app/Modules/Avalanche_network/Assets/Admin/js/custom.js"); ?>"></script>


 
 