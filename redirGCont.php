<?php
    session_start();
    if(!isset($_SESION['username']) and !isset($_SESSION['password'])){
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        header("Location: gcontrol.html");
    }else{
        if($_SESSION['h'] == 1){
            header("Location: gcontrolAdm.php");
        }else{
            header("Location: gcontrolLIn.php");
        }
    }

    @mysqli_close($mysqli);
?>