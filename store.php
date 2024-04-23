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
            <div class="flex gap-[1rem]">
                <button class="border px-[2rem] py-1 rounded-lg hover:scale-110 transition duration-300">Login</button>
                <div class="bg-white rounded-lg hover:scale-110 transition duration-300">
                    <button class="border px-[2rem] py-1 bg-gradient-to-br from-pink-400 text-transparent to-pink-800 bg-clip-text rounded-lg">
                        <h1>Sign up</h1>
                    </button>
                </div>

            </div>
        </nav>
    </header>

    <section class="bg-white flex flex-col justify-center items-center">
        <div class="flex flex-col gap-[2rem] py-[2rem]">
            <form action="" method="get" class="text-[1.2rem]">
                <label for="genres">Genres</label>
                <select name="genres" id="genres">
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
                <button type="submit">Filter Games</button>
            </form>

            <div class="grid grid-cols-3 gap-[2rem]">
                <?php include 'display_games.php'; ?>
            </div>

        </div>
    </section>
</body>
</html>