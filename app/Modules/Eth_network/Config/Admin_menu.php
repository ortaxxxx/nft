<?php 
 
$ADMINMENU['eth_network'] = array(
    'order'         => 5,
    'parent'        => display('eth_network'),
    'status'        => 1,
    'link'          => 'eth_network',
    'icon'          => '<i class="fas fa-network-wired"></i>',
    'submenu'       => array(
                
                '0' => array(
                    'name'          => display('eth_settings'),
                    'icon'          => '<i class="fa fa-arrow-right"></i>',
                    'link'          => 'eth_network/eth_settings/',
                    'segment'       => 3,
                    'segment_text'  => 'eth_settings',
                ),
                
    ),
    'segment'       => 2,
    'segment_text'  => 'settings'
);