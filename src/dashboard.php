<?php
include('function.php');

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/output.css">
    <title>FC Management System | Dashboard</title>
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
                    <li class="flex w-full h-10 rounded-[10px] my-2 bg-first text-second ">
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
                    <li class="flex bg-white text-[#878787] w-full h-10 rounded-[10px] my-2 hover:bg-first hover:text-second duration-300">
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

    <header class="header flex justify-between h-20 bg-white p-4 items-center">
        <div>
            <h3 class="leading-5">
                Hi <span class="text-second font-semibold"><?php echo $_SESSION['name'] ?></span>!<br>
                <span class="text-first font-semibold"><?php echo $_SESSION['role'] ?></span>
            </h3>
        </div>
        <div class="flex items-center">
            <div class="w-full md:w-72">
                <div class="relative h-10 w-full min-w-[200px]">
                  <div class="absolute grid w-5 h-5 top-2/4 right-3 -translate-y-2/4 place-items-center text-blue-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                    </svg>
                  </div>
                  <input
                    class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 !pr-9 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                    placeholder=" " />
                  <label
                    class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                    Search
                  </label>
                </div>
              </div>
            <span class="mdi--settings ml-4"></span>
            <img src="../asset/image/<?php echo $_SESSION['image']?>" alt="" class="rounded-full h-10 w-10 ml-2">
        </div>  
    </header>

    <main class="main-content p-10">

        <div>
            <h1 class="text-4xl font-semibold text-first">Welcome to Manchester City FC!</h1>
            <h3 class="text-gray-600 text-xl font-light">Monitor, analyze, and take action with our dashboard.</h3>
            <hr class="my-4 border-2">
        </div>

        <div class="flex w-full">
            <div class="flex justify-between items-center content-center px-4 py-2 m-4  w-1/3 h-28 bg-fourth text-white rounded-md drop-shadow-lg shadow-transparent cursor-pointer duration-300 hover:bg-yellow-600">
                <div class="ps-4">
                <?php
                    // Query untuk mengambil jumlah pemain dari tabel pemain
                    $query = "SELECT COUNT(*) AS total_players FROM pemain";
                    // Eksekusi query
                    $result = mysqli_query($conn, $query);
                    // Ambil hasil query
                    $row = mysqli_fetch_assoc($result);
                    $totalPlayers = $row['total_players'];
                    // Tampilkan hasilnya
                    echo "<h1 class='flex text-3xl font-bold justify-center'>$totalPlayers</h1>";
                    // Tutup koneksi
                    mysqli_close($conn);
                    ?>
                    <h1 class="text-lg">All Players</h1>
                </div>
                <div class="pr-4 ">
                    <span class="ri--team-line"></span>
                </div>
            </div>
            <div class="flex justify-between items-center content-center px-4 py-2 m-4  w-1/3 h-28 bg-green-400 text-white rounded-md drop-shadow-lg shadow-transparent cursor-pointer duration-300 hover:bg-green-600">
                <div class="ps-4">
                    <h1 class="flex text-3xl font-bold justify-center">12</h1>
                    <h1 class="text-lg">Field Schedules</h1>
                </div>
                <div class="pr-4">
                    <span class="mdi--soccer-field"></span>
                </div>
            </div>
            <div class="flex justify-between items-center content-center px-4 py-2 m-4  w-1/3 h-28 bg-red-400 text-white rounded-md drop-shadow-lg shadow-transparent cursor-pointer duration-300 hover:bg-red-600">
                <div class="ps-4">
                    <h1 class="flex text-3xl font-bold justify-center">3</h1>
                    <h1 class="text-lg">Injured Players</h1>
                </div>
                <div class="pr-4 ">
                    <span class="mdi--account-injury-outline"></span>
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center mt-4 px-4">
            <h1 class="text-2xl font-semibold text-first">
                Latest Schedules
            </h1>
            <button class="flex items-center hover:text-second">
                <a href="">View All</a>
                <span class="ic--baseline-arrow-right"></span>
            </button>
        </div>
        <div class="flex h-[248px] mt-2 justify-start">
            <div class="m-4 p-4 w-full bg-white rounded-md drop-shadow-lg shadow-transparent">
                <h1>Kotak Skedul</h1>
            </div>
        </div>

    </main>
</body>
</html>

