<?php
/**
 * Configuration DB and RouterOS
 */
$config = [
	//MySQL Database
    'db' => [
        'host' => 'localhost',
        'dbname' => 'db_mkt',
        'username' => 'root',
        'password' => 'root',
    ],
	//Mikrotik router API
    'router' => [
		//IP Publik Mikrotik atau IP P2P via tunnel jika tidak ada IP Publik
        'ip' => '192.168.80.1',
        'username' => 'admin',
        'password' => '',
        'port' => 8728,
    ]
];

return $config;
