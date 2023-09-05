<?php 
 
$ADMINMENU['bsc_network'] = array(
    'order'         => 5,
    'parent'        => display('ftm_network'),
    'status'        => 1,
    'link'          => 'ftm_network',
    'icon'          => '<i class="fas fa-network-wired"></i>',
    'submenu'       => array(
                
                '0' => array(
                    'name'          => display('ftm_settings'),
                    'icon'          => '<i class="fa fa-arrow-right"></i>',
                    'link'          => 'ftm_network/ftm_settings/',
                    'segment'       => 3,
                    'segment_text'  => 'ftm_settings',
                ),
                
    ),
    'segment'       => 2,
    'segment_text'  => 'settings'
);