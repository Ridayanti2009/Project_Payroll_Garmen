<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Cuti</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Data Cuti</h2>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">ID_Karyawan</th>
                    <th style="text-align: center;">Nama Karyawan</th>
                    <th style="text-align: center;">ID_Cuti</th>
                    <th style="text-align: center;">Jenis Cuti</th>
                    <th style="text-align: center;">Tanggal Mulai</th>
                    <th style="text-align: center;">Tanggal Akhir</th>
                    <th style="text-align: center;">Status</th>
                </tr>
            </thead>
            <tbody>
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

                // Query untuk mengambil data dari tabel
                $sql = "SELECT * FROM cuti";
                $result = $conn->query($sql);

                // Periksa jika ada data
                if ($result->num_rows > 0) {
                    // Menampilkan data setiap baris
                    $no=1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $no++ . "</td>
                                <td>" . $row["id_karyawan"] . "</td>
                                <td>" . $row["nama_karyawan"] . "</td>
                                <td>" . $row["id_cuti"] . "</td>
                                <td>" . $row["jenis_cuti"] . "</td>
                                <td>" . $row["tanggal_mulai"] . "</td>
                                <td>" . $row["tanggal_akhir"] . "</td>
                                <td>" . $row["status"] . "</td>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Tidak ada data</td></tr>";
                }

                // Menutup koneksi
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>