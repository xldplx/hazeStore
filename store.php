<?php
session_start();

if(isset($_POST['btnlogout'])){
    session_unset();
    session_destroy();
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAZE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="font-['VT323'] bg-gradient-to-br from-pink-400 to-pink-800 select-none">
    <header class="flex justify-between text-white px-[2rem] py-[1rem]">
        <div class="text-[2rem] italic">
            <h1>HAZE.</h1>
        </div>

        <nav class="flex gap-[2rem] items-center text-[1.2rem]">
            <a href="index.php">Home</a>
            <a href="store.php">Store</a>
            <a href="">Our Team</a>
            <?php if (!isset($_SESSION['username'])) { ?>
                <div class="flex gap-[1rem]">
                    <a href="login.php">
                        <button name="btnlogin" class="border px-[2rem] py-1 rounded-lg hover:scale-110 transition duration-300">Login</button>
                    </a>
                    <div class="bg-white rounded-lg hover:scale-110 transition duration-300">
                        <a href="register.php">
                            <button name="btnsignup" class="border px-[2rem] py-1 bg-gradient-to-br from-pink-400 text-transparent to-pink-800 bg-clip-text rounded-lg">
                                <h1>Sign up</h1>
                            </button>
                        </a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="bg-white rounded-lg hover:scale-110 transition duration-300">
                    <a href="logout.php">
                        <button name="btnlogout" class="border px-[2rem] py-1 bg-gradient-to-br from-pink-400 text-transparent to-pink-800 bg-clip-text rounded-lg">
                            <h1>Log out</h1>
                        </button>
                    </a>
                </div>
            <?php } ?>
        </nav>
    </header>

    <section class="bg-white flex flex-col justify-center items-center">
        <div class="flex flex-col gap-[2rem] py-[2rem]">
            <div class="flex justify-between text-[1.5rem]">
                <form action="" method="get" class=" flex gap-[1rem]">
                    <div class="flex border-2 gap-[1rem] rounded-lg justify-between">
                        <label for="genres" class="px-[1rem] border-r-2">Genres</label>
                        <select name="genres" id="genres" class="">
                            <?php
                            // Include database connection (replace with your details)
                            include 'config.php';
    
                            // Fetch genres from database (replace with your query)
                            $sql_genres = "SELECT * FROM genres";
                            $result_genres = $conn->query($sql_genres);
    
                            if ($result_genres->num_rows > 0) {
                                while ($row_genre = $result_genres->fetch_assoc()) {
                                $genre_id = $row_genre["genre_id"];
                                $genre_name = $row_genre["name"];
    
                                // Option element for each genre
                                echo "<option value='$genre_id'>$genre_name</option>";
                                }
                            }
                            $conn->close();
                            ?>
                        </select>                
                    </div>
    
                    <button type="submit" class="px-[2rem] bg-gradient-to-br from-pink-400 to-pink-800 text-white rounded-lg shadow-lg">Filter Games</button>
                </form>

                <div>
                    <button class="px-[2rem] bg-gradient-to-br from-pink-400 to-pink-800 text-white rounded-lg shadow-lg">Cart</button>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-[2rem]">
                <?php include 'display_games.php'; ?>
            </div>

        </div>
    </section>
</body>
</html>