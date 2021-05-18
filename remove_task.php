<?php 

try {
  $pdo = new PDO('mysql:host=127.0.0.1; dbname=mytodo', 'root', '');
} catch (PDOException $e) {
  die('Could not connect.');
}

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  
  if(empty($id)) {
    echo 0;
  } else {
    $statement = $pdo -> prepare('DELETE FROM todos WHERE id=?');
    $response = $statement-> execute([$id]);
    
    if($response) {
      echo 1;
    } else {
      echo 0;
    }
  }
}

?>