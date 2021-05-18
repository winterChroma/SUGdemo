<?php

// $dbhost = $_SERVER['RDS_HOSTNAME'];
// $dbport = $_SERVER['RDS_PORT'];
// $dbname = $_SERVER['RDS_DB_NAME'];
// $charset = 'utf8' ;

// $dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset={$charset}";
// $username = $_SERVER['RDS_USERNAME'];
// $password = $_SERVER['RDS_PASSWORD'];

try {

  $pdo = new PDO($dsn, $username, $password);
  $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  var_dump($e->getMessage());
  die('Could not connect.');
}

?>