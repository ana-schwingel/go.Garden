<?php
    include "connection.php";

    $returnCad = tCadReg($mysqli);
    require("adminTipsCatReg.php");

    function tCadReg($mysqli){
        $category = $_POST['tipCategory'];
        if(tCadRegister($mysqli,$category)){
            return "Categoria de dica cadastrada com sucesso!";
        }else{
            return "Falha no cadastro!";
        }
    }

    function tCadRegister($mysqli,$category){
        $sql = "insert into tipscategories(category) values('$category')";
        $result = mysqli_query($mysqli, $sql);
        return $result;
    }
    
    @mysqli_close($mysqli);
?>