<?php

if (!isset($routes)) {
    $routes = \Config\Services::routes(true);
}

$routes->group('backend', ['filter' => 'admin_filter', 'namespace' => 'App\Modules\Ftm_network\Controllers\Admin'], function ($subroutes) {
    /*** Route for admin Networks ***/
    $subroutes->add('ftm_network/ftm_settings/', 'Ftm_network::index');  
    $subroutes->add('ftm_network/activate/', 'Ftm_network::activateNetwork');  
});

