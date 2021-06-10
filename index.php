<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './db_conn.php';

$statement = $pdo -> prepare('SELECT * from todos');
$statement-> execute();
$tasks = $statement -> fetchAll(PDO::FETCH_ASSOC);

require 'index.view.php';

$pdo = null;

?>