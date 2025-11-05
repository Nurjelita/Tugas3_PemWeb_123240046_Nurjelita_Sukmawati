<?php
include "koneksi.php";
$id=$_GET['id'];
$data=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM pendaftar WHERE id=$id"));

if(isset($_POST['update'])){
  $nama=$_POST['nama']; $email=$_POST['email']; $telp=$_POST['telp'];
  $jurusan=$_POST['jurusan']; $gender=$_POST['gender'];
  $password=$_POST['password']; $alasan=$_POST['alasan'];
  $minat = isset($_POST['minat']) ? implode(", ", $_POST['minat']) : "-";
  mysqli_query($koneksi,"UPDATE pendaftar SET nama='$nama',email='$email',telp='$telp',
     jurusan='$jurusan',gender='$gender',password='$password',minat='$minat',alasan='$alasan' WHERE id=$id");
  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Data</title>
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
  <h3 class="text-center mb-3">Update Data</h3>
  <form method="post" class="bg-white p-4 border rounded">
    <div class="row mb-3">
      <div class="col"><label>Nama Lengkap</label><input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>"></div>
      <div class="col"><label>Alamat Email</label><input type="email" name="email" class="form-control" value="<?= $data['email'] ?>"></div>
    </div>
    <div class="row mb-3">
      <div class="col"><label>Nomor Telepon</label><input type="text" name="telp" class="form-control" value="<?= $data['telp'] ?>"></div>
      <div class="col"><label>Password Akun</label><input type="text" name="password" class="form-control" value="<?= $data['password'] ?>"></div>
    </div>
    <div class="mb-3">
      <label>Jurusan</label>
      <select name="jurusan" class="form-select">
        <option <?= ($data['jurusan']=="Informatika")?"selected":""; ?>>Informatika</option>
        <option <?= ($data['jurusan']=="Sistem Informasi")?"selected":""; ?>>Sistem Informasi</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Minat Topik</label><br>
      <?php $arr=explode(", ",$data['minat']); ?>
      <input type="checkbox" name="minat[]" value="Event Kampus" <?= in_array("Event Kampus",$arr)?'checked':''; ?>> Event Kampus
      <input type="checkbox" name="minat[]" value="Teknologi" <?= in_array("Teknologi",$arr)?'checked':''; ?>> Teknologi
      <input type="checkbox" name="minat[]" value="Politik" <?= in_array("Politik",$arr)?'checked':''; ?>> Politik
      <input type="checkbox" name="minat[]" value="Musik" <?= in_array("Musik",$arr)?'checked':''; ?>> Musik
    </div>
    <div class="mb-3">
      <label>Gender</label><br>
      <input type="radio" name="gender" value="Laki-laki" <?= ($data['gender']=="Laki-laki")?"checked":""; ?>> Laki-laki
      <input type="radio" name="gender" value="Perempuan" <?= ($data['gender']=="Perempuan")?"checked":""; ?>> Perempuan
    </div>
    <div class="mb-3">
      <label>Alasan Bergabung</label>
      <textarea name="alasan" class="form-control"><?= $data['alasan'] ?></textarea>
    </div>
    <button class="btn btn-primary w-100" name="update">Update Data</button>
  </form>
</div>
</body>
</html>
