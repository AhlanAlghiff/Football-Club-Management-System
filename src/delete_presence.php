<<<<<<< HEAD
<?php
session_start();

include('function.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$currentPage = 'presence_data';

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM kehadiran WHERE id_kehadiran = $id");
   header('location: presence_data.php');
}
?>
=======
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
>>>>>>> f9e2196b06c059538a56ad3d3d9c86fcc2fbb49f
