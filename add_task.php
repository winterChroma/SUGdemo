<?php 

try {
  $pdo = new PDO('mysql:host=127.0.0.1; dbname=mytodo', 'root', '');
} catch (PDOException $e) {
  die('Could not connect.');
}

if(isset($_POST['description'])) {
  $description = $_POST['description'];
  
  if(empty($description)) {
    header("Location: .?mess=error");
  } else {
    $statement = $pdo -> prepare('INSERT INTO todos(description) VALUE(?)');
    $response = $statement-> execute([$description]);
    
    if($response) {
      header("Location: .");
    } else {
      header("Location: .?mess=error");
    }
  }
}

?>