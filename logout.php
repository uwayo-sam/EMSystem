<?php
session_start();

include './backend/utils.php';

logout();
redirect('./login.php');
