<?php

if (!isset($routes)) {
    $routes = \Config\Services::routes(true);
}

$routes->group('backend', ['filter' => 'admin_filter', 'namespace' => 'App\Modules\Kyc\Controllers\Admin'], function ($subroutes) {
    /*** Route for nft setting***/
    $subroutes->add('kyc/setting', 'Kyc_setup::setting'); 
    $subroutes->add('kyc/user', 'Kyc_setup::user'); 
    $subroutes->add('kyc/user_list', 'Kyc_setup::user_list'); 
    $subroutes->add('kyc/user-manual-verify', 'Kyc_setup::user_manual_verify'); 
    $subroutes->add('kyc/kyc-verify/(:num)', 'Kyc_setup::kyc_verify/$1');
    $subroutes->add('kyc/kyc-verify-confirm/(:num)', 'Kyc_setup::kyc_verify_confirm/$1');
}); 



$routes->group('', ['namespace' => 'App\Modules\Kyc\Controllers\Admin'], function ($subroutes) {
    $subroutes->add('profile-verify', 'Kyc_Verification::profile_verify'); 
    $subroutes->add('email-verify', 'Kyc_Verification::email_verify'); 
    $subroutes->add('phone-verify', 'Kyc_Verification::phone_verify'); 
}); 
