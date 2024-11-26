<?php
include 'koneksi.php';

// Mendapatkan id_cuti dari URL
$id_cuti = $_GET['id'];

// Mengambil data cuti berdasarkan id_cuti
$sql = "SELECT * FROM departemen WHERE id_departemen = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_departemen);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    echo "Data departemen tidak ditemukan.";
    exit;
}

// Memproses form update jika data dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari form
    $id_departemen = $_POST['id_departemen'];
    $nama_departemen = $_POST['nama_departemen'];
    $kode_departemen = $_POST['kode_departemen'];
    $anggaran_departemen = $_POST['anggaran_departemen'];
    $jumlah_karyawan = $_POST['jumlah_karyawan'];
    $kepala_departemen = $_POST['kepala_departemen'];

    // Update data cuti
    $update_sql = "UPDATE cuti SET id_departemen = ?, nama_departemen = ?, kode_departemen = ?, anggaran_departemen = ?, jumlah_karyawan = ? kepala_departemen = ?WHERE id_cuti = ?";
    $stmt = $conn->prepare($update_sql);

    // Bind parameter dengan tipe yang sesuai (s untuk string, i untuk integer)
    $stmt->bind_param("sssssi", $id_departemen, $nama_departemen, $kode_departemen, $anggaran_departemen, $jumlah_karyawan, $kepala_departemen, $id_cuti);

    // Eksekusi query
    if ($stmt->execute()) {
        echo '<script>alert("Berhasil Mengubah Data Cuti");</script>';
        echo '<script>location="menu2.php"</script>';
    } else {
        echo '<script>alert("Gagal Mengubah Data Cuti");</script>';
        echo '<script>location="ubahdepartemen.php"</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Departemen</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Ubah Departemen</h2>
    <form method="post" class="shadow p-4 rounded">
        <div class="mb-3">
            <label for="id_departemen" class="form-label">ID Karyawan:</label>
            <input type="text" id="id_departemen" name="id_departemen" class="form-control" value="<?php echo $data['id_departemen']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="nama_departemen" class="form-label">Nama Karyawan:</label>
            <input type="text" id="nama_departemen" name="nama_departemen" class="form-control" value="<?php echo $data['nama_departemen']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="kode_departemen" class="form-label">Kode Departemen:</label>
            <input type="text" id="kode_departemen" name="kode_departemen" class="form-control" value="<?php echo $data['kode_departemen']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="anggaran_departemen" class="form-label">Anggaran Departemen:</label>
            <input type="date" id="anggaran_departemen" name="anggaran_departemen" class="form-control" value="<?php echo $data['anggaran_departemen']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="jumlah_karyawan" class="form-label">Jumlah Karyawan:</label>
            <input type="date" id="jumlah_karyawan" name="jumlah_karyawan" class="form-control" value="<?php echo $data['jumlah_karyawan']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="ke[ala_departemen" class="form-label">Kepala Departemen:</label>
            <input type="text" id="kepala_departemen" name="kepala_departemen" class="form-control" value="<?php echo $data['kepala_departemen']; ?>" required>
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
