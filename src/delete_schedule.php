<?php
session_start();

include('function.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$currentPage = 'schedules_data';

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM sesi WHERE id_sesi = $id");
   header('location: schedules_data.php');
}
?>
