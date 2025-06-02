<?php
include 'config.php';
$id = $_GET['id'];

// Ambil data pembelian
$data = $conn->query("SELECT * FROM pembelian WHERE id=$id")->fetch_assoc();
$makanan = $conn->query("SELECT * FROM makanan WHERE id={$data['makanan_id']}")->fetch_assoc();

// Kembalikan stok
$stokBaru = $makanan['stok'] + $data['jumlah'];
$conn->query("UPDATE makanan SET stok=$stokBaru WHERE id={$makanan['id']}");

// Hapus pembelian
$conn->query("DELETE FROM pembelian WHERE id=$id");

header("Location: index.php#buy");
?>
