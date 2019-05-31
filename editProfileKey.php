<?php
    include "connection.php";

    $returnEd = pEd($mysqli);
    require("editProf.php");

    function pEd($mysqli){
        $username = $_POST['i'];
        $cat = $_POST['cat'];
        $val1 = $_POST['val1'];
        $val2 = $_POST['val2'];

        $sqlverif = "SELECT password FROM profiles WHERE username = '$username'";
        $resverif = mysqli_query($mysqli,$sqlverif);
        $row = mysqli_fetch_assoc($resverif);
        $key = $row['password'];

        if($val1 == $key){
            if(profileEdit($mysqli,$username,$cat,$val2)){
                return "Edição realizada com sucesso!";
            }else{
                return "Falha na edição!";
            }
        }else{
            return "Senha atual incorreta!";
        }
    }
    
    function profileEdit($mysqli,$username,$cat,$val2){
        $sql = sprintf("update profiles set %s = '%s' where username = '%s'",$cat,$val2,$username);
        $result = mysqli_query($mysqli,$sql);
        return $result;
    }

    @mysqli_close($mysqli);
?>