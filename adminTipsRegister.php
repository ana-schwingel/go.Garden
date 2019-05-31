<?php
    include "connection.php";

    $returnCad = tReg($mysqli);
    require("adminTipsReg.php");

    /* funcoes */
    function tReg($mysqli){
        $text = $_POST['inputDescription'];
        $tCategory = $_POST['inputCategory'];
        $userId = $_POST['userId'];
        $vegId = $_POST['inputVegetable'];
        if(tipRegister($mysqli,$text,$tCategory,$userId,$vegId)){
            return "Dica cadastrada com sucesso!";
        }else{
            return "O cadastro falhou, tente novamente!";
        }
    }

    function tipRegister($mysqli,$text,$tCategory,$userId,$vegId){
        $sql = "insert into admtips(text,tipsCategories_id,profiles_id,vegetables_id) values('$text','$tCategory','$userId','$vegId')";
        $result = mysqli_query($mysqli, $sql);
        return $result;
    }

    @mysqli_close($mysqli);
?>