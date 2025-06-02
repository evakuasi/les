<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pemesanan Makanan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Kantin Online</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#about">About Kantin</a></li>
        <li class="nav-item"><a class="nav-link" href="#cafeteria">Cafeteria List</a></li>
        <li class="nav-item"><a class="nav-link" href="#buy">How to Buy</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">

  <section id="about">
    <h2>About Kantin</h2>
    <p>Kantin ini menyediakan berbagai macam makanan dan minuman untuk siswa dan guru.</p>
    <img src="image/logo.png" class="img-fluid" alt="Kantin">
 
  <iframe 
    width="30%" 
    height="30%" 
    src="https://www.youtube.com/embed/oxW8i9Da0fo" 
    title="PROFILE VIDEO SMK TELKOM JAKARTA" 
    frameborder="0" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
    allowfullscreen
    class="mt-2 w-100"
    style=" height: auto;"
  ></iframe>
    <img src="image/logo.png" alt="Logo Kantin" class="mt-3" style="width:100px;">
  </section>


<section id="cafeteria" class="mt-5">
  <h2>Cafeteria List</h2>
  <?php
  $kantins = $conn->query("SELECT * FROM makanan");
  while ($row = $kantins->fetch_assoc()) {
    echo "
    <div class='card mt-3'>
      <div class='row g-0'>
        <div class='col-md-4'>
          <img src='foto/{$row['foto']}' class='img-fluid rounded-start' alt='gambar'>
        </div>
        <div class='col-md-8'>
          <div class='card-body'>
            <h5 class='card-title'>{$row['kantin']}</h5>
            <p class='card-text'>Menu: {$row['menu']} - Rp{$row['harga']}</p>
            <p class='card-text'>Stok: {$row['stok']}</p>
          </div>
        </div>
      </div>
    </div>";
  }
  ?>
</section>



  <section id="buy" class="mt-5">
    <h2>How to Buy</h2>
    <form action="buy.php" method="post">
      <div class="mb-3">
        <label for="menu">Pilih Menu</label>
        <select name="menu" class="form-select" required>
          <?php
          $items = $conn->query("SELECT * FROM makanan WHERE stok > 0");
          while ($item = $items->fetch_assoc()) {
            echo "<option value='" . $item['id'] . "'>" . $item['menu'] . " - Rp" . $item['harga'] . "</option>";
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" min="1" required>
      </div>
      <button type="submit" class="btn btn-success">Beli</button>
    </form>


    <h3 class="mt-5">Daftar Pembelian</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Menu</th>
          <th>Jumlah</th>
          <th>Total</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $pembelian = $conn->query("SELECT pembelian.id, makanan.menu, pembelian.jumlah, pembelian.total
                                   FROM pembelian JOIN makanan ON pembelian.makanan_id = makanan.id");
        while ($row = $pembelian->fetch_assoc()) {
          echo "<tr>
            <td>{$row['menu']}</td>
            <td>{$row['jumlah']}</td>
            <td>Rp{$row['total']}</td>
            <td>
              <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
              <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin hapus?\")'>Delete</a>
            </td>
          </tr>";
        }
        ?>
      </tbody>
    </table>
  </section>


  <section id="contact" class="mt-5">
    <h2>Contact Us</h2>
    <p>Email: info@kantin.com</p>
    <p>N0. Telp : 009876545432</p>
  </section>


<footer class="bg-dark text-white text-center py-3 mt-5">
  &copy; <?php echo date("Y"); ?> Dibuat oleh Naufal Mifzal. 
</footer>
</div> 
</body>
</html>
</div>
</body>
</html>
