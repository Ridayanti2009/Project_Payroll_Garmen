<?php
include 'koneksi.php';

// Proses penyimpanan data baru
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_karyawan = $_POST['nama_karyawan'];
    $id_karyawan = $_POST['id_karyawan'];
    $id_cuti = $_POST['id_cuti'];
    $jenis_cuti = $_POST['jenis_cuti'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_akhir = $_POST['tanggal_akhir'];


    // Query untuk menyimpan data baru
    $sql = "INSERT INTO cuti (id_karyawan, nama_karyawan, id_cuti, jenis_cuti, tanggal_mulai, tanggal_akhir) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $id_karyawan, $nama_karyawan, $id_cuti, $jenis_cuti, $tanggal_mulai, $tanggal_akhir);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href = 'pengajuancuti.php';</script>";
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
    <title>Pengajuan Cuti</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Pengajuan Cuti</h2>
        <form method="post" class="shadow p-4 rounded">
            <div class="mb-3">
                <label for="id_karyawan" class="form-label">ID Karyawan:</label>
                <input type="text" id="id_karyawan" name="id_karyawan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nama_karyawan" class="form-label">Nama Karyawan:</label>
                <input type="text" id="nama_karyawan" name="nama_karyawan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="id_cuti" class="form-label">ID Cuti:</label>
                <input type="text" id="id_cuti" name="id_cuti" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jenis_cuti" class="form-label">Jenis Cuti:</label>
                <input type="text" id="jenis_cuti" name="jenis_cuti" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal mulai:</label>
                <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_akhir" class="form-label">Tanggal akhir:</label>
                <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Tambah Data</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>