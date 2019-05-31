<?php
    include "connection.php";

    $returnDel = tcEd($mysqli);
    require("adminTipsCatVis.php");
    
    function tcEd($mysqli){
        $tcId = $_POST['id'];
        $tcCat = $_POST['tCat'];
        
        if(tcEdit($mysqli,$tcId,$tcCat)){
            return "Edição realizada com sucesso!";
        }else{
            return "Falha na edição!";
        }
    }

    function tcEdit($mysqli,$tcId,$tcCat){
        $sql = sprintf("update tipscategories set category = '%s' where id = %s",$tcCat,$tcId);
        $result = mysqli_query($mysqli,$sql);
        return $result;
    }

    @mysqli_close($mysqli);
?>