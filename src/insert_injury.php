<?php
session_start();

include('function.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$currentPage = 'injury_data';

if(isset($_POST['submit'])){

   $presence_name = $_POST['presence_name'];
   $injury_date = $_POST['injury_date'];
   $injury_info = $_POST['injury_info'];
   $medical_treatment = $_POST['medical_treatment'];
   $recovery_status = $_POST['recovery_status'];


   if(empty($presence_name) || empty($medical_treatment) || empty($injury_info) || empty($medical_treatment) || empty($recovery_status)){
      $message = 'please fill out all';
   }else{
      $insert = "INSERT INTO cedera(id_pemain, tanggal_cedera, jenis_cedera, tindakan_medis, status_pemulihan) VALUES('$presence_name', '$injury_date', '$injury_info', '$medical_treatment', '$recovery_status')";
      $upload = mysqli_query($conn, $insert);
      if($upload){
         $message = 'New Injury Player data added successfully!';
      }else{
         $message = 'could not add the Injury data';
      }
   }

   echo "<script type='text/javascript'>alert('$message'); window.location.href = 'injury_data.php';</script>";
   exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/output.css">
    <title>FC Management System | Insert Injured Player</title>
</head>
<body>
    <nav class="sidebar fixed top-0 bottom-0 left-0 p-2 w-[300px] bg-white flex flex-col justify-between font-poppins">
        <div>
            <header class="text-left">
                <a href="">
                    <div class="flex p-4 py-4 gap-4 items-center">
                        <img class="ms-4 w-10" src="../asset/image/manchester-city-fc.png" alt="">
                        <div>
                            <h3 class="text-darken font-bold text-[14px] lg:text-[14px] leading-[12px] text-second">Manchester City Management System</h3>
                        </div>
                    </div>
                </a>
                <!-- <hr> -->
            </header>
            <div class="text-left px-4 mt-10">
                <ul>
                    <li class="flex bg-white text-[#878787] w-full h-10 rounded-[10px] my-2 hover:bg-first hover:text-second duration-300">
                        <a href="dashboard.php" class=" flex items-center w-full ps-6">
                            <span class="mage--dashboard-fill"></span>
                            <span class="ps-4">Dashboard</span>
                        </a>
                    </li>
                    <li class="flex bg-white text-[#878787] w-full h-10 rounded-[10px] my-2 hover:bg-first hover:text-second duration-300">
                        <a href="players_data.php" class=" flex items-center w-full ps-6">
                            <span class="fluent--people-team-16-filled"></span>
                            <span class="ps-4">Players</span>
                        </a>
                    </li>
                    <li class="flex bg-white text-[#878787] w-full h-10 rounded-[10px] my-2 hover:bg-first hover:text-second duration-300">
                        <a href="schedules_data.php" class=" flex items-center w-full ps-6">
                            <span class="ri--football-fill"></span>
                            <span class="ps-4">Training & Matches</span>
                        </a>
                    </li>
                    <li class="flex  w-full h-10 rounded-[10px] my-2  bg-first text-second ">
                        <a href="injury_data.php" class=" flex items-center w-full ps-6 ">
                            <span class="fa6-solid--user-injured"></span>
                            <span class="ps-4">Injured Player</span>
                        </a>
                    </li>
                    <li class="flex bg-white text-[#878787] w-full h-10 rounded-[10px] my-2 hover:bg-first hover:text-second duration-300">
                        <a href="presence_data.php" class=" flex items-center w-full ps-6 ">
                            <span class="material-symbols--note"></span>
                            <span class="ps-4">Player Presence</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <footer class="text-center">
            <a href="index.php">
                <button class="w-full h-10 rounded-[10px] bg-white text-[#878787] hover:bg-red-400 hover:text-second duration-300">
                    <div class="  flex items-center justify-center p-0 m-0 ">
                        <span class="majesticons--logout"></span>
                        <span class="ps-4">Logout</span>
                    </div>
                </button>
            </a>
        </footer>
    </nav>
    <div class="main-content-players p-10 w-full h-full">
        <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white rounded-none bg-clip-border">
                <!-- Konten form untuk menambahkan pemain yang cedera -->
                <div class="p-6">
                    <h2 class="block text-3xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Add Injured Player
                    </h2>
                    <p class="block mt-1 text-base antialiased font-normal leading-relaxed text-gray-700 mb-6">
                        Insert a New Injured Player
                    </p>
                    <form action="insert_injury.php" method="post">
                        <div class="mb-4">
                            <label for="presence_name" class="block text-sm font-medium text-gray-700">Player's Name</label>
                            <select id="presence_name" name="presence_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <?php
                                    include('function.php');

                                    $pemain = mysqli_query($conn, "SELECT * FROM pemain");
                                    while($row = mysqli_fetch_array($pemain)){
                                ?>
                                <option value="<?php echo $row['id_pemain'] ?>"><?php echo $row['nama'] ?></option>

                                <?php }?>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="injury_date" class="block text-sm font-medium text-gray-700">Date of Injury</label>
                            <input type="date" id="injury_date" name="injury_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>
                        <div class="mb-4">
                            <label for="injury_info" class="block text-sm font-medium text-gray-700">Injury Information</label>
                            <textarea id="injury_info" name="injury_info" rows="3" placeholder="Insert Injury Information" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="medical_treatment" class="block text-sm font-medium text-gray-700">Medical Treatment</label>
                            <input type="text" id="medical_treatment" name="medical_treatment" placeholder="Insert Medical Treatment" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>
                        <div class="mb-4">
                            <label for="recovery_status" class="block text-sm font-medium text-gray-700">Recovery Status</label>
                            <select id="recovery_status" name="recovery_status"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="">Status</option>
                                <option value="In-Recovery">In-Recovery</option>
                                <option value="Recovered">Recovered</option>
                                <option value="Not-Recovery">Not-Recovery</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" name="submit" class="select-none rounded-lg bg-first py-2 px-4 text-center align-middle text-xs font-bold uppercase text-white shadow-md transition-all hover:bg-second focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                Add Player
                            </button>
                            <a href="injury_data.php" class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                Cancel
                            </a>
                            <img src="../asset/uploaded_img/" alt="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>