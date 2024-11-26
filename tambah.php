<?php
include 'koneksi.php';

// Proses penyimpanan data baru
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_karyawan = $_POST['id_karyawan'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $posisi = $_POST['posisi'];
    $Password = $_POST['Password'];

    // Query untuk menyimpan data baru
    $sql = "INSERT INTO karyawan (id_karyawan, nama_karyawan, alamat, no_telp, tanggal_masuk, posisi, Password) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $id_karyawan, $nama_karyawan, $alamat, $no_telp, $tanggal_masuk, $posisi, $Password);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href = 'menu.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data'); window.location.href = 'tambah.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Karyawan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Tambah Data Karyawan</h2>
        <form method="post" class="shadow p-4 rounded">
            <div class="mb-3">
                <label for="id_karyawan" class="form-label">id_karyawan:</label>
                <input type="text" id="id_karyawan" name="id_karyawan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="Password" class="form-label">Password:</label>
                <input type="Password" id="Password" name="Password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nama_karyawan" class="form-label">nama_karyawan:</label>
                <input type="text" id="nama_karyawan" name="nama_karyawan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">alamat:</label>
                <input type="alamat" id="alamat" name="alamat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="no_telp" class="form-label">No Telepon:</label>
                <input type="text" id="no_telp" name="no_telp" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk:</label>
                <input type="text" id="tanggal_masuk" name="tanggal_masuk" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="posisi" class="form-label">Posisi:</label>
                <input type="text" id="posisi" name="posisi" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Tambah Data</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>