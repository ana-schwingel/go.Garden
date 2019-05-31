<?php
    include "connection.php";
    $returnDel = deleteTips($mysqli);
    require("adminTipsVisualization.php");

    /* functions */
    function deleteTips($mysqli){
        $idTip = (isset($_GET["code"])) ? $_GET["code"] : -1;
        $result = tipDelete($mysqli, $idTip);
        if($result){
            return "Exclusão efetuada com sucesso!";
        } else{
            return "";
        }
    }

    function tipDelete($mysqli, $idTip){
        $sql = sprintf("delete from admtips where id = %s",$idTip);
        $result = mysqli_query($mysqli, $sql);
        return $result;
    }

    @mysqli_close($mysqli);
?>