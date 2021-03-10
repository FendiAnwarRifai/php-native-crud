<?php
include '../connection/db.php';
$id= $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$sql = "UPDATE book SET name='$name', price='$price', stock='$stock' WHERE id='$id'";
$query = mysqli_query($link, $sql);
if( $query ) {
  $message = "update successfully";
  echo "<script>
  alert('$message')
  window.location.replace('../index.php');
  </script>";
//   header('Location: ../index.php');
} else {
  $messages = "Gagal menyimpan perubahan";
  echo "<script>
  alert('$messages')
  window.location.replace('../index.php');
  </script>";
    // alert("Gagal menyimpan perubahan...");
} 
?>