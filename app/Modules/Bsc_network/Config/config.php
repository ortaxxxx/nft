<?php
// module directory name
$HmvcConfig['Bsc_network']["_title"] = "Binance Smart Chain Network";
$HmvcConfig['Bsc_network']["_description"] = "Blockchain network";
// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['Bsc_network']['_database'] = true;
$HmvcConfig['Bsc_network']["_tables"] = array('dbt_bsc_network');
//Table sql Data insert into existing tables to run module
$HmvcConfig['Bsc_network']["_extra_query"] = true;