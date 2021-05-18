<?php 

require "./db_conn.php";

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

    $pdo = null;
  }
}

?>