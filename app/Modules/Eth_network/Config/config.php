<?php
// module directory name
$HmvcConfig['Eth_network']["_title"] = "Ethereum Network";
$HmvcConfig['Eth_network']["_description"] = "Blockchain network";
// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['Eth_network']['_database'] = true;
$HmvcConfig['Eth_network']["_tables"] = array('dbt_eth_network');
//Table sql Data insert into existing tables to run module
$HmvcConfig['Eth_network']["_extra_query"] = true;