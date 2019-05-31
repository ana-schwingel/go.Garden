<?php
    include "connection.php";

    $returnDel = tEd($mysqli);
    require("adminTipsVisualization.php");

    function tEd($mysqli){
        $tId = $_POST['id'];
        $tTxt = $_POST['tipText'];
        
        if(tEdit($mysqli,$tId,$tTxt)){
            return "Edição realizada com sucesso!";
        }else{
            return "Falha na edição!";
        }
    }

    function tEdit($mysqli,$tId,$tTxt){
        $sql = sprintf("update admtips set text = '%s' where id = %s",$tTxt,$tId);
        $result = mysqli_query($mysqli,$sql);
        return $result;
    }

    @mysqli_close($mysqli);
?>