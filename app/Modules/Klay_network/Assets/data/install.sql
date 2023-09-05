INSERT INTO `dbt_language` (`id`, `phrase`, `english`, `french`, `korean`) VALUES (NULL, 'klay_settings', 'KLAY Settings', NULL, NULL);
INSERT INTO `dbt_language` (`id`, `phrase`, `english`, `french`, `korean`) VALUES (NULL, 'klay_network', 'KLAY Network', NULL, NULL);
INSERT INTO `dbt_klay_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES
(1, 'Polygon', 'polygon', NULL, 'https://polygon-rpc.com/', 137, 'MATIC', 'https://polygonscan.com/', 81, 'localhost', '2022-08-03 01:11:28', NULL, 0),
(2, 'Mumbai Testnet(Polygon)', 'polygon-testnet', NULL, 'https://rpc-mumbai.maticvigil.com/', 80001, 'MATIC', 'https://mumbai.polygonscan.com/', 81, 'localhost', '2022-08-03 01:12:27', NULL, 0),
(3, 'Klaytn', 'klay', NULL, 'https://public-node-api.klaytnapi.com/v1/cypress', 8217, 'KLAY', 'https://scope.klaytn.com', 81, NULL, '2022-08-24 05:51:26', NULL, 0),
(4, 'Klaytn (Baobab Testnet)', 'klay-testnet', NULL, 'https://api.baobab.klaytn.net:8651', 1001, 'KLAY', 'https://baobab.scope.klaytn.com', 81, NULL, '2022-08-24 05:51:26', NULL, 0);
