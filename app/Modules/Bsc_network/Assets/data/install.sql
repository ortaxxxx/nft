INSERT INTO `dbt_language` (`id`, `phrase`, `english`, `french`, `korean`) VALUES (NULL, 'bsc_settings', 'BSC Settings', NULL, NULL);
INSERT INTO `dbt_language` (`id`, `phrase`, `english`, `french`, `korean`) VALUES (NULL, 'bsc_network', 'BSC Network', NULL, NULL);
INSERT INTO `dbt_bsc_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES
(1, 'Polygon', 'polygon', NULL, 'https://polygon-rpc.com/', 137, 'MATIC', 'https://polygonscan.com/', 81, 'localhost', '2022-08-03 01:11:28', NULL, 0),
(2, 'Mumbai Testnet(Polygon)', 'polygon-testnet', NULL, 'https://rpc-mumbai.maticvigil.com/', 80001, 'MATIC', 'https://mumbai.polygonscan.com/', 81, 'localhost', '2022-08-03 01:12:27', NULL, 0),
(3, 'Binance Smart Chain', 'bsc', NULL, 'https://bsc-dataseed1.binance.org', 56, 'BNB', 'https://bscscan.com/', 81, 'localhost', '2022-08-24 05:51:26', NULL, 1),
(4, 'Binance Smart Chain Testnet', 'bsc-testnet', NULL, 'https://data-seed-prebsc-1-s2.binance.org:8545', 97, 'BNB', 'https://testnet.bscscan.com/', 81, 'localhost', '2022-08-24 05:51:26', NULL, 1);
