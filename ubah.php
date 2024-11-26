<?php
include 'koneksi.php';

// Mendapatkan id_pelanggan dari URL
$id_karyawan = $_GET['id'];

// Mengambil data karyawan berdasarkan id_karyawan
$sql = "SELECT * FROM karyawan WHERE id_karyawan = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_karyawan);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    echo "Data karyawan tidak ditemukan.";
    exit;
}

// Memproses form update jika data dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_karyawan = $_POST['id_karyawan'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $posisi = $_POST['posisi'];
    $password = $_POST['password'];

    // Update data karyawan
    $update_sql = "UPDATE karyawan SET nama_karyawan = ?, alamat = ?, no_telp = ?, tanggal_masuk = ?, posisi = ?,  password = ? WHERE id_karyawan = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssssssi", $nama_karyawan, $alamat, $no_telp, $tanggal_masuk, $posisi, $password, $id_karyawan,);

    if ($stmt->execute()) {
        echo '<script>alert("Berhasil Mengubah Data Karyawan");</script>';
                echo '<script>location="menu.php"</script>';
    } else {
        echo '<script>alert("Gagal Mengubah Data Karyawan");</script>';
                echo '<script>location="menu.php"</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Karyawan</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Ubah Data Karyawan</h2>
    <form method="post" class="shadow p-4 rounded">
        <div class="mb-3">
            <label for="id_karyawan" class="form-label">id_karyawan:</label>
            <input type="text" id="id_karyawan" name="id_karyawan" class="form-control" value="<?php echo $data['id_karyawan']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" class="form-control" value="<?php echo $data['password']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="nama_karyawan" class="form-label">Nama_karyawan:</label>
            <input type="text" id="nama_karyawan" name="nama_karyawan" class="form-control" value="<?php echo $data['nama_karyawan']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">alamat:</label>
            <input type="text" id="alamat" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telepon:</label>
            <input type="text" id="no_telp" name="no_telp" class="form-control" value="<?php echo $data['no_telp']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_masuk" class="form-label">Tanggal Masuk:</label>
            <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="posisi" class="form-label">Posisi:</label>
            <input type="text" id="posisi" name="posisi" class="form-control" required>
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