<?php
session_start();

// Include database connection
require './backend/db.php';
require './backend/utils.php';

//auth middleware
if (!isset($_SESSION['user'])) {
   redirect('./login');
}

//read all employees
$employees = read_employee($conn);

//search employees 
if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    
    $employees = read_employes_by_search($search, $conn);
} else {
    $employees = read_employee($conn);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
     <!-- google font import -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quantico:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<!-- /google font import -->

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <style>
        body{
            background: linear-gradient(rgba(0,0,0,0.5)),url('./images/bg2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            font-family: "Quantico", sans-serif;

        }
     </style>
</head>

<body class='text-white flex flex-col gap-6 items-center uppercase'>
    <div class="w-full flex justify-between items-center px-10 py-5">
        <?php if($_SESSION['user']['role'] == 'admin'){ echo "<a class='px-6 py-3 bg-gradient-to-r before:from-[#424242] to-[#1d1d1d] rounded-xl flex justify-center border-2 border-[#777777]' href='./create'>create</a>";} ?>
      
        <h1 class="font-bold text-3xl uppercase">dashBoard</h1>
        <div class="flex gap-4 items-center">
            <h1><?Php echo $_SESSION['user']['name'];?></h1>
        <a href="./logout" class="border-2 border-[#777777] px-5 py-2 rounded-lg flex gap-3 items-center"><h2>SIGNOUT</h2>    <i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </div>
    </div>

    <form method="get" class="flex gap-0">
        <input type="search" name="search" placeholder="search by name..." class="rounded-l-full outline-none border-2  border-[#777777] px-5 py-2"/>
        <button class="px-6 py-3 bg-gradient-to-r from-[#424242] to-[#1d1d1d]  flex justify-center border-2 border-[#777777] rounded-r-full"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <table class="table-auto">
<thead class="text-center divide-y divide-gray-200 border-2 border-[#777777]">
    <th class="px-6 py-3">E_ID</th>
    <th class="px-6 py-3">NAME</th>
    <th class="px-6 py-3">DATE OF BIRTH</th>
    <th class="px-6 py-3">PHONE_NO</th>
    <th class="px-6 py-3">EMAIL ADDRESS</th>
    <th class="px-6 py-3">JOB TITLE</th>
    <th class="px-6 py-3">DEPARTMENT</th>
    <th class="px-6 py-3">DATE OF HIRE</th>
    <th class="px-6 py-3">STATUS</th>
    
   
 </thead>

 <tbody class="text-center divide-y divide-gray-200 border-2 border-[#424242]">
    <?php 
    if($employees){
    foreach($employees as $employee){
      echo" <tr class='border-b-2 border-[#777777]'>
        <td class='px-6 py-3'>{$employee['id']}</td>
        <td class='px-6 py-3'>{$employee['name']}</td>
        <td class='px-6 py-3'>{$employee['DOB']}</td>
        <td class='px-6 py-3'>{$employee['phone']}</td>
        <td class='px-6 py-3'>{$employee['email']}</td>
        <td class='px-6 py-3'>{$employee['job_tilte']}</td>
        <td class='px-6 py-3'>{$employee['branch']}</td>
        <td class='px-6 py-3'>{$employee['date_of_hire']}</td>
        <td class='px-6 py-3'>{$employee['status']}</td>
      ";
      if($_SESSION['user']['role'] == 'admin'){
        echo "  <td class='flex gap-2 py-1 px-1 items-center justify-center'><a class='px-6 py-3 bg-gradient-to-r from-[#424242] to-[#1d1d1d]  flex justify-center border-2 border-[#777777] rounded-xl' href='./update?id={$employee['id']}'><i class='fa-solid fa-pen-to-square'></i></a> <a class='px-6 py-3 bg-gradient-to-r from-[#424242] to-[#1d1d1d] flex justify-center border-2 border-[#777777] rounded-xl' href='./delete?id={$employee['id']}'><i class='fa-solid fa-trash-can'></i></a></td></tr>";
      }else{
        echo "</tr>";
      }
    }
}
    else{
        echo "<tr><td colspan='9'>no employees found</td></tr>";
    }
    ?>
 </tbody>   
</table>



</body>
</html>