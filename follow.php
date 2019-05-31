<?php
    include "connection.php";

    $returnFollow = uFollow($mysqli);
    require("navigation.php");

    function uFollow($mysqli){
        $myUser = $_GET['i'];
        $toFollowUser = $_GET['c'];
        
        if(userFollow($mysqli,$myUser,$toFollowUser)){
            return "Usuário seguido!";
        }else{
            return "Falha ao seguir!";
        }
    }

    function userFollow($mysqli,$myUser,$toFollowUser){
        $sqlMyUser = "select id from profiles where username = '$myUser'";
        $result_sqlMyUser = mysqli_query($mysqli,$sqlMyUser);
        $rowMyUser = mysqli_fetch_assoc($result_sqlMyUser);
        $myId = $rowMyUser['id'];
        
        $sqlToFollowUser = "select id from profiles where username = '$toFollowUser'";
        $result_sqlToFollowUser = mysqli_query($mysqli,$sqlToFollowUser);
        $rowToFollowUser = mysqli_fetch_assoc($result_sqlToFollowUser);
        $toFollowId = $rowToFollowUser['id'];
        
        $sql = "insert into follows(profiles_id,whoFollowId) values('$myId','$toFollowId')";
        $result_sql = mysqli_query($mysqli,$sql);
        return $result_sql;
    }

    @mysqli_close($mysqli);
?>