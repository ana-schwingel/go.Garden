<?php
    include "connection.php";

    error_reporting(0);
    ini_set(“display_errors”, 0 );


    $returnCad = uReg($mysqli);
    require("userReg.php");
    

    function uReg($mysqli){
        $name = $_POST['inputName'];
        $surname = $_POST['inputSurname'];
        $location = $_POST['inputLocation'];
        $telephone = $_POST['inputTelephone'];
        $username = $_POST['inputUsername'];
        $email = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];
        $passwordConfirm = $_POST['inputPasswordConfirm'];
        $terms = $_POST['terms'];
        
        $fullName = $name." ".$surname;

        if(isset($terms)){
            if($passwordConfirm == $password){
                if(uRegister($mysqli,$fullName,$location,$telephone,$username,$email,$password)){
                    $redir = 1;
                    return "Cadastro realizado com sucesso!";
                }else{
                    $redir = 2;
                    return "Falha no cadastro!";
                }
            }else{
                $redir = 2;
                return "Senhas diferentes - Falha no cadastro!";
            }
        }else{
            return "Você precisa aceitar os termos de uso para completar o cadastro!";
        }
    }

    function uRegister($mysqli,$fullName,$location,$telephone,$username,$email,$password){
        $sql = "insert into profiles(name,username,email,telephone,uf,password,hierarchy) values('$fullName','$username','$email','$telephone','$location','$password',0)";
        $result = mysqli_query($mysqli, $sql);
        return $result;
    }
    
    @mysqli_close($mysqli);
?>