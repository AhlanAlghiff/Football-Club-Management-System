<?php 

$id = $_GET['id_kehadiran'];

//include(dbconnect.php);
include('function.php');

//query hapus
$query = "DELETE FROM kehadiran WHERE id_kehadiran = '$id' ";

if (mysqli_query($conn , $query)) {
	# redirect ke index.php
	header("location:presence_data.php");
}
else{
	echo "ERROR, data gagal dihapus". mysqli_error($conn);
}

mysqli_close($conn);
?>