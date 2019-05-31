<?php
    include "connection.php";

    $returnCad = tRegister($mysqli);
    require("tips.php");

    /* funcoes */
    function tRegister($mysqli){
        $tipText = $_POST['tipText'];
        $id = $_POST['userId'];
        $vegId = $_POST['code'];
        if(tipRegister($mysqli,$tipText,$id,$vegId)){
            return "Dica cadastrada com sucesso";
        }else{
            return "O cadastro falhou, tente novamente!";
        }
    }

    function tipRegister($mysqli,$tipText,$id,$vegId){
        $sql = "insert into usertips(text,profiles_id,vegetables_id) values('$tipText','$id','$vegId')";
        $result = mysqli_query($mysqli,$sql);
        return $result;
    }

    @mysqli_close($mysqli);
?>