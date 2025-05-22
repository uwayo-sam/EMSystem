<?php
session_start();


// Include database connection
require './backend/db.php';

//auth middleware
if (!isset($_SESSION['user'])) {
    header("Location: ./login.php");
    exit();
}

if(isset($_POST["name"]) && isset($_POST["E_id"]) && $_POST["DOB"] && isset($_POST["email"]) &&  $_POST["job_title"] && isset($_POST["branch"]) &&  $_POST["status"] && isset($_POST["DOH"]) && isset($_POST["salary"])) {
    $name = $_POST["name"];
    $employee_Id = $_POST["E_id"];
    $DOB = $_POST["DOB"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $job_title = $_POST["job_title"];
    $branch = $_POST["branch"];
    $DOH = $_POST["DOH"];
    $status = $_POST["status"];
    $salary = $_POST["salary"];

   

    // Insert employee data into the database
    if (create_employee($name, $DOB, $email, $branch, $status, $employee_Id,$phone, $job_title, $DOH, $salary, $conn)) {
        header("Location: ./dashboard.php");
        exit();
    } else {
        echo "Error creating employee.";
    }
}

//read all employees

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<!-- google font import -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quantico:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<!-- /google font import -->


    <style>
        body{
            background: linear-gradient(rgba(0,0,0,0.5)),url('./images/bg1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            font-family: "Quantico", sans-serif;
        }
     </style>
</head>
<body class='text-white flex justify-center items-center uppercase'>
    <form method="POST" class="flex flex-col gap-6 mt-30 w-[50vw] justify-center">
        <h1 class="text-3xl uppercase font-bold text-center text-gray-400">NEW EMPLOYEE</h1>
        <div class="flex gap-4 justify-between">
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400" type="text" name="name" placeholder="Enter Your Name" required>
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 border-gray-400" type="number" name="E_id" placeholder="Employee ID" required>
        </div>

         <div class="flex gap-4 justify-between">
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 border-gray-400 appearance-none [&::-webkit-calendar-picker-indicator]:grayscale [&::-webkit-calendar-picker-indicator]:opacity-50 [&::-webkit-calendar-picker-indicator]:hover:opacity-100 [&::-webkit-calendar-picker-indicator]:cursor-pointer" type="date" name="DOB" placeholder="date of birth" required>
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 border-gray-400" type="text" name="phone" placeholder="phone number" required>
         </div>

        <div class="flex gap-4 justify-between">
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 border-gray-400" type="email" name="email" placeholder="email address" required>
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400" type="text" name="job_title" placeholder="job title" required>
        </div>

        <div class="flex gap-4 justify-between">
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400" type="text" name="branch" placeholder="department/branch" required>
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400 [&::-webkit-calendar-picker-indicator]:text-white [&::-webkit-calendar-picker-indicator]:cursor-pointer" type="date" name="DOH" placeholder="date of hire" required>
        </div>

        <div class="flex gap-4 justify-between">
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400" type="text" name="status" placeholder="status" required>
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400" type="number" name="salary" placeholder="salary" required>
        </div>
        <div class="flex gap-4 justify-center items-center w-full text-lg font-bold">
        <button class="bg-gradient-to-r from-[#424242] to-[#1d1d1d] px-5 py-3 w-[30vh] flex justify-center border-2 rounded-xl uppercase text-gray-300">create</button>
        </div>
    </form>
</body>
</html>

