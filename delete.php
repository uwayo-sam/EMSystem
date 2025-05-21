<?php
session_start();
// Include database logic

require './backend/db.php';
require './backend/utils.php';


//auth middleware
if (!isset($_SESSION['user'])) {
    header("Location: ./login.php");
    exit();
}


if(isset($_GET['id']) && !empty($_GET['id'])) {
    $employee_id = $_GET['id'];

    // Delete employee data from the database using the employee ID
    if (delete_employee($employee_id, $conn)) {
        redirect("./dashboard.php");
    } else {
        echo "Error deleting employee.";
    }
} else {
    redirect("./dashboard.php");
}