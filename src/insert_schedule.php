<!-- insert_session.php -->
<?php
include('function.php'); // Sertakan file function.php untuk koneksi ke database

// Tangkap data dari formulir
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];
$jenis_sesi = $_POST['jenis_sesi'];
$lawan = $_POST['lawan'];
$lokasi = $_POST['lokasi'];

// Buat query untuk menyimpan data ke dalam database
$query = "INSERT INTO sesi (tanggal, waktu, jenis_sesi, lawan, lokasi) VALUES ('$tanggal', '$waktu', '$jenis_sesi', '$lawan', '$lokasi')";

// Jalankan query
if (mysqli_query($conn, $query)){
    header("location:schedules_data.php");
}
else{
    echo "ERROR, tidak berhasil". mysqli_error($conn);
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
