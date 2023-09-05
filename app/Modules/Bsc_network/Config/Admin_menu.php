<?php 
 
$ADMINMENU['bsc_network'] = array(
    'order'         => 8,
    'parent'        => display('bsc_network'),
    'status'        => 1,
    'link'          => 'bsc_network',
    'icon'          => '<i class="fas fa-network-wired"></i>',
    'submenu'       => array(
                
                '0' => array(
                    'name'          => display('bsc_settings'),
                    'icon'          => '<i class="fa fa-arrow-right"></i>',
                    'link'          => 'bsc_network/bsc_settings/',
                    'segment'       => 3,
                    'segment_text'  => 'bsc_settings',
                ),
                
    ),
    'segment'       => 2,
    'segment_text'  => 'settings'
);