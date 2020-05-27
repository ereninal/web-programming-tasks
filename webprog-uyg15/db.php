<?php
	$DBName = "webprog";
	$DBUserName = "root";
	
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=$DBName;charset=utf8",$DBUserName,"",
			[
				PDO::ATTR_EMULATE_PREPARES => false,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			]
		);
	} 
	catch (PDOException $e) {
		print_r($e->getMessage());
	}
?>