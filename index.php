<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Pendaftaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <span class="navbar-brand">Kabar Kampus</span>
    <a href="form.php" class="btn btn-success btn-sm">Form Registrasi</a>
  </div>
</nav>

<div class="container mt-4">
  <h3 class="mb-3">Dashboard Pendaftaran</h3>
  <table class="table table-bordered text-center align-middle">
    <thead class="table-dark">
      <tr><th>ID</th><th>Nama</th><th>Jurusan</th><th>Gender</th><th>Aksi</th></tr>
    </thead>
    <tbody>
      <?php
      $data = mysqli_query($koneksi, "SELECT * FROM pendaftar");
      if (mysqli_num_rows($data) == 0) {
        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
      } else {
        while ($r = mysqli_fetch_assoc($data)) {
          echo "<tr>
            <td>{$r['id']}</td>
            <td>{$r['nama']}</td>
            <td>{$r['jurusan']}</td>
            <td>{$r['gender']}</td>
            <td>
              <a href='detail.php?id={$r['id']}' class='btn btn-info btn-sm'><i class='bi bi-eye'></i></a>
              <a href='update.php?id={$r['id']}' class='btn btn-warning btn-sm'><i class='bi bi-pencil'></i></a>
              <a href='delete.php?id={$r['id']}' onclick=\"return confirm('Hapus data ini?')\" class='btn btn-danger btn-sm'><i class='bi bi-trash'></i></a>
            </td>
          </tr>";
        }
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
