<?php
    include "connection.php";

    error_reporting(0);
    ini_set(“display_errors”, 0 );

	$infoCultures_id = 0000000001; // Valor setado como constante por independentemente do `id` criado na inserção de conteúdo na tabela `cultures`, poder-se-á buscar conteúdo referente à hortaliça (cadastrada na tabela `infoCultures`) pela coluna `infoCultures_id`.
    $brightness = $_GET['brightness'];
    $temperature = $_GET['temperature'];
    $soilDamp = $_GET['soilDamp'];
    $airDamp = $_GET['airDamp'];

    $sql_arduino = "INSERT INTO cultures(brightness,temperature,soilDamp,airDamp,infocultures_id) 
					VALUES('$brightness','$temperature','$soilDamp','$airDamp','$infoCultures_id')";
    $result_sqlarduino = mysqli_query($mysqli,$sql_arduino);

    require("vegetableCont.php");

    @mysqli_close($mysqli);
?>