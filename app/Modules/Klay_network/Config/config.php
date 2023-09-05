<?php
// module directory name
$HmvcConfig['Klay_network']["_title"]       = "Klaytn Network";
$HmvcConfig['Klay_network']["_description"] = "Blockchain network";
// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['Klay_network']['_database'] = true;
$HmvcConfig['Klay_network']["_tables"]   = ['dbt_klay_network'];
//Table sql Data insert into existing tables to run module
$HmvcConfig['Klay_network']["_extra_query"] = true;