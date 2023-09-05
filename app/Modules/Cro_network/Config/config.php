<?php
// module directory name
$HmvcConfig['Cro_network']["_title"]       = "Cronos Network";
$HmvcConfig['Cro_network']["_description"] = "Cronos Blockchain Network";
// register your module tables
// only register tables are imported while installing the module
$HmvcConfig['Cro_network']['_database'] = true;
$HmvcConfig['Cro_network']["_tables"]   = ['dbt_cro_network'];
//Table sql Data insert into existing tables to run module
$HmvcConfig['Cro_network']["_extra_query"] = true;