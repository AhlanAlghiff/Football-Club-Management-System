<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/output.css">
    <title>FC Management System | Schedule</title>
</head>
<body>

<?php 
  include('function.php');

  $query = "SELECT * FROM sesi";

    $result = mysqli_query($conn, $query);

    ?>
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
                    <li class="flex w-full h-10 rounded-[10px] my-2 bg-first text-second duration-300">
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


    <div class="main-content-players p-10 flex-grow overflow-auto ">
      <div class="relative flex flex-col text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
          <div class="relative mx-4 mt-4 text-gray-700 bg-white rounded-none bg-clip-border">
            <div class="flex m-4 items-center justify-between gap-8 mb-8">
              <div>
                <h5
                  class="block text-3xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                  Training & Matches List
                </h5>
                <p class="block mt-1 text-base antialiased font-normal leading-relaxed text-gray-700">
                  See information about all Schedule
                </p>
              </div>
              <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
                <a href="insert_schedule.php">
                  <button
                    class="flex select-none items-center gap-3 rounded-lg bg-first py-2 px-4 text-center align-middle text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:bg-second focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                      stroke-width="2" class="w-4 h-4">
                      <path
                        d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                      </path>
                    </svg>
                    Add Schedule
                  </button>
                </a>
              </div>
            </div>
            <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
              <div class="mb-1 sm:mb-0">
                    <div class="relative">
                        <?php
                            include('function.php');

                            if(isset($_GET['session'])) {
                                $selectedsession = $_GET['session'];
                            } else {

                                $selectedsession = "all";
                            }

                            // Query SQL untuk mengambil data pemain berdasarkan posisi yang dipilih
                            if ($selectedsession == "all") {
                                $query = "SELECT * FROM sesi";
                            } else {
                                $query = "SELECT * FROM sesi WHERE jenis_sesi = '$selectedsession'";
                            }

                            $result = mysqli_query($conn, $query);
                        ?>
                        <select
                            onchange="location = this.value;"
                            class="appearance-none h-full rounded-md border-t border-r border-b border-l block w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-r focus:bg-white focus:border-gray-500 cursor-pointer">
                            <option value="">Session Type</option>
                            <option value="schedules_data.php?session=all">Session Type</option>
                            <option value="schedules_data.php?session=Training">Training</option>
                            <option value="schedules_data.php?session=Match">Match</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
            </div>
              <div class="w-full md:w-72">
                <div class="relative h-10 w-full min-w-[200px]">
                  <div class="absolute grid w-5 h-5 top-2/4 right-3 -translate-y-2/4 place-items-center text-blue-gray-500 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                    </svg>
                  </div>
                  <input id = "searchInput" name = "searchInput"
                  class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 !pr-9 text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                    placeholder=" " />
                  <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                    Search
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="relative flex flex-col ">
            <div class=" mx-4 mt-4  relative">
              <!-- Tabel Anda -->
              <table class="w-full mt-4 text-left table-auto min-w-max ">
              <thead>
                <tr>
                  <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                    <p class="block text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                      Date
                    </p>
                  </th>
                  <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                    <p class="block text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                      Time
                    </p>
                  </th>
                  <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                    <p class="block text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                      Session Type
                    </p>
                  </th>
                  <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                    <p class="block text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                      Match Opponent
                    </p>
                  </th>
                  <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                    <p class="block text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                      Location
                    </p>
                  </th>
                  <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                    <p class="block text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                    Action
                    </p>
                  </th>
                </tr>
              </thead>
              <tbody>
                    <?php 
                    while ($row = mysqli_fetch_assoc($result)){
                  ?>
                <tr>
                  <td class="p-4 border-b border-blue-gray-50">
                    <div class="flex items-center gap-3">
                      <div class="flex flex-row">
                        <div class="flex flex-col justify-center ml-4">
                          <p class="block text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            <?php echo $row['tanggal']; ?>
                          </p>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="p-4 border-b border-blue-gray-50">
                    <div class="flex flex-col">
                      <p class="block text-sm antialiased font-normal leading-normal text-blue-gray-900">
                      <?php echo $row['waktu']; ?>
                      </p>
                    </div>
                  </td>
                  <td class="p-4 border-b border-blue-gray-50">
                    <div class="w-max">
                      <p class="block text-sm antialiased font-normal leading-normal text-blue-gray-900">
                      <?php echo $row['jenis_sesi']; ?>
                      </p>
                    </div>
                  </td>
                  <td class="p-4 border-b border-blue-gray-50">
                    <p class="block text-sm antialiased font-normal leading-normal text-blue-gray-900">
                    <?php echo $row['lawan']; ?>
                    </p>
                  </td>
                  <td class="p-4 border-b border-blue-gray-50">
                    <p class="block text-sm antialiased font-normal leading-normal text-blue-gray-900">
                    <?php echo $row['lokasi']; ?>
                    </p>
                  </td>
                  <td class="p-4 border-b border-blue-gray-50">
                    <div class="flex flex-row">
                      <a href="update_schedule.php?edit=<?php echo $row['id_sesi']; ?>">
                        <button  class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle text-xs font-medium uppercase transition-all text-green-400 hover:text-green-700 hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                          <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-4 h-4">
                              <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"/>
                            </svg>
                          </span>
                        </button>
                      </a>
                      <button onclick="confirmDelete(<?php echo $row['id_sesi']; ?>)"
                        class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle text-xs font-medium uppercase transition-all text-red-400 hover:text-red-700 hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="currentColor" aria-hidden="true" class=" w-4 h-4">
                            <path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2zM18 4h-2.5l-.71-.71c-.18-.18-.44-.29-.7-.29H9.91c-.26 0-.52.11-.7.29L8.5 4H6c-.55 0-1 .45-1 1s.45 1 1 1h12c.55 0 1-.45 1-1s-.45-1-1-1"/>
                          </svg>
                        </span>
                      </button>
                    </div>
                  </td>
                </tr>
                <?php 
                  }
                  mysqli_close($conn);
      
                ?>
                </tbody>
            </table>
          </div>
          <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
            <p class="block text-sm antialiased font-normal leading-normal text-blue-gray-900">
              Page 1 of 1
            </p>
          </div>
          </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d9534f',
        cancelButtonColor: '#6CABDD',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'delete_schedule.php?delete=' + id;
        }
    });
}
</script>

<script>
    function searchSchedule() {
        // Ambil nilai pencarian dari input
        var searchValue = document.getElementById("searchInput").value;

        // Redirect ke halaman schedules_data.php dengan parameter pencarian
        window.location.href = "schedules_data.php?search=" + searchValue;
    }
</script>


</html>