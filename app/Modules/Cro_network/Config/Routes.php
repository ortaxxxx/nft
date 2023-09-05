<?php

if (!isset($routes)) {
    $routes = \Config\Services::routes(true);
}

$routes->group('backend', ['filter' => 'admin_filter', 'namespace' => 'App\Modules\Cro_network\Controllers\Admin'], function ($subroutes) {
    /*** Route for admin Networks ***/
    $subroutes->add('cro_network/cro_settings/', 'Cro_network::index');  
    $subroutes->add('cro_network/activate/', 'Cro_network::activateNetwork');  
});

