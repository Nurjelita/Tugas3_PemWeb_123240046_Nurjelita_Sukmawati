<?php
include "koneksi.php";
if (isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $telp = $_POST['telp'];
  $jurusan = $_POST['jurusan'];
  $gender = $_POST['gender'];
  $password = $_POST['password'];
  $alasan = $_POST['alasan'];
  $minat = isset($_POST['minat']) ? implode(", ", $_POST['minat']) : "-";

  mysqli_query($koneksi, "INSERT INTO pendaftar VALUES(NULL,'$nama','$email','$telp','$jurusan','$gender','$password','$minat','$alasan')");
  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Formulir Pendaftaran Akun</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <span class="navbar-brand">Kabar Kampus</span>
    <a href="index.php" class="btn btn-danger btn-sm">Kembali</a>
  </div>
</nav>

<div class="container mt-4 col-md-8">
  <h3 class="text-center mb-3">Formulir Pendaftaran Akun</h3>
  <form method="post" class="bg-white p-4 border rounded">
    <div class="row mb-3">
      <div class="col">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="col">
        <label>Alamat Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col">
        <label>Nomor Telepon</label>
        <input type="text" name="telp" class="form-control" required>
      </div>
      <div class="col">
        <label>Password Akun</label>
        <input type="password" name="password" class="form-control" required>
      </div>
    </div>
    <div class="mb-3">
      <label>Jurusan</label>
      <select name="jurusan" class="form-select" required>
        <option value="">Pilih Jurusan...</option>
        <option>Informatika</option>
        <option>Sistem Informasi</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Minat Topik (Bisa pilih lebih dari satu)</label><br>
      <input type="checkbox" name="minat[]" value="Event Kampus"> Event Kampus
      <input type="checkbox" name="minat[]" value="Teknologi"> Teknologi
      <input type="checkbox" name="minat[]" value="Politik"> Politik
      <input type="checkbox" name="minat[]" value="Musik"> Musik
    </div>
    <div class="mb-3">
      <label>Gender</label><br>
      <input type="radio" name="gender" value="Laki-laki" required> Laki-laki
      <input type="radio" name="gender" value="Perempuan" required> Perempuan
    </div>
    <div class="mb-3">
      <label>Alasan Bergabung</label>
      <textarea name="alasan" class="form-control"></textarea>
    </div>
    <button class="btn btn-primary w-100" name="simpan">Daftar Sekarang</button>
  </form>
</div>
</body>
</html>
