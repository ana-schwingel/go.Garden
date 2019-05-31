<?php
    include "connection.php";

    $myUser = $_POST['myUser'];
    $toFollowUser = $_POST['user'];
    
    $sqlMyUser = "select id from profiles where username = '$myUser'";
    $result_sqlMyUser = mysqli_query($mysqli,$sqlMyUser);
    $rowMyUser = mysqli_fetch_assoc($result_sqlMyUser);
    $myId = $rowMyUser['id'];
    
    $sqlToFollowUser = "select id from profiles where username = '$toFollowUser'";
    $result_sqlToFollowUser = mysqli_query($mysqli,$sqlToFollowUser);
    $rowToFollowUser = mysqli_fetch_assoc($result_sqlToFollowUser);
    $toFollowId = $rowToFollowUser['id'];

    $sql = "select * from follows where profiles_id = '$myId' and whoFollowId = '$toFollowId'";
    $result_sql = mysqli_query($mysqli,$sql);
    $rows = mysqli_num_rows($result_sql);

    if($rows>0){
        require("searchUNo.php");
    }else{
        require("searchU.php");
    }

    @mysqli_close($mysqli);
?>