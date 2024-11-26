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

// Mendapatkan id_karyawan dari URL
$id_karyawan = $_GET['id'];

// Query untuk menghapus data
$sql = "DELETE FROM karyawan WHERE id_karyawan = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_karyawan);

if ($stmt->execute()) {
    echo "<script>alert('Data berhasil dihapus'); window.location.href = 'menu.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data'); window.location.href = 'menu.php';</script>";
}

// Menutup koneksi
$conn->close();
?>