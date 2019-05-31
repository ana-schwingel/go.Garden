<?php
    include_once("connection.php");

    // Selecionar todos os depoimentos
    $sql_evidences = "SELECT evidences.text as text, evidences.id as id, profiles.username as username
                        FROM evidences
                        INNER JOIN profiles
                        ON evidences.profiles_id = profiles.id";
    $result_evidences = mysqli_query($mysqli, $sql_evidences);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>goGarden</title>
        <meta name="viewport" content="width=devide-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link href="css/bootswatch.min.css" rel="stylesheet" media="all">
        <link href="css/style.css" rel="stylesheet" media="all">
        <link href="css/carousel.css" rel="stylesheet" media="all">
        <link href="css/hover-min.css" rel="stylesheet" media="all">
        <link href="css/footer.css" rel="stylesheet" media="all">
        <link href="css/tips.css" rel="stylesheet" media="all">
        <link href="css/vegetableControl.css" rel="stylesheet" media="all">
        <link href="css/navbarLoggedIn.css" rel="stylesheet" media="all">
        <link href="css/adminVegetableRegister.css" rel="stylesheet" media="all">
    </head>
    
    <body>
        <div class="presentation">
            <header>
                <nav class="navbar navbar-default" id="fixed"> <!-- navigation bar -->
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <!-- navbar collapse -->
                                <span class="sr-only">Toggle navigation</span> <!-- screen readers -->
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.html"><img src="imgs/logo-gogarden.png" id="logoNavbar" alt="Logo goGarden"></a> <!-- logo -->
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> <!-- navigation links -->
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="redirGCont.php">gControl</a></li>
                                <li><a href="redirVeg.php">Hortaliças</a></li>
                                <li><a href="redirEvidences.php">Depoimentos</a></li>
                                <li><a href="login.html" class="activeNav hvr-trim">Entrar</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>    
            </header>    
        </div>
        
        
        <!-- content -->
        
        <div class="container-fluid">
            <h2>Visualização de depoimentos</h2>
            <?php while ($rows = mysqli_fetch_assoc($result_evidences)){ ?>
            <div class="row">
                <div class="col-md-1">
                    <p><strong><?php echo $rows['username'] ?></strong></p>
                </div>
                <div class="col-md-11">
                    <p><?php echo $rows['text'] ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
        
        
        <!-- footer -->
        
        <div class="container-fluid" id="footer"> <!-- contact container -->
            <img src="imgs/logo-gogarden.png" class="logoGoGarden">
            Apoio: <a data-toggle="modal" data-target="#modalEpagri"><img src="imgs/new/logoEpagri.png" class="logoEpagri"></a>
            <a href="#" class="menuFooter" data-toggle="modal" data-target="#modalContact"><span class="glyphicon glyphicon-envelope"></span></a>
            <a href="#" class="menuFooter" data-toggle="modal" data-target="#modalTelephone"><span class="glyphicon glyphicon-earphone"></span></a>
        </div>
        
        <div id="modalEpagri" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h1 class="modal-title">Epagri</h1>
                    </div>
                    <div class="modal-body">
                        <h2>A empresa</h2>
                        <p>A Epagri é uma empresa pública, vinculada ao Governo do Estado de Santa Catarina por meio da Secretaria de Estado da Agricultura e da Pesca.  A criação da Empresa, em 1991, uniu os trabalhos de pesquisa e extensão rural e pesqueira, somando décadas de experiência em diferentes áreas e fortalecendo ainda mais o setor.</p>
                        <h2>Informações</h2>
                        <div class="info">
                            <p>Gerência Regional de Joinville - GRJ
                            <p>UGT: 6 (Litoral Norte Catarinense)</p>
                            <p>SDR: Joinville</p>
                            <p>Endereço: Rod. SC 418, 257 KM 0,3</p>
                            <p>Bairro Pirabeiraba</p>
                            <p>Joinville - SC CEP 89239400</p>
                            <p>Fone: (47) 34611520</p>
                            <p>E-mail: grj@epagri.sc.gov.br</p>
                            <p>Gestor/Gerente Regional: Hector Silvio Haverroth</p>
                        </div>
                        <div class="imagesModal">
                            <img src="imgs/new/logoEpagriFull.png" id="logoEpagriModal">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="modalContact" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h1 class="modal-title">Entre em contato!</h1>
                    </div>
                    <div class="modal-body">
                        <p><strong>E-mail: </strong>contato@gogarden.com</p>
                        <div class="imagesModal">
                            <img src="imgs/planta.png" id="logoEpagriModal">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div id="modalTelephone" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h1 class="modal-title">Entre em contato!</h1>
                    </div>
                    <div class="modal-body">
                        <p><strong>Telefone: </strong>(47) 3434-3434</p>
                        <div class="imagesModal">
                            <img src="imgs/planta.png" id="logoEpagriModal">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        
    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery-scrolltofixed-min.js"></script>
    </body>
</html>