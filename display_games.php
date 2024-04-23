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
                        <a href="">
                            <button class='border-2 px-[2rem] py-[0.5rem] text-transparent rounded-lg bg-gradient-to-br from-pink-400 to-pink-800 bg-clip-text'>Add to Cart</button>
                        </a>
                        <a href="">
                            <button class='shadow-lg px-[2rem] py-[0.5rem] rounded-lg bg-gradient-to-br from-pink-400 to-pink-800 text-white'>Buy Now</button>
                        </a>
                    <?php } else { ?>
                        <a href="login.php">
                            <button class='border-2 px-[2rem] py-[0.5rem] text-transparent rounded-lg bg-gradient-to-br from-pink-400 to-pink-800 bg-clip-text'>Add to Cart</button>
                        </a>
                        <a href="login.php">
                            <button class='shadow-lg px-[2rem] py-[0.5rem] rounded-lg bg-gradient-to-br from-pink-400 to-pink-800 text-white'>Buy Now</button>
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
    
