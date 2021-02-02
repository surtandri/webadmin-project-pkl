<?php

session_start();

function isLoggedIn()
{
    if(isset($_SESSION['username']) && isset($_SESSION['id']) ){
        return true;
    } else{
        return false;
    }
}