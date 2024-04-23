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
        <div class="bg-white rounded-lg shadow-lg flex flex-col justify-center items-center py-[2rem] px-[2rem]">
            <div>
                <h1 class="text-transparent text-[4rem] bg-gradient-to-br from-pink-400 to-pink-800 bg-clip-text">Logout successful!</h1>
            </div>
            <h1>Please wait a moment. You will be redirected to the home page. If you're still in, click <a href="index.php" class="text-pink-600">here</a> to go back to the home page.</h1>
            <?php
            session_start();
            session_destroy();
            header("refresh:3;url=index.php"); // Redirect to index.php after 5 seconds
            exit;
            ?>
        </div>
    </section>
</body>
</html>

