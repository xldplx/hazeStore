<?php

include "config.php";

if(isset($_POST['btnsignup'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if($conn->query($sql)){
        // header("Location: login.php");
        echo "<p class='flex justify-center items-center py-6'>Registration successful</p>";
    }else{
        echo "Registration failed";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
</head>
<body class="font-['VT323']">
    <div class="flex items-center justify-center h-screen bg-gradient-to-br from-pink-500 to-pink-900">
        <div class="w-[36rem] p-6 shadow-lg rounded-md bg-white border flex justify-center items-center ">

            <form class="mb-6 text-3xl flex flex-col justify-center items-center"
            action="signup.php" method="POST" >

                
                <div class=" self-center text-pink-700">
                    <h1 class="self-center text-[3rem] bg-gradient-to-br from-pink-400 to-pink-800 text-transparent bg-clip-text py-6">Register Successful</h1>
                </div>

                
                <span>You may Log In <a href="login.php" class="text-pink-500 hover:underline hover:text-pink-300">now!</a></span>
                
            </form>
        </div>
    </div>
</body>
</html>
