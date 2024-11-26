<?php
include 'koneksi.php';

// Mendapatkan id_cuti dari URL
$id_cuti = $_GET['id'];

// Mengambil data cuti berdasarkan id_cuti
$sql = "SELECT * FROM cuti WHERE id_cuti = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_cuti);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    echo "Data cuti tidak ditemukan.";
    exit;
}

// Memproses form update jika data dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari form
    $id_karyawan = $_POST['id_karyawan'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $jenis_cuti = $_POST['jenis_cuti'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_akhir = $_POST['tanggal_akhir'];

    // Update data cuti
    $update_sql = "UPDATE cuti SET id_karyawan = ?, nama_karyawan = ?, jenis_cuti = ?, tanggal_mulai = ?, tanggal_akhir = ? WHERE id_cuti = ?";
    $stmt = $conn->prepare($update_sql);

    // Bind parameter dengan tipe yang sesuai (s untuk string, i untuk integer)
    $stmt->bind_param("sssssi", $id_karyawan, $nama_karyawan, $jenis_cuti, $tanggal_mulai, $tanggal_akhir, $id_cuti);

    // Eksekusi query
    if ($stmt->execute()) {
        echo '<script>alert("Berhasil Mengubah Data Cuti");</script>';
        echo '<script>location="pengajuancuti.php"</script>';
    } else {
        echo '<script>alert("Gagal Mengubah Data Cuti");</script>';
        echo '<script>location="pengajuancuti.php"</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengajuan Cuti</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Ubah Pengajuan Cuti</h2>
    <form method="post" class="shadow p-4 rounded">
        <div class="mb-3">
            <label for="id_karyawan" class="form-label">ID Karyawan:</label>
            <input type="text" id="id_karyawan" name="id_karyawan" class="form-control" value="<?php echo $data['id_karyawan']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="nama_karyawan" class="form-label">Nama Karyawan:</label>
            <input type="text" id="nama_karyawan" name="nama_karyawan" class="form-control" value="<?php echo $data['nama_karyawan']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="id_cuti" class="form-label">ID Cuti:</label>
            <input type="text" id="id_cuti" name="id_cuti" class="form-control" value="<?php echo $data['id_cuti']; ?>" required readonly>
        </div>

        <div class="mb-3">
            <label for="jenis_cuti" class="form-label">Jenis Cuti:</label>
            <input type="text" id="jenis_cuti" name="jenis_cuti" class="form-control" value="<?php echo $data['jenis_cuti']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai:</label>
            <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control" value="<?php echo $data['tanggal_mulai']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_akhir" class="form-label">Tanggal Akhir:</label>
            <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control" value="<?php echo $data['tanggal_akhir']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
    </form>
</div>

<!-- Link ke Bootstrap JS dan dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>
