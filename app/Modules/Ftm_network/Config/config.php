<?php
// module directory name
$HmvcConfig['Ftm_network']["_title"] = "Fantom Opera Network";
$HmvcConfig['Ftm_network']["_description"] = "Blockchain network";
// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['Ftm_network']['_database'] = true;
$HmvcConfig['Ftm_network']["_tables"] = array('dbt_ftm_network');
//Table sql Data insert into existing tables to run module
$HmvcConfig['Ftm_network']["_extra_query"] = true;