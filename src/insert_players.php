<?php
session_start();

include('function.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$currentPage = 'players_data';

if (isset($_POST['add_player'])) {
    $playerName = $_POST['playerName'];
    $tanggalLahir = $_POST['tanggalLahir'];
    $negara = $_POST['negara'];
    $tinggiPlayer = $_POST['tinggiPlayer'];
    $noPunggung = $_POST['noPunggung'];
    $position = $_POST['position'];

    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (empty($playerName) || empty($tanggalLahir) || empty($negara) || empty($tinggiPlayer) || empty($noPunggung) || $position == '' || empty($fileName)) {
        $message = 'Please fill out all required fields.';
    } else {
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileDestination = '../asset/uploaded_img/' . $fileName;
                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        $insert = "INSERT INTO pemain(nama, tanggal_lahir, kewarganegaraan, height, posisi, nomor_punggung, image) VALUES(?, ?, ?, ?, ?, ?, ?)";
                        $stmt = mysqli_prepare($conn, $insert);
                        mysqli_stmt_bind_param($stmt, 'sssssss', $playerName, $tanggalLahir, $negara, $tinggiPlayer, $position, $noPunggung, $fileName);

                        if (mysqli_stmt_execute($stmt)) {
                            $message = 'Player added successfully, Welcome to our Team!';
                        } else {
                            $message = 'Could not add the player';
                        }
                        mysqli_stmt_close($stmt);
                    } else {
                        $message = "Error uploading your image!";
                    }
                } else {
                    $message = "The image is too big!";
                }
            } else {
                $message = "Error uploading your image!";
            }
        } else {
            $message = "You cannot upload files of this type!";
        }
    }

    echo "<script type='text/javascript'>alert('$message'); window.location.href = 'players_data.php';</script>";
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <title>FC Management System | Add Players</title>
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
            </header>
            <div class="text-left px-4 mt-10">
                <ul>
                    <li class="flex bg-white text-[#878787] w-full h-10 rounded-[10px] my-2 hover:bg-first hover:text-second duration-300">
                        <a href="dashboard.php" class="flex items-center w-full ps-6">
                            <span class="mage--dashboard-fill"></span>
                            <span class="ps-4">Dashboard</span>
                        </a>
                    </li>
                    <li class="flex w-full h-10 rounded-[10px] my-2 bg-first text-second duration-300">
                        <a href="players_data.php" class="flex items-center w-full ps-6">
                            <span class="fluent--people-team-16-filled"></span>
                            <span class="ps-4">Players</span>
                        </a>
                    </li>
                    <li class="flex bg-white text-[#878787] w-full h-10 rounded-[10px] my-2 hover:bg-first hover:text-second duration-300">
                        <a href="schedules_data.php" class="flex items-center w-full ps-6">
                            <span class="ri--football-fill"></span>
                            <span class="ps-4">Training & Matches</span>
                        </a>
                    </li>
                    <li class="flex bg-white text-[#878787] w-full h-10 rounded-[10px] my-2 hover:bg-first hover:text-second duration-300">
                        <a href="injury_data.html" class="flex items-center w-full ps-6">
                            <span class="fa6-solid--user-injured"></span>
                            <span class="ps-4">Injured Player</span>
                        </a>
                    </li>
                    <li class="flex bg-white text-[#878787] w-full h-10 rounded-[10px] my-2 hover:bg-first hover:text-second duration-300">
                        <a href="presence_data.html" class="flex items-center w-full ps-6">
                            <span class="material-symbols--note"></span>
                            <span class="ps-4">Player Presence</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <footer class="text-center">
            <a href="index.html">
                <button class="w-full h-10 rounded-[10px] bg-white text-[#878787] hover:bg-red-400 hover:text-second duration-300">
                    <div class="flex items-center justify-center p-0 m-0">
                        <span class="majesticons--logout"></span>
                        <span class="ps-4">Logout</span>
                    </div>
                </button>
            </a>
        </footer>
    </nav>

    <div class="main-content-players w-full h-full p-10">
        <div class="relative p-10 flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <div class="relative mx-auto mt-4 overflow-hidden text-gray-700 bg-white rounded-none bg-clip-border w-full max-w-screen-lg">
                <div class="text-center mb-6">
                    <h5 class="block text-3xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Add Players
                    </h5>
                    <p class="block mt-1 text-base antialiased font-normal leading-relaxed text-gray-700">
                        Insert a New Player to the Team
                    </p>
                </div>
                <div class="relative flex flex-col text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border">
                    <form role="form" action="insert_players.php" method="post" enctype = "multipart/form-data" class="max-w-screen-lg mt-8 mb-2 w-full flex flex-col space-y-4 mx-auto">
                        <!-- Row 1 -->
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="relative h-11 w-full min-w-[200px] mb-2">
                                <input  placeholder="Enter Player Fullname"
                                        name="playerName"
                                        class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-gray-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50 placeholder:opacity-0 focus:placeholder:opacity-100" />
                                <label
                                        class="after:content[''] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all after:absolute after:-bottom-1.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-gray-500 after:transition-transform after:duration-300 peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.25] peer-placeholder-shown:text-blue-gray-500 peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:after:scale-x-100 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                    Player Name
                                </label>
                            </div>
                            <div class="relative h-11 w-full min-w-[200px] mb-2">
                                <input
                                  id="date-picker"
                                  name="tanggalLahir"
                                  class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                  placeholder=" "
                                  />
                                <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                  Select a Birth Date
                                </label>
                            </div>
                        </div>
                        <!-- Row 2 -->
                        <div class="relative h-11 w-full min-w-[200px] mb-2">
                            <input name="negara" placeholder="Enter Cityzenship"
                                   
                                    class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-gray-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50 placeholder:opacity-0 focus:placeholder:opacity-100" />
                            <label
                                   class="after:content[''] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all after:absolute after:-bottom-1.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-gray-500 after:transition-transform after:duration-300 peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.25] peer-placeholder-shown:text-blue-gray-500 peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:after:scale-x-100 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                Cityzenship
                            </label>
                        </div>
                        <!-- Row 3 -->
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="relative h-11 w-full min-w-[200px] mb-2">
                                <input  placeholder="Enter Height in Meter"
                                        name="tinggiPlayer"
                                        class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-gray-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50 placeholder:opacity-0 focus:placeholder:opacity-100" />
                                <label
                                       class="after:content[''] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all after:absolute after:-bottom-1.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-gray-500 after:transition-transform after:duration-300 peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.25] peer-placeholder-shown:text-blue-gray-500 peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:after:scale-x-100 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                    Height
                                </label>
                            </div>
                            <div class="relative h-11 w-full min-w-[200px] mb-2">
                                <input  placeholder="Enter Number of Jersey"
                                        name="noPunggung"
                                        class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-gray-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50 placeholder:opacity-0 focus:placeholder:opacity-100" />
                                <label
                                        class="after:content[''] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all after:absolute after:-bottom-1.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-gray-500 after:transition-transform after:duration-300 peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.25] peer-placeholder-shown:text-blue-gray-500 peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:after:scale-x-100 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                    Jersey Number
                                </label>
                            </div>
                            <div class="relative h-11 w-full min-w-[200px] mb-2">   
                                <label class="after:content[''] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all after:absolute after:-bottom-1.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-gray-500 after:transition-transform after:duration-300 peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.25] peer-placeholder-shown:text-blue-gray-500 peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:after:scale-x-100 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                    Position
                                </label>
                                <select name="position" class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-gray-500 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50">
                                    <option value="">--Select position--</option>
                                    <option value="Forward">Forward</option>
                                    <option value="Midfielder">Midfielder</option>
                                    <option value="Defender">Defender</option>
                                    <option value="Goalkeeper">Goalkeeper</option>
                                </select>
                            </div>
                        </div>
                        <div class="relative h-11 w-full min-w-[200px]">
                            <label for="file" class="block text-sm font-medium text-gray-700 mb-2">Player Photo</label>
                            <input type="file" id="file" name="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4  mb-4 rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                        <div class="relative h-11 w-full min-w-[200px]">
                            <button class="flex w-full justify-center items-center select-none gap-3 rounded-lg bg-first py-2 px-4 mt-6 text-center align-middle text-xs font-bold text-white shadow-md shadow-gray-900/10 transition-all hover:bg-second focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" 
                                type="submit" name="add_player">
                                Add Players
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> 

<script>
    const datepicker = flatpickr("#date-picker", {});
    
    // styling the date picker
    const calendarContainer = datepicker.calendarContainer;
    const calendarMonthNav = datepicker.monthNav;
    const calendarNextMonthNav = datepicker.nextMonthNav;
    const calendarPrevMonthNav = datepicker.prevMonthNav;
    const calendarDaysContainer = datepicker.daysContainer;
    
    calendarContainer.className = `${calendarContainer.className} bg-white p-4 border border-blue-gray-50 rounded-lg shadow-lg shadow-blue-gray-500/10 font-sans text-sm font-normal text-blue-gray-500 focus:outline-none break-words whitespace-normal`;
    
    calendarMonthNav.className = `${calendarMonthNav.className} flex items-center justify-between mt-4 [&>div.flatpickr-month]:-translate-y-3`;
    
    calendarNextMonthNav.className = `${calendarNextMonthNav.className} absolute !top-2.5 !right-1.5 h-6 w-6 bg-transparent hover:bg-blue-gray-50 !p-1 rounded-md transition-colors duration-300`;
    
    calendarPrevMonthNav.className = `${calendarPrevMonthNav.className} absolute !top-2.5 !left-1.5 h-6 w-6 bg-transparent hover:bg-blue-gray-50 !p-1 rounded-md transition-colors duration-300`;
    
    calendarDaysContainer.className = `${calendarDaysContainer.className} [&_span.flatpickr-day]:!rounded-md [&_span.flatpickr-day.selected]:!bg-gray-900 [&_span.flatpickr-day.selected]:!border-gray-900`;
</script>

</html>
