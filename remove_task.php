<?php 

require "./db_conn.php";

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

    $pdo = null;
  }
}

?>