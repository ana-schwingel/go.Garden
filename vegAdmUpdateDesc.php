<?php
    include "connection.php";

    $returnEd = vegEd($mysqli);
    require("vegetablesAdm.php");

    function vegEd($mysqli){
        $vegId = $_POST['inputVegetable'];
        $desc = $_POST['inputDescription'];
        
        if(vegEdit($mysqli,$vegId,$desc)){
            return "Edição realizada com sucesso!";
        }else{
            return "Falha na edição!";
        }
    }

    function vegEdit($mysqli,$vegId,$desc){
        $sql = sprintf("update vegetables set description = '%s' where id = %s",$desc,$vegId);
        $result = mysqli_query($mysqli,$sql);
        return $result;
    }

    @mysqli_close($mysqli);
?>