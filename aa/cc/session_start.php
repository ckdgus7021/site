<?php 
    session_start();

    $userid="";
    $username="";
    $useremail="";
 
    if( isset($_SESSION['userid'])) $userid= $_SESSION['userid'];
    if( isset($_SESSION['username'])) $username= $_SESSION['username'];
    if( isset($_SESSION['useremail'])) $useremail= $_SESSION['useremail'];
?>