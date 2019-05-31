<?php
    include "connection.php";

    $returnEd = vgEd($mysqli);
    require("vegetablesAdm.php");

    function vgEd($mysqli){
        $id = $_POST['i'];
        $cat = $_POST['cat'];
        $val = $_POST['val'];
        
        if(vgEdit($mysqli,$id,$cat,$val)){
            return "Edição realizada com sucesso!";
        }else{
            return "Falha na edição!";
        }
    }

    function vgEdit($mysqli,$id,$cat,$val){
        $sql = sprintf("update control set %s = %s where id = %s",$cat,$val,$id);
        $result = mysqli_query($mysqli,$sql);
        return $result;
    }

    @mysqli_close($mysqli);
?>