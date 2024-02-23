<?php
function include_assets()
{
    $page = basename($_SERVER['PHP_SELF']); // Get the current page name

    // Include styles based on the page:
    echo "<link rel='stylesheet' type='text/css' href='../style.css'>";
    if ($page == "login.php") {
        echo "<link rel='stylesheet' type='text/css' href='../styles/login.css'>";
    } else if ($page == "signup.php") {
        echo "<link rel='stylesheet' type='text/css' href='../styles/signup.css'>";
    } else if ($page == "menu.php") {
        echo "<script difer src='../js/menunew.js'></script>";
        echo "<link rel='stylesheet' type='text/css' href='../styles/menu.css'>";
    } else if ($page == "reservations.php") {
        echo "<link rel='stylesheet' type='text/css' href='../styles/reservations.css'>";
    } else if ($page == "contactus.php") {
        echo "<link rel='stylesheet' type='text/css' href='../styles/contactus.css'>";
    } else if ($page == "dashboard.php") {
        echo "<link rel='stylesheet' type='text/css' href='../styles/dashboard.css'>";
        echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>";
        echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>";
        echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>";
    }


    // Include JavaScript for all pages:
    // echo "<script src='main.js'></script>";

}
