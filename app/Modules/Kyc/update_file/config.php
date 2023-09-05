<?php 
    /**
     * Update User Profile View
     */
    $update_user_profile    = APPPATH . 'Modules/' . $directory . '/update_file/stub/user_profile_view.stub';
    $current_user_profile   = APPPATH . 'Modules/User/Views/Customer/profile.php';
    if (file_exists($update_user_profile) && file_exists($current_user_profile)) {
        $update_user_profile_content       = file_get_contents($update_user_profile);
        @chmod(APPPATH . 'Modules/User/Views/Customer',0777);
       
        $fileHandle = fopen($current_user_profile, "w+");
        if (is_writable($current_user_profile)) {
            fwrite($fileHandle,$update_user_profile_content);
            fclose($fileHandle);
        }
    }

    /**
     * Update User Profile Controller
     */
    $update_user_profile    = APPPATH . 'Modules/' . $directory . '/update_file/stub/user_profile_controller.stub';
    $current_user_profile   = APPPATH . 'Modules/User/Controllers/Customer/Profile.php';
    if (file_exists($update_user_profile) && file_exists($current_user_profile)) {
        $update_user_profile_content       = file_get_contents($update_user_profile);
        @chmod(APPPATH . 'Modules/User/Controllers/Customer',0777);
       
        $fileHandle = fopen($current_user_profile, "w+");
        if (is_writable($current_user_profile)) {
            fwrite($fileHandle,$update_user_profile_content);
            fclose($fileHandle);
        }
    }

    // /**
    //  * Update Website/Home Controller 
    //  */
    // $update_website_home        = APPPATH . 'Modules/' . $directory . '/update_file/stub/website_home.stub';
    // $current_website_home    = APPPATH . 'Modules/Website/Controllers/Home.php';


    // if (file_exists($update_website_home) && file_exists($current_website_home)) {
    //     $update_website_home_content       = file_get_contents($update_website_home);
    //     @chmod(APPPATH . 'Modules/Website/Controllers',0777);
       
    //     $fileHandle = fopen($current_website_home, "w+");
    //     if (is_writable($current_website_home)) {
    //         fwrite($fileHandle,$update_website_home_content);
    //         fclose($fileHandle);
    //     }
    // }

    /**
     * Update Auth Dashboard View  
     */
    $update_auth_dashboard_view        = APPPATH . 'Modules/' . $directory . '/update_file/stub/auth_dashboard_view.stub';
    $current_auth_dashboard_view    = APPPATH . 'Modules/Auth/Views/Customer/dashboard.php';

 
    if (file_exists($update_auth_dashboard_view) && file_exists($current_auth_dashboard_view)) {
        $update_auth_dashboard_view_content       = file_get_contents($update_auth_dashboard_view);
        @chmod(APPPATH . 'Modules/Auth/Views/Customer',0777);
       
        $fileHandle = fopen($current_auth_dashboard_view, "w+");
        if (is_writable($current_auth_dashboard_view)) {
            fwrite($fileHandle,$update_auth_dashboard_view_content);
            fclose($fileHandle);
        }
    }


    /**
     * Update User Wise NFTS View  
     */
    $update_user_wise_nfts_view        = APPPATH . 'Modules/' . $directory . '/update_file/stub/user_wise_nfts_view.stub';
    $current_user_wise_nfts_view    = APPPATH . 'Views/themes/website_template/user_wise_nfts.php';

 
    if (file_exists($update_user_wise_nfts_view) && file_exists($current_user_wise_nfts_view)) {
        $update_user_wise_nfts_view_content       = file_get_contents($update_user_wise_nfts_view);
        @chmod(APPPATH . 'Views/themes/website_template',0777);
       
        $fileHandle = fopen($current_user_wise_nfts_view, "w+");
        if (is_writable($current_user_wise_nfts_view)) {
            fwrite($fileHandle,$update_user_wise_nfts_view_content);
            fclose($fileHandle);
        }
    }


 
    /**
     * Update Twilio Package In Vendor
     */
    $current_twilio_package_path   =  APPPATH . 'Modules/' . $directory . '/update_file/twilio.zip';
    $update_twilio_package_path    = substr(APPPATH,0, -4).'vendor/twilio.zip';
    @chmod(APPPATH . 'Modules/' . substr(APPPATH,0, -4). '/vendor',0777);

    copy($current_twilio_package_path, $update_twilio_package_path);

    $path = pathinfo( realpath( $update_twilio_package_path), PATHINFO_DIRNAME );

    $zip = new \ZipArchive;
    $res = $zip->open($update_twilio_package_path);
    if ($res === TRUE) {
        $zip->extractTo( $path );
        $zip->close();
    }

    unlink($update_twilio_package_path);

 

?>