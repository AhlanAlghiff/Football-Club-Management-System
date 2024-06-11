<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/output.css">
    <style>
        /* CSS tambahan untuk membuat garis batas di sekitar input dan textarea */
        input[type="text"],
        input[type="date"],
        textarea {
            border: 1px solid #D1D5DB; /* Warna garis batas */
            border-radius: 0.375rem; /* Sudut border */
            padding: 0.5rem; /* Ruang di sekitar teks */
            margin-bottom: 1rem; /* Margin bottom untuk elemen form */
        }
    </style>
    <title>FC Management System | Add Injured Player</title>
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
                    </div>xmlns
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
                    <form action="injury_data.php" method="post">
                        <div class="mb-4">
                            <label for="injury_date" class="block text-sm font-medium text-gray-700">Date of Injury</label>
                            <input type="date" id="injury_date" name="injury_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
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
                            <?php
                                $sql = "SELECT id_pemain, nama FROM pemain";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // Output data dari setiap baris
                                    while($row = $result->fetch_assoc()) {
                            ?>
                            <select id="recovery_status" name="recovery_status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            . "'>" . $row["nama"] .
                                <option value=""><?php $row["id_pemain"] ?></option>
                                <option value="Recovered">Recovered</option>
                                <option value="Not Recovering">Not Recovering</option>
                            </select>
                            <?php
                                            }
                                } else {
                                    echo "Tidak ada pemain yang tersedia.";
                                }
                            ?>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="select-none rounded-lg bg-first py-2 px-4 text-center align-middle text-xs font-bold uppercase text-white shadow-md transition-all hover:bg-second focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
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