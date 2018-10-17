<?php
	//config
	$cfg_file = storage_path('app/web.php');
	
	return file_exists($cfg_file) ? 
			require $cfg_file : [];