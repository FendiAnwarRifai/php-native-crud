<?php
include '../connection/db.php';
$name = $_POST['names'];
$price = $_POST['prices'];
$stock = $_POST['stocks'];

$mt_rand = mt_rand(10000, 99999);
$code_book = "BK_".$mt_rand;
$query = mysqli_query ($link,"INSERT INTO book VALUES('','$name', '$price','$code_book', '$stock')");
if( $query ) {
  $message = "create successfully";
  echo "<script>
  alert('$message')
  window.location.replace('../index.php');
  </script>";
//   header('Location: ../index.php');
} else {
  $messages = "failed to create data";
  echo "<script>
  alert('$messages')
  window.location.replace('../index.php');
  </script>";
    // alert("Gagal menyimpan perubahan...");
} 
?>