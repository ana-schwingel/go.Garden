<?php
    $username = $_POST['inputUsername'];
    $password = $_POST['inputPassword'];

    $con = mysqli_connect("localhost","root","","new_db_gogarden") or die ("Erro na conexão com o banco de dados.");

    $sql = "select * from profiles where username = '$username' and password = '$password'";
    $result = mysqli_query($con,$sql) or die ("Erro na seleção de tabelas.");
    $resultRow = mysqli_fetch_assoc($result);
    $userId = $resultRow['id'];
    $h = $resultRow['hierarchy'];

    if(mysqli_num_rows($result) > 0){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['userId'] = $userId;
        $_SESSION['h'] = $h;
        if($h == 1){
            header("Location: adminNav.php");
        }else{
            header("Location: navigation.php");
        }
    }else{
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['userId']);
        header("Location: login.html");
    }
?>