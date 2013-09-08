<?php

return array(
	'driver' => 'native',
	'lifetime' => 120,
	'files' => storage_path().'/sessions',
	'connection' => null,
	'table' => 'sessions',
	'lottery' => array(2, 100),
	'cookie' => 'leadhub',
	'path' => '/',
	'domain' => null,
);
