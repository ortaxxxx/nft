<div class="row">
    <div class="col-md-6 col-lg-6  offset-md-3">
        <div class="card mb-4 flex-fill w-100">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fs-17 font-weight-600 mb-0"><?php echo (!empty($title)?$title:null) ?></h6>
                    </div>
                    <div class="text-right">
                        <a href= "<?php echo base_url('/backend/kyc/kyc-verify-confirm/'.$user->uid) ?>"   class="btn btn-success"  title="Verify">
                            <i class="fa fa-check-circle fa-lg"></i> Confirm
                        </a>
                    </div>
                </div>
            </div>            
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th class="" width="35%"><?php echo display('user_id') ?></th>
                                <th class="" width="5%">:</th>
                                <td class="" width="60%"><?php echo esc($user->user_id) ?></td>
                            </tr>
                            <tr>
                                <th class="" width="35%"><?php echo display('verify_type') ?></th>
                                <th class="" width="5%">:</th> 
                                <td class="" width="60%"><?php echo esc($user_verify_doc->verify_type) ?></td>
                            </tr>
                            <tr> 
                                <th class="" width="35%"><?php echo display('first_name') ?></th>
                                <th class="" width="5%">:</th>
                                <td class="" width="60%"><?php echo esc($user_verify_doc->first_name) ?></td>
                            </tr>
                            <tr> 
                                <th class="" width="35%"><?php echo display('last_name') ?></th>
                                <th class="" width="5%">:</th>
                                <td class="" width="60%"><?php echo esc($user_verify_doc->last_name) ?></td>
                            </tr>
                            <tr> 
                                <th class="" width="35%"><?php echo display('passport_nid_license_number') ?></th>
                                <th class="" width="5%">:</th>
                                <td class="" width="60%"><?php echo esc($user_verify_doc->id_number) ?></td>
                            </tr> 
                            <tr> 
                                <th class="" width="35%"><?php echo display('gender') ?></th>
                                <th class="" width="5%">:</th>
                                <td class="" width="60%"><?php echo esc($user_verify_doc->gender ? display('male') : display('female')) ?></td>
                            </tr>
                             <?php if($user_verify_doc->verify_type == 'passport'){?>
                                <tr> 
                                    <th class="" width="35%"><?php echo display('document1') ?></th>
                                    <th class="" width="5%">:</th>
                                    <td class="" width="60%"><img src="<?php echo base_url($user_verify_doc->document1)?>" alt="Image" height="100"></td>
                                </tr>
                                <tr> 
                                    <th class="" width="35%"><?php echo display('document2') ?></th>
                                    <th class="" width="5%">:</th>
                                    <td class="" width="60%"><img src="<?php echo base_url($user_verify_doc->document2)?>" alt="Image" height="100"></td>
                                </tr>
                            <?php } else{?>
                                <tr> 
                                    <th class="" width="35%"><?php echo display('document1') ?></th>
                                    <th class="" width="5%">:</th>
                                    <td class="" width="60%"><img src="<?php echo base_url($user_verify_doc->document1)?>" alt="Image" height="100"></td>
                                </tr>
                            <?php } ?> 
                        </tbody>
                    </table>  
                </div>
            </div>
        </div>
    </div>

     
   
</div>

 