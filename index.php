<?php 

try {
  $pdo = new PDO('mysql:host=127.0.0.1; dbname=mytodo', 'root', '');
} catch (PDOException $e) {
  die('Could not connect.');
}

$statement = $pdo -> prepare('SELECT * from todos');
$statement-> execute();
$tasks = $statement -> fetchAll(PDO::FETCH_ASSOC);

require 'index.view.php'

?>