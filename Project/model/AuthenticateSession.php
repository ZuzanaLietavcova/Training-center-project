<?php

session_start();
if(!isset($_SESSION['name']))    // if there is no valid session
{
    header("Location: login");  // redirect to login page
}