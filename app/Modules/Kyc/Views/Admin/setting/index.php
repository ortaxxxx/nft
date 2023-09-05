<?php $uri = service('uri','<?php echo base_url(); ?>');?>
  
<div class="row">
    <div class="col-md-12 col-lg-12 "> 
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('Settings'); ?></h6>
                    </div> 
                </div>
            </div>            
            <div class="card-body">
                <div class="border_preview"> 
                    <?php echo form_open_multipart(base_url("backend/kyc/setting")) ?> 
                        
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="checkbox-inline">
                                    <?php 
                                        $data = [
                                            'name'    => 'email_verify',
                                            'id'      => 'email_verify',
                                            'value'   => 1,
                                            'checked' => $setting->email_verify==1?true:false,
                                            'style'   => 'margin:10px',
                                        ];
                                        echo form_checkbox($data); 
                                    ?>
                                    Email Address <i class="fa  fa-info-circle" title="Email Address"></i>
                                </label> &nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                            <div class="col-sm-12">
                                <label class="checkbox-inline">
                                    <?php 
                                        $data = [
                                            'name'    => 'phone_verify',
                                            'id'      => 'phone_verify',
                                            'value'   => 1,
                                            'checked' => $setting->phone_verify==1?true:false ,
                                            'style'   => 'margin:10px',
                                        ];
                                        echo form_checkbox($data); 
                                    ?>
                                    Phone Number <i class="fa  fa-info-circle" title="Phone Number "></i>
                                </label> &nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                            <div class="col-sm-12">
                                <label class="checkbox-inline">
                                        <?php 
                                        $data = [
                                            'name'    => 'kyc_verify',
                                            'id'      => 'kyc_verify',
                                            'value'   => 1,
                                            'checked' => $setting->kyc_verify==1?true:false,
                                            'style'   => 'margin:10px',
                                        ];
                                        echo form_checkbox($data); 
                                    ?>
                                    KYC (Passport/Driving License/ NID) <i class="fa  fa-info-circle" title="KYC (Passport/Driving License/ NID)"></i>
                                </label> 
                            </div>
                            <div class="col-sm-12">
                                 Note: To Verify your customer, you can select any oth the above process or even all based on your requirements.
                            </div>
                        </div>
                        <div class="row" align='center'>
                            <div class="col-sm-8 col-sm-offset-3">
                                <a href="<?php echo base_url('admin'); ?>" class="btn btn-primary  w-md m-b-5"><?php echo display("cancel") ?></a>
                                <button type="submit" class="btn btn-success  w-md m-b-5"><?php echo display("update") ?></button>
                            </div>
                        </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div> 

    </div>
    <div class="col-md-6 col-lg-6">
        
    </div> 
</div> 
<script src="<?php echo base_url("app/Modules/Nfts/Assets/Admin/js/custom.js") ?>"></script> 