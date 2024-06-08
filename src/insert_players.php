<?php

include('function.php');

$nama = $_POST['playerName'];
$tanggal = $_POST['tanggalLahir'];
$negara = $_POST['negara'];
$tinggi = $_POST['tinggiPlayer'];
$noPunggung = $_POST['noPunggung'];
$posisi = $_POST['position'];

$query = "INSERT INTO pemain(nama, tanggal_lahir, kewarganegaraan, height, posisi, nomor_punggung) VALUES('$nama','$tanggal', '$negara', '$tinggi', '$posisi', '$noPunggung')";

if (mysqli_query($conn, $query)){
    header("location:players_data.php");
}
else{
    echo "ERROR, tidak berhasil". mysqli_error($conn);
}

mysqli_close($conn);
?>