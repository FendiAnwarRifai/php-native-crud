<?php
include '../connection/db.php';
$id= $_POST['ids'];
$sql="DELETE FROM book WHERE id=$id";
$query = mysqli_query($link, $sql);
if( $query ) {
  $message = "delete successfully";
  echo "<script>
  alert('$message')
  window.location.replace('../index.php');
  </script>";
//   header('Location: ../index.php');
} else {
  $messages = "failed to delete";
  echo "<script>
  alert('$messages')
  window.location.replace('../index.php');
  </script>";
    // alert("failed to delete...");
} 

?>