<?php
include 'koneksi.php';

// Proses penyimpanan data baru
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_departemen = $_POST['id_departemen'];
    $nama_departemen = $_POST['nama_departemen'];
    $kode_departemen = $_POST['kode_departemen'];
    $anggaran_departemen = $_POST['anggaran_departemen'];
    $jumlah_karyawan = $_POST['jumlah_karyawan'];
    $kepala_departemen = $_POST['kepala_departemen'];


    // Query untuk menyimpan data baru
    $sql = "INSERT INTO departemen (nama_departemen, id_departemen, kode_departemen, anggaran_departemen, jumlah_karyawan, kepala_departemen) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nama_departemen, $id_departemen, $kode_departemen, $anggaran_departemen, $jumlah_karyawan, $kepala_departemen);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href = 'menu2.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data'); window.location.href = 'tambahdepartemen.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departemen Perusahaan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Departemen Perusahaan</h2>
        <form method="post" class="shadow p-4 rounded">
            <div class="mb-3">
                <label for="nama_departemen" class="form-label">Nama Departemen:</label>
                <input type="text" id="nama_departemen" name="nama_departemen" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="id_departemen" class="form-label">ID Departemen:</label>
                <input type="text" id="id_departemen" name="id_departemen" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="kode_departemen" class="form-label">Kode Departemen:</label>
                <input type="text" id="kode_departemen" name="kode_departemen" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="anggaran_departemen" class="form-label">Anggran Departemen:</label>
                <input type="text" id="anggaran_departemen" name="anggaran_departemen" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_karyawan" class="form-label">Jumlah Karyawan:</label>
                <input type="text" id="jumlah_karyawan" name="jumlah_karyawan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="kepala_departemen" class="form-label">Kepala Departemen:</label>
                <input type="text" id="kepala_departemen" name="kepala_departemen" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Tambah Departemen</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>