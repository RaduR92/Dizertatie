<?php 
    include('database_connection.php');
    $sel = $_POST['deconectare'];
    if($sel) {
        session_start();
        session_destroy();
    }              
?>