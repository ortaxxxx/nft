<?php

$ADMINMENU['kyc'] = array(
    'order'         => 3,
    'parent'        => display('KYC'),
    'status'        => 1,
    'link'          => 'kyc',
    'icon'          => '<i class="fa fa-file"></i>',
    'submenu'       => array( 
        '0' => array(
            'name'          => display('Setting '),
            'icon'          => '<i class="fa fa-arrow-right"></i>',
            'link'          => 'kyc/setting',
            'segment'       => 3,
            'segment_text'  => 'setting'
        ),
        '1' => array(
            'name'          => display('user '),
            'icon'          => '<i class="fa fa-arrow-right"></i>',
            'link'          => 'kyc/user',
            'segment'       => 3,
            'segment_text'  => 'user'
        ), 
    ),
    'segment'       => 2,
    'segment_text'  => 'kyc_setup'
);


