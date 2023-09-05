<?php

if (!isset($routes)) {
    $routes = \Config\Services::routes(true);
}

$routes->group('backend', ['filter' => 'admin_filter', 'namespace' => 'App\Modules\Eth_network\Controllers\Admin'], function ($subroutes) {
    /*** Route for admin Networks ***/
    $subroutes->add('eth_network/eth_settings/', 'Eth_network::index');  
    $subroutes->add('eth_network/activate/', 'Eth_network::activateNetwork');  
});

