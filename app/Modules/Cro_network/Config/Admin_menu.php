<?php 
 
$ADMINMENU['cro_network'] = array(
    'order'         => 5,
    'parent'        => display('cro_network'),
    'status'        => 1,
    'link'          => 'cro_network',
    'icon'          => '<i class="fas fa-network-wired"></i>',
    'submenu'       => array(
        '0' => array(
            'name'          => display('cro_settings'),
            'icon'          => '<i class="fa fa-arrow-right"></i>',
            'link'          => 'cro_network/cro_settings/',
            'segment'       => 3,
            'segment_text'  => 'cro_settings',
        ),
    ),
    'segment'       => 2,
    'segment_text'  => 'settings'
);