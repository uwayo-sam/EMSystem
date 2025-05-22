<?php
session_start();

//include database logic
require './backend/db.php';
require './backend/utils.php';



if (!isset($_SESSION['user'])) {
    header("Location: ./login.php");
    exit();
}

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $employee_id = $_GET['id'];

    // Fetch employee data from the database using the employee ID
    // Assuming you have a function to fetch employee data by ID
    $employee = read_employee_by_id($employee_id, $conn)[0];

} else {
     redirect("./dashboard.php");
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
    $id = $_POST["id"];
    // Update employee data in the database
    if (update_employee($id, $name, $DOB, $email, $branch, $status,$employee_id,$phone,$job_title,$DOH,$salary, $conn)) {
       redirect("./dashboard.php");
      
    } else {
        echo "<p class=' text-red px-6 py-2 border-2 border-gray-400 rounded-lg'>Error updating employee.</p>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
     <!-- google font import -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quantico:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<!-- /google font import -->

        <style>
         body{
            background: linear-gradient(rgba(0,0,0,0.7)),url('./images/bg1.jpg');
            font-family: "Quantico", sans-serif;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            flex: 1;
            justify-content: center;

        }
     </style>
</head>
<body class='text-white flex  flex-col items-center uppercase'>
    <form method="POST" class="flex flex-col gap-6 justify-center w-[50vw]">
        <h1 class="text-3xl uppercase font-bold text-center text-gray-400">UPDATE EMPLOYEE</h1>
        <div>
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400" type="text" name="name" placeholder="Enter Your Name" value="<?php echo $employee['name'];?>" required>
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400" type="int" name="E_id" placeholder="Employee ID" value="<?php $employee['employee_Id'];?>"  required>
        </div>

         <div>
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400" type="date" name="DOB" placeholder="date of birth" value="<?php $employee['DOB'];?>"  required>
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400" type="text" name="phone" placeholder="phone number" value="<?php $employee['phone'];?>"  required>
         </div>

        <div>
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400" type="email" name="email" placeholder="email address" value="<?php $employee['email'];?>"  required>
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400" type="text" name="job_title" placeholder="job title" value="<?php $employee['job_tilte'];?>"  required>
        </div>

        <div>
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400" type="text" name="branch" placeholder="department/branch" value="<?php $employee['branch'];?>"  required>
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400" type="date" name="DOH" placeholder="date of hire" value="<?php $employee['date_of_hire'];?>"  required>
        </div>

        <div>
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400" type="text" name="status" placeholder="status" value="<?php $employee['status'];?>"  required>
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400" type="int" name="salary" placeholder="salary" value="<?php $employee['salary'];?>"  required>
        <input class="w-[45%] px-5 rounded-lg py-3 border-2 placeholder:text-gray-400 text-gray-400" type="hidden" name="id" value="<?php echo $employee['id'];?>">
        </div>
        <div class="flex gap-4 justify-center items-center w-full text-lg font-bold">
        <button class="bg-gradient-to-r from-[#424242] to-[#1d1d1d] px-5 py-3 w-[30vh] flex justify-center border-2 rounded-xl uppercase text-gray-300"">update</button>
        </div>
</form>
</body>
</html>