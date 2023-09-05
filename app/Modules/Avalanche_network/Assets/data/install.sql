INSERT INTO `dbt_language` (`id`, `phrase`, `english`, `french`, `korean`) VALUES (NULL, 'avalanche_settings', 'Avalanche Settings', NULL, NULL);
INSERT INTO `dbt_language` (`id`, `phrase`, `english`, `french`, `korean`) VALUES (NULL, 'avalanche_network', 'Avalanche Network', NULL, NULL);

INSERT INTO `dbt_avalanche_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES
(1, 'Polygon', 'polygon', NULL, 'https://polygon-rpc.com/', 137, 'MATIC', 'https://polygonscan.com/', 81, 'localhost', '2022-08-02 19:11:28', NULL, 0),
(2, 'Mumbai Testnet(Polygon)', 'polygon-testnet', NULL, 'https://rpc-mumbai.maticvigil.com/', 80001, 'MATIC', 'https://mumbai.polygonscan.com/', 81, 'localhost', NULL, NULL, 0),
(3, 'Avalanche Mainnet C-Chain', 'avalanche', NULL, 'https://api.avax.network/ext/bc/C/rpc', 43114, 'AVAX', 'https://snowtrace.io/', 81, 'localhost', NULL, NULL, 1),
(4, 'Avalanche FUJI C-Chain testnet', 'avalanche-testnet', NULL, 'https://api.avax-test.network/ext/bc/C/rpc', 43113, 'AVAX', 'https://testnet.snowtrace.io/', 81, 'localhost', NULL, NULL, 1);
