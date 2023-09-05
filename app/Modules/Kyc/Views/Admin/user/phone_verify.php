<div class="profile-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6"> 
                <div class="border rounded-5 p-3 p-sm-5">

                <?php if(isset($message)){ ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong><?php echo display('Success'); ?>!</strong> <?php echo $message; ?>
                </div>
                <?php } ?>

                <?php if(isset($exception)){ ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong><?php echo display('Exception'); ?>!</strong> <?php echo $exception; ?>
                </div>
                <?php } ?>

                <div class="tab-content" id="myTabContent">
                    <div class="cryp_wrapper">
                        <div class="profile-verify mt-4 mb-4">
                            <div class="user-login form-design">
                                <h3 class="user-login-title mb-4"><?php echo display('verify_phone');?></h3>
                                <p class=""> <?php echo display('verify_text_phone');?></p>
                                <?php echo form_open_multipart("phone-verify") ?>
                                                
                                    <div class="form-group row">
                                        <label for="verify_code" class="col-md-4 col-form-label"><?php echo display('verify_code') ?> <i class="text-danger">*</i></label>
                                        <div class="col-md-8">
                                            <input name="verify_code" type="text" class="form-control" id="verify_code" placeholder="" value="" required="">
                                        </div>
                                    </div>                       
                                    
                                
                                    <span id="verify_field"></span>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-success"><?php echo display('verify_email') ?></button>
                                        </div>
                                    </div>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 