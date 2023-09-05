<?php 
 
$ADMINMENU['avalanche_network'] = array(
    'order'         => 5,
    'parent'        => display('avalanche_network'),
    'status'        => 1,
    'link'          => 'avalanche_network',
    'icon'          => '<i class="fas fa-network-wired"></i>',
    'submenu'       => array(
                
                '0' => array(
                    'name'          => display('avalanche_settings'),
                    'icon'          => '<i class="fa fa-arrow-right"></i>',
                    'link'          => 'avalanche_network/avalanche_settings/',
                    'segment'       => 3,
                    'segment_text'  => 'avalanche_settings',
                ),
                
    ),
    'segment'       => 2,
    'segment_text'  => 'settings'
);