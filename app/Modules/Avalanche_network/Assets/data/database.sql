CREATE TABLE IF NOT EXISTS `dbt_avalanche_network` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `network_name` varchar(100) DEFAULT NULL,
  `network_slug` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `rpc_url` varchar(255) DEFAULT NULL,
  `chain_id` int(11) DEFAULT NULL,
  `currency_symbol` varchar(20) DEFAULT NULL,
  `explore_url` varchar(255) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `server_ip` varchar(22) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;