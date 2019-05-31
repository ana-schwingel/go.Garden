<?php
    include "connection.php";
    $returnDel = deletetcat($mysqli);
    require("adminTipsCatVis.php");

    /* functions */
    function deletetcat($mysqli){
        $idCat = (isset($_GET["code"])) ? $_GET["code"] : -1;
        $result = tcatDelete($mysqli, $idCat);
        if($result){
            return "Exclusão efetuada com sucesso!";
        } else{
            return "";
        }
    }

    function tcatDelete($mysqli, $idCat){
        $sql = sprintf("delete from tipscategories where id = %s",$idCat);
        $result = mysqli_query($mysqli, $sql);
        return $result;
    }

    @mysqli_close($mysqli);
?>