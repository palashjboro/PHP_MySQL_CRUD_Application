<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $status = $_POST['status']; 
  $title = $_POST['title'];
  $description = $_POST['description'];
  $query = "INSERT INTO task(title, description, status) VALUES ('$title', '$description', '$status')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
