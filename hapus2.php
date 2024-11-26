<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll garmen"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan id_cuti dari URL
$id_cuti = $_GET['id'];  // Menggunakan id_cuti, pastikan parameter yang dikirim benar

// Query untuk menghapus data
$sql = "DELETE FROM cuti WHERE id_cuti = ?";
$stmt = $conn->prepare($sql);

// Binding parameter
$stmt->bind_param("i", $id_cuti);

// Eksekusi query
if ($stmt->execute()) {
    echo "<script>alert('Data berhasil dihapus'); window.location.href = 'pengajuancuti.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data'); window.location.href = 'pengajuancuti.php';</script>";
}

// Menutup koneksi
$conn->close();
?>
