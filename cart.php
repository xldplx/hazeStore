<?php
include "config.php";
session_start();

// Check if the 'buy' button is pressed
if (isset($_POST['buy'])) {
    // Get the selected item from the 'store.php' page
    $selectedItem = $_POST['buy'];

    // Store the selected item in the cart
    $_SESSION['cart'][] = $selectedItem;
}

// Check if the 'game_id' parameter is set in the URL
if (isset($_GET['game_id'])) {
    // Get the game_id from the URL
    $gameId = $_GET['game_id'];

    // Remove the item from the cart based on the game_id
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $index = array_search($gameId, $_SESSION['cart']);
        if ($index !== false) {
            unset($_SESSION['cart'][$index]);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
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

    <section class="h-[100vh] w-[100%]">
        <div class="flex justify-center items-center">
            <div class="bg-white text-black flex flex-col w-[40rem] gap-[2rem] rounded-lg shadow-lg px-[2rem] py-[1rem]">
                <h2 class="self-center text-[3rem]">Cart Items:</h2>
                <div class="flex flex-col gap-[2rem]">
                    <?php
                    // Check if there are items in the cart
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        // Display the items in the cart
                        echo "<table class='text-[1.2rem]'>";
                        echo "<tr>";
                        echo "<th class='border-b-2'>Game ID</th>";
                        echo "<th class='border-b-2'>Game Title</th>";
                        echo "<th class='border-b-2'>Price</th>";
                        echo "<th class='border-b-2'>Actions</th>";
                        echo "</tr>";
                        foreach ($_SESSION['cart'] as $item) {
                            // Retrieve game details from the database based on the game_id
                            $query = "SELECT game_id, title, price FROM games WHERE game_id = $item";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);

                            // Display the game details in a table row
                            echo "<tr class='text-center'>";
                            echo "<td>" . $row['game_id'] . "</td>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td>$" . $row['price'] . "</td>";
                            echo "<td><a href='cart.php?game_id=" . $row['game_id'] . "'>Delete</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>Your cart is empty.</p>";
                    }
                    ?>
                </div>
                <a href="store.php">
                    <button class="self-start bg-gradient-to-br from-pink-400 to-pink-800 text-white px-[2rem] rounded-lg py-1">Go Back</button>
                </a>
            </div>
        </div>
    </section>

</body>
</html>
