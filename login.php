
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAZE; Log in</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
</head>
<body class="font-['VT323'] bg-gradient-to-br from-pink-400 to-pink-800">
    <section class="h-[100vh] w-[100%] flex flex-col gap-[2rem] justify-center items-center">
        <?php include "config.php"; 

        if(isset($_POST["btnlogin"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $sql = "SELECT username, password from users WHERE username = '$username' AND password = '$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                session_start();
                $_SESSION["username"] = $username;
                header('Location: index.php');
            } else {
                echo "<h1 class='text-white drop-shadow-lg text-[2rem]'>Invalid username or password. Please try again.</h1>";
            }
        }
        ?>

        <div class="bg-white rounded-lg shadow-lg flex flex-col justify-center items-center py-[2rem] px-[1rem] space-y-4">
            <div class="underline text-pink-600">
                <h1 class="text-[4rem] bg-gradient-to-br from-pink-400 to-pink-800 bg-clip-text text-transparent">Login</h1>
            </div>
            <form action="login.php" method="post" class="flex flex-col">
                <label for="username">Username</label>
                <input type="text" name="username" id="" class="border p-2 w-[20rem]"><br>

                <label for="password">Password</label>
                <input type="password" name="password" id="" class="border p-2 w-[20rem]"><br>
                
                <div class="self-center hover:scale-110 transition duration-300">
                    <button type="submit" name="btnlogin" class="bg-gradient-to-br from-pink-400 to-pink-800 px-[4rem] py-2 rounded-lg shadow-lg text-white">Login</button>
                </div>
            </form>
            <h1>Don't have an account? Register <a class="text-pink-700" href="register.php">here</a>.</h1>
        </div>
    </section>
</body>
</html>