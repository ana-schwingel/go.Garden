<?php
    include "connection.php";

    $returnCad = vegReg($mysqli);
    require("adminVegControlReg.php");

    function vegReg($mysqli){
        $name = $_POST['inputName'];
        $desc = $_POST['inputDescription'];
        $varieties = $_POST['inputVarieties'];
        if(vegRegister($mysqli,$name,$desc,$varieties)){
            return "Hortaliça cadastrada com sucesso!";
        }else{
            return "Falha no cadastro!";
        }
    }

    function vegRegister($mysqli,$name,$desc,$varieties){
        $sql = "insert into vegetables(name, description, varieties) values('$name','$desc','$varieties')";
        $result = mysqli_query($mysqli, $sql);
        return $result;
    }

    @mysqli_close($mysqli);

?>