<?php
/**
 * Created by PhpStorm.
 * User: Jean
 * Date: 29/07/2016
 * Time: 15:41
 */

function encryptFileName($file){

    $pathinfo = pathinfo($file);

    $filename = MD5($pathinfo['filename'].time());

    $basename = $filename.'.'.$pathinfo['extension'];

    return $basename;

}
