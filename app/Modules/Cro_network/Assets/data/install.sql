INSERT INTO `dbt_language` (`id`, `phrase`, `english`, `french`, `korean`) VALUES (NULL, 'cro_settings', 'Cronos Settings', NULL, NULL);
INSERT INTO `dbt_language` (`id`, `phrase`, `english`, `french`, `korean`) VALUES (NULL, 'cro_network', 'Cronos Network', NULL, NULL);
INSERT INTO `dbt_cro_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES
(1, 'Polygon', 'polygon', NULL, 'https://polygon-rpc.com/', 137, 'MATIC', 'https://polygonscan.com/', 81, 'localhost', '2022-08-03 01:11:28', NULL, 0),
(2, 'Mumbai Testnet(Polygon)', 'polygon-testnet', NULL, 'https://rpc-mumbai.maticvigil.com/', 80001, 'MATIC', 'https://mumbai.polygonscan.com/', 81, 'localhost', '2022-08-03 01:12:27', NULL, 0),
(3, 'Cronos', 'cro', NULL, 'https://evm-cronos.crypto.org', 25, 'CRO', 'https://cronos.crypto.org/explorer/', 81, NULL, '2022-08-24 05:51:26', NULL, 0),
(4, 'Cronos Testnet', 'cro-testnet', NULL, 'https://cronos-testnet-3.crypto.org:8545', 338, 'TCRO', 'https://baobab.scope.klaytn.com', 81, NULL, '2022-08-24 05:51:26', NULL, 0);
