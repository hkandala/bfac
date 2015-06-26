<?php
    session_start();
    if(isset($_SESSION['curUser']))
        unset($_SESSION['curUser']);
    session_destroy();
    header("location:index.php");