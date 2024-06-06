<?php
include 'function.php';

session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mengamankan input user
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Memeriksa kredensial
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row['password']) {
            // Password benar, buat sesi
            $_SESSION['user_id'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['image'] = $row['image'];
            header("Location: dashboard.php");
            exit();
        } else {
            $message = "Password salah.";
        }
    } else {
        $message = "Username tidak ditemukan.";
    }

    echo "<script type='text/javascript'>alert('$message'); window.location.href = 'index.php';</script>";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/output.css">
    <title>FC Management | Log In</title>
</head>
<body>
    <div class="w-screen h-screen flex justify-center items-center bg-first">
        <div class="w-full md:w-1/2 flex flex-col items-center">
            <div class="w-20 h-20">
                <img src="../asset/image/manchester-city-fc.png" alt="logo">
            </div>

            <h1 class="text-second text-center text-2xl font-bold mb-6 mt-6"> Log In </h1>

            <form action="index.php" method="post" class="w-3/4 mb-6">
                <div class="mb-6">
                    <input type="text" name="username" id="username" class="w-full py-4 px-8 bg-slate-200 placeholder:font-medium rounded hover:ring-1 outline-blue-500" placeholder="Username" required>
                </div>

                <div class="mb-6">
                    <input type="password" name="password" id="password" class="w-full py-4 px-8 bg-slate-200 placeholder:font-medium rounded hover:ring-1 outline-blue-500 " placeholder="Password" required>
                </div>

                <div class="flex flex-row justify-between">
                    <div class=" flex items-center gap-x-1">
                        <input type="checkbox" name="remember" id="remember" class=" w-4 h-4  ">
                        <label for="remember" class="text-sm text-second">Remember me</label>
                    </div>
                    <div>
                        <a href="#" class="text-sm text-second hover:text-blue-900">Forgot?</a>
                    </div>
                </div>
                <!-- button -->
                <div class="mt-4">
                    <button type="submit" class="py-4 bg-second w-full rounded text-blue-50 font-bold hover:bg-blue-900"> Log In</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
