<?php
session_start();

include('function.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$currentPage = 'players_data';

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM pemain WHERE id_pemain = $id");
   header('location: players_data.php');
}
?>
