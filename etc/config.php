<?php

// Base URL for the application
$_urlBase = "http://MC_CONSTRUCION_SW.test/";

// Database connection details (consider storing these in environment variables for security)
$host = '127.0.0.1';
$namedb = 'dbsistema';
$userdb = 'root';
$passwordb = ''; // Ensure secure password handling in production

// Function to get the base URL
function get_UrlBase($arg1)
{
    return $GLOBALS['_urlBase'] . $arg1;
}

// Function to get the URL for views
function get_views($arg1)
{
    return $GLOBALS['_urlBase'] . 'views/' . $arg1;
}

// Function to get the URL for models
function get_models($arg1)
{
    return $GLOBALS['_urlBase'] . 'models/' . $arg1;
}

// Function to get the URL for controllers
function get_controllers($arg1)
{
    return $GLOBALS['_urlBase'] . 'controllers/' . $arg1;
}

?>
