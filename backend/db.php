<?php
 
//create connection to the database


$host ="localhost";
$user ="root";
$pass = "";
$db = "employee_management";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("error in db connection". $conn->connect_error);
}












//create oparations from both tables
function create_user($name, $password,$email,$conn) {
    $sql = "INSERT INTO users (name, password, email) VALUES ('$name', '$password', '$email')";
  
 if($conn->query($sql)) {
        return true;
    } else {
        return false;
    }
}


function create_employee($name, $DOB,$email,$branch,$status,$employee_Id,$phone,$job_tilte,$date_of_hire,$salary,$conn) {
    $sql = "INSERT INTO employes(name,DOB,email,branch,status,employee_Id,phone,job_tilte,date_of_hire,salary) 
    VALUES 
    ('$name', '$DOB', '$email','$branch','$status','$employee_Id','$phone','$job_tilte','$date_of_hire','$salary')";
  
 if($conn->query($sql)) {
        return true;
    } else {
        return false;
    }
}












//read oparations from both tables

function read_user($conn) {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
       $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    } else {
        return false;
    }
}


function read_employee($conn) {
    $sql = "SELECT * FROM employes";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
       $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    } else {
        return false;
    }
}











// read employee by id
function read_employee_by_id($id, $conn) {
    $sql = "SELECT * FROM employes WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
       $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    } else {
        return false;
    }
}










// read employee by search query
function read_employes_by_search($search, $conn) {
    $sql = "SELECT * FROM employes WHERE name LIKE '%$search%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
       $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    } else {
        return false;
    }
}










// read user by search email
function read_user_by_email($email, $conn) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
       $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    } else {
        return false;
    }
}









//update operations from both tables

function update_user($id, $name, $password,$email,$conn) {
    $sql = "UPDATE users SET name='$name', password='$password', email='$email' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function update_employee($id, $name, $DOB,$email,$branch,$status,$employee_Id,$phone,$job_tilte,$date_of_hire,$salary,$conn) {
    $sql = "UPDATE employes SET name='$name', DOB='$DOB', email='$email', branch='$branch', status='$status', employee_Id='$employee_Id', phone='$phone', job_tilte='$job_tilte', date_of_hire='$date_of_hire', salary='$salary' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}









//set user role
function set_user_role($id, $conn) {
    $sql = "UPDATE users SET role='admin' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}


//delete operations from both tables
function delete_user($id, $conn) {
    $sql = "DELETE FROM users WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function delete_employee($id, $conn) {
    $sql = "DELETE FROM employes WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}