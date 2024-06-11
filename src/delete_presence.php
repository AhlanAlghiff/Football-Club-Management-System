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
