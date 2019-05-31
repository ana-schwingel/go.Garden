<?php
    include "connection.php";
    $returnDel = deleteVeg($mysqli);
    require("adminVegetableVis.php");

    /* functions */
    function deleteVeg($mysqli){
        $idVeg = (isset($_GET["code"])) ? $_GET["code"] : -1;
        $result = vegDelete($mysqli, $idVeg);
        if($result){
            return "Exclusão efetuada com sucesso!";
        } else{
            return "Falha na exclusão";
        }
    }

    function vegDelete($mysqli, $idVeg){
        $sql = sprintf("delete from vegetables where id = %s",$idVeg);
        $result = mysqli_query($mysqli, $sql);
        return $result;
    }

    @mysqli_close($mysqli);
?>