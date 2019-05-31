<?php
    include "connection.php";

    $returnEd = vegEd($mysqli);
    require("vegetablesAdm.php");

    function vegEd($mysqli){
        $vegId = $_POST['inputVegetable'];
        $name = $_POST['inputName'];
        
        if(vegEdit($mysqli,$vegId,$name)){
            return "Edição realizada com sucesso!";
        }else{
            return "Falha na edição!";
        }
    }

    function vegEdit($mysqli,$vegId,$name){
        $sql = sprintf("update vegetables set name = '%s' where id = %s",$name,$vegId);
        $result = mysqli_query($mysqli,$sql);
        return $result;
    }

    @mysqli_close($mysqli);
?>