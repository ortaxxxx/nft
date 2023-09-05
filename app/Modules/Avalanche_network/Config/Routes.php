<?php

if (!isset($routes)) {
    $routes = \Config\Services::routes(true);
}

$routes->group('backend', ['filter' => 'admin_filter', 'namespace' => 'App\Modules\Avalanche_network\Controllers\Admin'], function ($subroutes) {
    /*** Route for admin Networks ***/
    $subroutes->add('avalanche_network/avalanche_settings/', 'Avalanche_network::index');  
    $subroutes->add('avalanche_network/activate/', 'Avalanche_network::activateNetwork');  
});

