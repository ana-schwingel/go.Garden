<?php
    session_start();
    if(!isset($_SESION['username']) and !isset($_SESSION['password'])){
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        header("Location: index.html");
    }else{
        if($_SESSION['h'] == 1){
            header("indexAdm.php");
        }else{
            header("Location: indexLIn.php");
        }
    }

    @mysqli_close($mysqli);
?>