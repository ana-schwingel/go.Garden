<?php
    include "connection.php";
    
    $returnEd = vegEd($msqli);
    require("vegetablesAdm.php");

    function vegEd($mysqli){
        $vegId = $_POST['inputVegetable'];
        $var = $_POST['inputVarieties'];
        
        if(vegEdit($mysqli,$vegId,$var)){
            return "Edição realizada com sucesso!";
        }else{
            return "Falha na edição!";
        }
    }

    function vegEdit($mysqli,$vegId,$var){
        $sql = sprintf("update vegetables set varieties = '%s' where id = %s",$var,$vegId);
        $result = mysqli_query($mysqli,$sql);
        return $result;
    }

    @mysqli_close($mysqli);
?>