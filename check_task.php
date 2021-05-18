<?php 

try {
  $pdo = new PDO('mysql:host=127.0.0.1; dbname=mytodo', 'root', '');
} catch (PDOException $e) {
  die('Could not connect.');
}

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  
  if(empty($id)) {
    echo 'error';
  } else {
    $tasks = $pdo -> prepare("SELECT id, completed FROM todos WHERE id=?");
    $tasks -> execute([$id]);
    $task = $tasks -> fetch();
    $completed = $task['completed'] ? 0 : 1;
    $response = $pdo-> query("UPDATE todos SET completed=$completed WHERE id=$id");
    
    if($response) {
      echo $completed;
    } else {
      echo 'error';
    }
  }
}

?>