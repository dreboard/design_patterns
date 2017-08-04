<?php

// I a setting file settings.php
$dbDetails = array(
    'db_name' => 'designpatterns',
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_pass' => 'mysqldba'
);

$db = Design_Patterns\Database\PDO_DB::connect($dbDetails);



$mysql_db = Design_Patterns\Database\MySQLI_DB::getInstance();
$mysqli = $mysql_db->getConnection();
$sql_query = "SELECT foo FROM .....";
$result = $mysqli->query($sql_query);