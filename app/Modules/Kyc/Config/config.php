<?php
// module directory name
$HmvcConfig['Kyc']["_title"] = "KYC Verification";
$HmvcConfig['Kyc']["_description"] = "KYC Verification";
// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['Kyc']['_database'] = false;
$HmvcConfig['Kyc']["_tables"] = array();
//Table sql Data insert into existing tables to run module
$HmvcConfig['Kyc']["_extra_query"] = true;



if($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REDIRECT_QUERY_STRING'] == '/backend/module/install'){
    $update_config_file  = APPPATH . 'Modules/' . $directory . '/update_file/config.php';
    if (file_exists($update_config_file)){
        @include($update_config_file);
    }
}
 