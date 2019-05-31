<?php
    include "connection.php";

    $returnCad = pAn($mysqli);
    require("forumLIn.php");

    function pAn($mysqli){
        $postId = $_POST['postId'];
        $userId = $_POST['userId'];
        $answ = $_POST['inputAnsw'];
        
        if(pAnsw($mysqli,$postId,$userId,$answ)){
            return "Resposta cadastrada com sucesso!";
        }else{
            return "Falha no cadastro da resposta!";
        }
    }

    function pAnsw($mysqli,$postId,$userId,$answ){
        $sql = "insert into answersforum(text, postsForum_id, profiles_id) values('$answ','$postId','$userId')";
        $result = mysqli_query($mysqli,$sql);
        return $result;
    }

    @mysqli_query($mysqli);
?>