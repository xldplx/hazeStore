<?php

include_once("config.php");
session_start();

if(isset($_POST['btnlogin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];



    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
        $_SESSION['username'] = $data['username'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['has_login'] = true;
        
        header("Location: dashboard.php");
    }else{
        echo "Login failed";
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
        <div class="w-96 p-6 shadow-lg rounded-md bg-white border ">

            <form class="mb-6 text-3xl block flex flex-col"
            action="login.php" method="POST" >

                <div class="underline self-center text-pink-700">
                    <h1 class="self-center text-[4rem] bg-gradient-to-br from-pink-400 to-pink-800 text-transparent bg-clip-text py-6">Login</h1>
                </div>
                
                <label class="block">
                    <span class="mt-6 block text-sm font-medium text-slate-700">Email</span>
                    <!-- Using form state modifiers, the classes can be identical for every input -->
                    <input type="text" placeholder="Your Email" name="email" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    required:bg-slate-50 required:text-slate-500 required:border-slate-200 required:shadow-none
                    invalid:border-pink-500 invalid:text-sky-600
                    focus:invalid:border-sky-500 focus:invalid:ring-sky-500
                    "/>
                </label>
    
                <label class="block">
                    <span class="mt-6 block text-sm font-medium text-slate-700  ">Password</span>
                    <!-- Using form state modifiers, the classes can be identical for every input -->
                    <input type="password" name="password" required class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    required:bg-slate-50 required:text-slate-500 required:border-slate-200 required:shadow-none
                    invalid:border-pink-500 invalid:text-sky-600
                    focus:invalid:border-sky-500 focus:invalid:ring-sky-500
                    "/>
                </label>
                
                <div class="self-center">
                    <div class="mt-5 w-[8rem]">
                        <button name="btnlogin" class="from-pink-400 to-pink-800 text-white bg-gradient-to-br rounded-md text-sm text-pink-800 shadow-lg py-1 w-full font-semibold hover:bg-transparent">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
