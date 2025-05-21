<?php
//---signup logic---//
define('BASE_PATH', dirname(__DIR__));
    
// Include database connection
 require BASE_PATH . '/db.php';



// Include utility functions (note the correct filename is utlib.php)

require BASE_PATH . '/utils.php';
    
if(isset($_POST["Name"]) && !empty($_POST["Name"]) && isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"])){
    $name = $_POST["Name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $check_user_exist = read_user_by_email($email, $conn);
    if($check_user_exist){
        redirect("../../login.php?exist");
    }else{
        $user = create_user($name, $password,$email,$conn);
            if($user){
                redirect("../../login.php");
            }else{
                redirect("../../signup.php?error");
            }
    }
 
}