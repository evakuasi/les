CREATE TABLE makanan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  kantin VARCHAR(100),
  menu VARCHAR(100),
  harga INT,
  stok INT,
  foto VARCHAR(100)
);

INSERT INTO makanan (kantin, menu, harga, stok, foto) VALUES
('Ibu Rini', 'Nasi Goreng', 10000, 10, 'nasigoreng.jpg'),
('Ibu Rini', 'Es Teh', 3000, 20, 'esteh.jpg'),
('Ibu Eka', 'Bakso', 12000, 8, 'bakso.jpg'),
('Ibu Eka', 'Jus Jeruk', 5000, 15, 'jusjeruk.jpg');

CREATE TABLE pembelian (
  id INT AUTO_INCREMENT PRIMARY KEY,
  makanan_id INT,
  jumlah INT,
  total INT,
  FOREIGN KEY (makanan_id) REFERENCES makanan(id)
);
