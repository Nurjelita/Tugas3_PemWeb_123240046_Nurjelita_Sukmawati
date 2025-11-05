<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id=$id");
$r = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Data Pendaftar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <span class="navbar-brand">Kabar Kampus</span>
    <a href="form.php" class="btn btn-success btn-sm">Form Registrasi</a>
  </div>
</nav>

<div class="container mt-4 col-md-8">
  <h3>Data Pendaftar</h3>
  <div class="bg-white p-4 border rounded">
    <p><b>ID :</b> <?= $r['id'] ?></p>
    <p><b>Nama :</b> <?= $r['nama'] ?></p>
    <p><b>Email :</b> <?= $r['email'] ?></p>
    <p><b>Nomor Telepon :</b> <?= $r['telp'] ?></p>
    <p><b>Jurusan :</b> <?= $r['jurusan'] ?></p>
    <p><b>Password Akun :</b> <?= $r['password'] ?></p>
    <p><b>Minat Topik :</b> <?= ($r['minat']=="-"||$r['minat']=="")?"-":$r['minat']."." ?></p>
    <p><b>Gender :</b> <?= $r['gender'] ?></p>
    <p><b>Alasan Bergabung :</b> <?= $r['alasan'] ?></p>
  </div>
  <a href="index.php" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
</div>
</body>
</html>
