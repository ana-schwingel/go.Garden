<?php
    include "connection.php";

    $returnCad = fpPub($mysqli);
    require("forumPost.php");

    /* funcoes */
    function fpPub($mysqli){
        $title = $_POST['inputTitle'];
        $text = $_POST['inputText'];
        $id = $_POST['userId'];
        $vegId = $_POST['inputVegetable'];
        if(forumPub($mysqli,$title,$text,$id,$vegId)){
            return "Publicação realizada com sucesso!";
        }else{
            return "Publicação falhou, tente novamente!";
        }
    }

    function forumPub($mysqli,$title,$text,$id,$vegId){
        $sql = "insert into postsforum(title,text,profiles_id,vegetables_id) values('$title','$text','$id','$vegId')";
        $result = mysqli_query($mysqli, $sql);
        return $result;
    }
    
    @mysqli_close($mysqli);

?>