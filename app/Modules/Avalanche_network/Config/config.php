<?php
// module directory name
$HmvcConfig['Avalanche_network']["_title"] = "Avalanche Network";
$HmvcConfig['Avalanche_network']["_description"] = "Blockchain network";
// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['Avalanche_network']['_database'] = true;
$HmvcConfig['Avalanche_network']["_tables"] = array('dbt_avalanche_network');
//Table sql Data insert into existing tables to run module
$HmvcConfig['Avalanche_network']["_extra_query"] = true;