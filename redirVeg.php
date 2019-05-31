<?php
    session_start();
    if(!isset($_SESION['username']) and !isset($_SESSION['password'])){
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        header("Location: vegetables.php");
    }else{
        if($_SESSION['h'] == 1){
            header("Location: vegetablesAdm.php");
        }else{
            header("Location: vegetablesLIn.php");
        }
    }

    @mysqli_close($mysqli);
?>