<?php
	$server = "";# MySQL/MariaDB 伺服器
	$dbuser = "";       # 使用者帳號
	$dbpassword = "#"; # 使用者密碼
	$dbname = "";    # 資料庫名稱
	$connection = new mysqli($server, $dbuser, $dbpassword, $dbname);
	$connection->query("SET NAMES UTF8");
	if ($connection->connect_error) {
		die("連線失敗: " . $connection->connect_error);
	}
	date_default_timezone_set('Asia/Taipei');
?>