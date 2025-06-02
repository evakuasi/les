<?php
include 'config.php';

$id = $_POST['id'];
$kantin = $_POST['kantin'];
$menu = $_POST['menu'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$foto = $_POST['foto'];

$conn->query("UPDATE makanan SET 
  kantin = '$kantin',
  menu = '$menu',
  harga = '$harga',
  stok = '$stok',
  foto = '$foto'
  WHERE id = $id
");

header("Location: index.php");
?>
