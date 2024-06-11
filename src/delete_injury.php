<?php
session_start();

include('function.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$currentPage = 'injury_data';

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM cedera WHERE id_cedera = $id");
   header('location: injury_data.php');
}
?>
