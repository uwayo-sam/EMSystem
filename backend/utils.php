<?php



// redirect util function
function redirect($url) {
    header("Location: $url");
}


//logout util function
function logout() {
    session_destroy();
}
