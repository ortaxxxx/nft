INSERT INTO `dbt_language` (`id`, `phrase`, `english`, `french`, `korean`) VALUES (NULL, 'ftm_settings', 'FTM Settings', NULL, NULL);
INSERT INTO `dbt_language` (`id`, `phrase`, `english`, `french`, `korean`) VALUES (NULL, 'ftm_network', 'FTM Network', NULL, NULL);

INSERT INTO `dbt_ftm_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES
(1, 'Polygon', 'polygon', NULL, 'https://polygon-rpc.com/', 137, 'MATIC', 'https://polygonscan.com/', 81, 'localhost', '2022-08-03 01:11:28', NULL, 0),
(2, 'Mumbai Testnet(Polygon)', 'polygon-testnet', NULL, 'https://rpc-mumbai.maticvigil.com/', 80001, 'MATIC', 'https://mumbai.polygonscan.com/', 81, 'localhost', '2022-08-03 01:12:27', NULL, 0),
(3, 'Fantom Opera', 'ftm', NULL, 'https://rpc.ankr.com/fantom/', 250, 'FTM', 'https://ftmscan.com/', 81, 'localhost', date('Y-m-d H:i:s'), NULL, 1),
(4, 'Fantom Testnet', 'ftm-testnet', NULL, 'https://rpc.testnet.fantom.network/', 4002, 'FTM', 'https://testnet.ftmscan.com/', 81, 'localhost', date('Y-m-d H:i:s'), NULL, 1);
