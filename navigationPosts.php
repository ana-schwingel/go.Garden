<?php
/**
 * Created by PhpStorm.
 * User: Jean
 * Date: 29/07/2016
 * Time: 15:31
 */
    include "connection.php";
    include "helpers.php";

    $textPost = $_POST['inputLegend'];
    $userid = $_POST['i'];

    //default
    $msg = "Critical error!";
    $return = "<a href='navigationP.php'>Return</a>";
    //endefault *lics?

    $upload_dir         = "imgs/postImages/";
    $upload_filename    = encryptFileName($_FILES['flimage']['name']);
    $upload_file        = $upload_dir.$upload_filename;


    $valid_extensions = array('image/jpeg', 'image/png');

    if(in_array($_FILES['flimage']['type'], $valid_extensions)){
        if (move_uploaded_file($_FILES['flimage']['tmp_name'], $upload_file)) {
            $sql = "INSERT INTO posts (texto,profiles_id, image) VALUES ('".$_POST['inputLegend']."', '".$_POST['i']."','".$upload_filename."')";
            $prepared_sql = $mysqli->prepare($sql);

            if($prepared_sql->execute()){
                $msg = "Registration completed!";
            }else{
                $msg = "Something is wrong, the registration didn't complete";
                unlink($upload_file);
            }

        } else {
            $msg = "Something in upload is wrong, can be: filename, directory, extension...";
        }
    }else{
        $msg = "Invalid extension, please use a valid extension: jpg, jpeg or png.";
    }

echo $msg." ".$return;