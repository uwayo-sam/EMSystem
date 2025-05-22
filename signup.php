<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
     <!-- google font import -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quantico:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<!-- /google font import -->

   <style>
        body{
            font-family: "Quantico", sans-serif;
            background-image: url('./images/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
     </style>
</head>
<body class='text-white flex flex-col gap-6 justify-center items-center w-[100vw] h-[100vh] uppercase'>
    
    <form action="./backend/auth/signup.php" class="flex flex-col gap-3 items-center backdrop-blur-sm border-2 border-gray-500 rounded-xl py-10 px-5" method="post">
        <h1 class="title">Sign Up</h1>
        <input type="text" class="px-6 py-3 bg-transparent rounded-lg border-2 border-gray-500 w-[20vw]"  name="Name" placeholder="Enter Your Name" required>
        <input type="email" class="px-6 py-3 bg-transparent rounded-lg border-2 border-gray-500 w-[20vw]"  name="email" placeholder="Enter Your Email" required>
        <input type="password" class="px-6 py-3 bg-transparent rounded-lg border-2 border-gray-500 w-[20vw]"  name="password" placeholder="Enter Your Password" required>
        <button class=" bg-gradient-to-tr from-[#424242] to-[#1d1d1d] text-xl rounded-xl px-6 py-2">Sign Up</button>
        <br>
        <p>if you alread have acount <a href="./login" class="bg-gradient-to-r underline from-[#a8a8a8] to-[#a8a8a8] bg-clip-text text-transparent">login</a> </p>
    </form>
</body>
</html>