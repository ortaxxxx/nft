<?php

if (!isset($routes)) {
    $routes = \Config\Services::routes(true);
}

$routes->group('backend', ['filter' => 'admin_filter', 'namespace' => 'App\Modules\Klay_network\Controllers\Admin'], function ($subroutes) {
    /*** Route for admin Networks ***/
    $subroutes->add('klay_network/klay_settings/', 'Klay_network::index');  
    $subroutes->add('klay_network/activate/', 'Klay_network::activateNetwork');  
});

