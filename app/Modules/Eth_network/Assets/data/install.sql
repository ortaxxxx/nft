INSERT INTO `dbt_language` (`id`, `phrase`, `english`, `french`, `korean`) VALUES (NULL, 'eth_settings', 'ETH Settings', NULL, NULL);
INSERT INTO `dbt_language` (`id`, `phrase`, `english`, `french`, `korean`) VALUES (NULL, 'eth_network', 'ETH Network', NULL, NULL);
INSERT INTO `dbt_eth_network` (`id`, `network_name`, `network_slug`, `logo`, `rpc_url`, `chain_id`, `currency_symbol`, `explore_url`, `port`, `server_ip`, `created_at`, `created_by`, `status`) VALUES
(1, 'Polygon', 'polygon', NULL, 'https://polygon-rpc.com/', 137, 'MATIC', 'https://polygonscan.com/', 81, 'localhost', '2022-08-03 01:11:28', NULL, 0),
(2, 'Mumbai Testnet(Polygon)', 'polygon-testnet', NULL, 'https://rpc-mumbai.maticvigil.com/', 80001, 'MATIC', 'https://mumbai.polygonscan.com/', 81, 'localhost', '2022-08-03 01:12:27', NULL, 0),
(3, 'ETHEREUM', 'eth', NULL, 'https://mainnet.infura.io/v3/1913a8567db645fdac901f8c7e9c0015', 1, 'ETH', 'https://etherscan.io/', 81, NULL, '2022-08-24 05:51:26', NULL, 0),
(4, 'Ropsten (Ethereum testnet)', 'ropsten', NULL, 'https://ropsten.infura.io/v3/1913a8567db645fdac901f8c7e9c0015', 3, 'ETH', 'https://ropsten.etherscan.io/', 81, NULL, '2022-08-24 05:51:26', NULL, 0);
