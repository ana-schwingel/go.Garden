<?php
    session_start();
    if(!isset($_SESION['username']) and !isset($_SESSION['password'])){
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        header("Location: tipsVis.php");
    }else{
        if($_SESSION['h'] == 1){
            header("Location: tipsAdm.php");
        }else{
            header("Location: tipsVisLIn.php");
        }
    }

    @mysqli_close($mysqli);
?>