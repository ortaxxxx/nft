<?php 
 
$ADMINMENU['klay_network'] = array(
    'order'         => 5,
    'parent'        => display('klay_network'),
    'status'        => 1,
    'link'          => 'klay_network',
    'icon'          => '<i class="fas fa-network-wired"></i>',
    'submenu'       => array(
                
                '0' => array(
                    'name'          => display('klay_settings'),
                    'icon'          => '<i class="fa fa-arrow-right"></i>',
                    'link'          => 'klay_network/klay_settings/',
                    'segment'       => 3,
                    'segment_text'  => 'klay_settings',
                ),
                
    ),
    'segment'       => 2,
    'segment_text'  => 'settings'
);