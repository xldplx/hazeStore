<?php
include "config.php";
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
            <div class="flex gap-[1rem]">
                <a href="login.php">

                    <button name="btnlogin" class="border px-[2rem] py-1 rounded-lg hover:scale-110 transition duration-300">Login</button>
                </a>
                <div class="bg-white rounded-lg hover:scale-110 transition duration-300">
                    <a href="signup.php">
                        <button name="btnsignup" class="border px-[2rem] py-1 bg-gradient-to-br from-pink-400 text-transparent to-pink-800 bg-clip-text rounded-lg">
                            <h1>Sign up</h1>
                        </button>
                    </a>
                </div>

            </div>
        </nav>
    </header>

    <section class="h-[90vh] w-[100%] flex flex-col gap-[2rem] justify-center items-center">
        <div class="text-[4rem] font-bold drop-shadow-xl bg-white max-h-[6rem] px-[2rem] rounded-lg shadow-xl">
            <h1 class="bg-gradient-to-br from-pink-400 to-pink-800 bg-clip-text text-transparent">HAZE</h1>
        </div>
        <h1 class="text-white text-[1.5rem]">The most cheapest game store you will ever see!!!!!!</h1>
    </section>

    <section class="bg-white py-[4rem] flex flex-col gap-[4rem] justify-center items-center">
        <h1 class="bg-gradient-to-br from-pink-400 to-pink-800 bg-clip-text text-transparent text-[4rem] font-bold">Why Choose Us?</h1>
        <div class="flex gap-[2rem] justify-center items-center">
            <div class="text-center max-w-[25rem] border rounded-lg shadow-lg flex flex-col gap-[2rem] py-[4rem] px-[3rem]">
                <h1 class="text-[2rem] bg-gradient-to-br from-pink-400 to-pink-800 bg-clip-text text-transparent font-bold">Hassle-Free Booking</h1>
                <h1>No more waiting in lines or struggling with complicated booking systems. Our platform makes booking your game sessions a breeze. Simply browse our selection, choose your desired date and time, and confirm your reservation in a few clicks. We offer flexible booking options to fit your schedule, and you can even gather your friends and book a group session for ultimate fun!</h1>
            </div>
            <div class="text-center max-w-[25rem] border rounded-lg shadow-lg flex flex-col gap-[2rem] py-[6rem] px-[3rem]">
                <h1 class="text-[2rem] bg-gradient-to-br from-pink-400 to-pink-800 bg-clip-text text-transparent font-bold">Wide Variety of Games</h1>
                <h1>Dive into a world of possibilities! We offer a massive library of games across various genres, including [list popular genres on your platform]. Whether you're a seasoned gamer seeking the latest titles or a newcomer looking for the perfect introduction, we have something for everyone. Discover hidden gems, revisit classics, or embark on epic adventures – the choice is yours!</h1>
            </div>
            <div class="text-center max-w-[25rem] border rounded-lg shadow-lg flex flex-col gap-[2rem] py-[6rem] px-[3rem]">
                <h1 class="text-[2rem] bg-gradient-to-br from-pink-400 to-pink-800 bg-clip-text text-transparent font-bold">Unforgettable Gaming Experience</h1>
                <h1>We're dedicated to providing you with an unforgettable gaming experience. Our platform goes beyond just booking. We offer helpful reviews, insightful recommendations, and a thriving community to connect with fellow gamers. Explore exciting challenges, participate in tournaments, and forge lasting friendships – all within our vibrant platform. Get ready to level up your gaming experience!</h1>
            </div>
        </div>
        <a href="booking.php">
            <button name="btnbuy" class="bg-gradient-to-br from-pink-400 to-pink-800 px-[4rem] py-[1rem] rounded-lg text-white text-[1.5rem] shadow-lg hover:scale-110 transition duration-300">Book Now!</button>
        </a>
        
    </section>
</body>
</html>