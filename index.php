<?php 

require './db_conn.php';

$statement = $pdo -> prepare('SELECT * from todos');
$statement-> execute();
$tasks = $statement -> fetchAll(PDO::FETCH_ASSOC);

require 'index.view.php';

$pdo = null;

?>