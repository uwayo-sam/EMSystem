<?php
session_start();

//---login logic---//
define('BASE_PATH', dirname(__DIR__));
    
// Include database connection
 require BASE_PATH . '/db.php';



// Include utility functions (note the correct filename is utlib.php)

require BASE_PATH . '/utils.php';

if(isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = read_user_by_email($email, $conn)[0];
    $passwordHash = $user['password'];
    if($user){
        if(password_verify($password, $user["password"])){
           $_SESSION['user'] = $user;
            redirect("../../dashboard.php");
         
        }else{
            redirect("../../login.php?error");
       
        }
}else{
    redirect("../../login.php?error");
}

}