<?php
//start session
session_start();

//include pages

require './backend/db.php';
require './backend/utils.php';

//redirect to page based on auth status

if (isset($_SESSION['user'])) {
    redirect('./dashboard.php');
} else {
    redirect('./login.php');
}