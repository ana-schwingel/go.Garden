<?php
    include "connection.php";

    $returnCad = vegCReg($mysqli);
    require("adminVegControlReg.php");

    function vegCReg($mysqli){
        $minBrightness = $_POST['inputMinBrightness'];
        $maxBrightness = $_POST['inputMaxBrightness'];
        $minTemperature = $_POST['inputMinTemperature'];
        $maxTemperature = $_POST['inputMaxTemperature'];
        $minSoilDamp = $_POST['inputMinSoilDamp'];
        $maxSoilDamp = $_POST['inputMaxSoilDamp'];
        $minAirDamp = $_POST['inputMinAirDamp'];
        $maxAirDamp = $_POST['inputMaxAirDamp'];
        $vegId = $_POST['inputVegetable'];
        if(vegCRegister($mysqli,$minBrightness,$maxBrightness,$minTemperature,$maxTemperature,$minSoilDamp,$maxSoilDamp,$minAirDamp,$maxAirDamp,$vegId)){
            return "Dados cadastrados com sucesso!";
        }else{
            return "Falha no cadastro!";
        }
    }

    function vegCRegister($mysqli,$minBrightness,$maxBrightness,$minTemperature,$maxTemperature,$minSoilDamp,$maxSoilDamp,$minAirDamp,$maxAirDamp,$vegId){
        $sql = "insert into control(minBrightness, maxBrightness, minTemperature, maxTemperature, minSoilDamp, maxSoilDamp, minAirDamp, maxAirDamp, vegetables_id) values('$minBrightness','$maxBrightness','$minTemperature','$maxTemperature','$minSoilDamp','$maxSoilDamp','$minAirDamp','$maxAirDamp','$vegId')";
        $result = mysqli_query($mysqli, $sql);
        return $result;
    }

    @mysqli_close($mysqli);
?>