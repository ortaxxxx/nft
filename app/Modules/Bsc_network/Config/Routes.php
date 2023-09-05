<?php

if (!isset($routes)) {
    $routes = \Config\Services::routes(true);
}

$routes->group('backend', ['filter' => 'admin_filter', 'namespace' => 'App\Modules\Bsc_network\Controllers\Admin'], function ($subroutes) {
    /*** Route for admin Networks ***/
    $subroutes->add('bsc_network/bsc_settings/', 'Bsc_network::index');  
    $subroutes->add('bsc_network/activate/', 'Bsc_network::activateNetwork');  
});

