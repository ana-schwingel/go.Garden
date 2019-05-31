<?php
    include "connection.php";

    $returnFollow = uUnfollow($mysqli);
    require("navigation.php");

    function uUnfollow($mysqli){
        $myUser = $_GET['i'];
        $toUnfollowUser = $_GET['c'];
        
        if(userUnfollow($mysqli,$myUser,$toUnfollowUser)){
            return "Parou de seguir o usuário!";
        }else{
            return "Falha ao parar de seguir!";
        }
    }

    function userUnfollow($mysqli,$myUser,$toUnfollowUser){
        $sqlMyUser = "select id from profiles where username = '$myUser'";
        $result_sqlMyUser = mysqli_query($mysqli,$sqlMyUser);
        $rowMyUser = mysqli_fetch_assoc($result_sqlMyUser);
        $myId = $rowMyUser['id'];
        
        $sqlToUnfollowUser = "select id from profiles where username = '$toUnfollowUser'";
        $result_sqlToUnfollowUser = mysqli_query($mysqli,$sqlToUnfollowUser);
        $rowToUnfollowUser = mysqli_fetch_assoc($result_sqlToUnfollowUser);
        $toUnfollowId = $rowToUnfollowUser['id'];
        
        $sql = sprintf("delete from follows where profiles_id = '%s' and whoFollowId = '%s'",$myId,$toUnfollowId);
        $result_sql = mysqli_query($mysqli,$sql);
        return $result_sql;
    }

    @mysqli_close($mysqli);
?>