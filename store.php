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
                
                <a href="cart.php">
                    <div class="">
                        <button class="px-[2rem] bg-gradient-to-br from-pink-400 to-pink-800 text-white rounded-lg shadow-lg">Cart (0)</button>
                    </div>
                </a>
            </div>

            <div class="grid grid-cols-3 gap-[2rem]">
                <?php include "config.php";


                // Check if a genre is selected
                if (isset($_GET['genre'])) {
                    $selectedGenre = $_GET['genre'];

                    $sql = "SELECT g.*, gr.name AS genre_name, p.name AS platform_name
                            FROM games g
                            INNER JOIN genres gr ON g.genre_id = gr.genre_id
                            INNER JOIN platforms p ON g.platform_id = p.platform_id
                            WHERE gr.name = '$selectedGenre'";
                } else {
                    $sql = "SELECT g.*, gr.name AS genre_name, p.name AS platform_name
                            FROM games g
                            INNER JOIN genres gr ON g.genre_id = gr.genre_id
                            INNER JOIN platforms p ON g.platform_id = p.platform_id";
                }

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $game_id = $row["game_id"];
                        $title = $row["title"];
                        $genre_name = $row["genre_name"];
                        $release_year = $row["release_year"];
                        $price = $row["price"];
                        $description = $row["description"];
                        $platform_name = $row["platform_name"];
                        ?>
                        <div class='rounded-lg shadow-xl border-2 max-w-[20rem] justify-between items-start max-h-[40rem] flex flex-col gap-1 py-4 px-6'>
                            <div class='w-[250px] h-[250px] rounded-lg self-center flex items-center justify-center text-[4rem] font-bold shadow-lg'>?</div>
                            <div class='flex flex-col'>
                                <h1 class='text-[2rem]'><?php echo $title; ?></h1>
                                <h1 class='italic'><?php echo $genre_name; ?></h1>
                            </div>
                            <?php if (isset($description) && !empty($description)) { ?>
                                <h1><?php echo $description; ?></h1>
                            <?php } ?>
                            <h1 class='text-green-400 font-bold text-[1.2rem]'>$<?php echo $price; ?></h1>
                            <div class='flex gap-4 justify-around'>
                                <?php if (isset($_SESSION["username"])) { ?>
                                    <a href="store.php?action=add_to_cart&game_id=<?php echo $game_id; ?>">
                                        <button class='border-2 px-[2rem] py-[0.5rem] text-transparent rounded-lg hover:scale-110 transition duration-300 bg-gradient-to-br from-pink-400 to-pink-800 bg-clip-text'>Add to Cart</button>
                                    </a>
                                    <a href="">
                                        <button class='shadow-lg px-[2rem] py-[0.5rem] rounded-lg hover:scale-110 transition duration-300 bg-gradient-to-br from-pink-400 to-pink-800 text-white'>Buy Now</button>
                                    </a>
                                <?php } else { ?>
                                    <a href="login.php">
                                        <button class='border-2 px-[2rem] py-[0.5rem] text-transparent hover:scale-110 transition duration-300 rounded-lg bg-gradient-to-br from-pink-400 to-pink-800 bg-clip-text'>Add to Cart</button>
                                    </a>
                                    <a href="login.php">
                                        <button class='shadow-lg px-[2rem] py-[0.5rem] hover:scale-110 transition duration-300 rounded-lg bg-gradient-to-br from-pink-400 to-pink-800 text-white'>Buy Now</button>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    echo "No games found";
                }

                $conn->close();
                ?>

            </div>

        </div>
    </section>
</body>
</html><?php

if(isset($_POST['btnlogout'])){
    session_unset();
    session_destroy();
    header("Location: index.php");
}

// Check if the "Add to Cart" button is clicked
if(isset($_GET['action']) && $_GET['action'] == 'add_to_cart' && isset($_GET['game_id'])){
    $game_id = $_GET['game_id'];
    
    // Add the game to the cart (replace with your cart implementation)
    // For example, you can store the game ID in the session variable
    $_SESSION['cart'][] = $game_id;
    header("Location: cart.php");
    exit;
}
?>

<!-- Rest of the HTML code -->
