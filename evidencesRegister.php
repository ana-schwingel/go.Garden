<?php
    include "connection.php";

    $returnCad = evRegister($mysqli);
    require("evidencesReg.php");

    /* funcoes */
    function evRegister($mysqli){
        $textEvidence = $_POST['textEvidence'];
        $id = $_POST['userId'];
        if(evidenceRegister($mysqli,$textEvidence,$id)){
            return "Depoimento cadastrado com sucesso!";
        }else{
            return "O cadastro falhou, tente novamente!";
        }
    }

    function evidenceRegister($mysqli,$textEvidence,$id){
        $sql = "insert into evidences(text,profiles_id) values('$textEvidence','$id')";
        $result = mysqli_query($mysqli, $sql);
        return $result;
    }

    @mysqli_close($mysqli);
?>