<?php
    include "connection.php";

    $returnEd = pEd($mysqli);
    require("editProf.php");

    function pEd($mysqli){
        $username = $_POST['i'];
        $cat = $_POST['cat'];
        $val = $_POST['val'];
        
        if(profileEdit($mysqli,$username,$cat,$val)){
            return "Edição realizada com sucesso!";
        }else{
            return "Falha na edição!";
        }
    }
    
    function profileEdit($mysqli,$username,$cat,$val){
        $sql = sprintf("update profiles set %s = '%s' where username = '%s'",$cat,$val,$username);
        $result = mysqli_query($mysqli,$sql);
        return $result;
    }

    @mysqli_result($mysqli);
?>