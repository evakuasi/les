<?php
include 'config.php';

$id = $_POST['menu'];
$jumlah = $_POST['jumlah'];

// Hindari SQL Injection
$id = (int)$id;
$jumlah = (int)$jumlah;

$data = $conn->query("SELECT * FROM makanan WHERE id=$id")->fetch_assoc();
$total = $jumlah * $data['harga'];
$newStok = $data['stok'] - $jumlah;

if ($newStok >= 0) {
  $conn->query("UPDATE makanan SET stok=$newStok WHERE id=$id");
  $conn->query("INSERT INTO pembelian (makanan_id, jumlah, total) VALUES ($id, $jumlah, $total)");

  echo "<h2>Terima kasih telah membeli!</h2>";
  echo "<p>Total harga: Rp$total</p>";
  echo "<img src='image/qrcode.png' alt='QR Code'>";
} else {
  echo "<p>Stok tidak mencukupi.</p>";
}

// Tambahkan tombol kembali ke index.php
echo "<br><br><a href='index.php' style='display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;'>Kembali ke Home</a>";
?>
