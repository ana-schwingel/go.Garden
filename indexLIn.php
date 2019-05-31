<?php
    session_start();
    if(!isset($_SESION['username']) and !isset($_SESSION['password'])){
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        header("Location: login.html");
    }else{
        include_once("connection.php");

    }
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
        <link href="css/navbarLoggedIn.css" rel="stylesheet" media="all">
        <link href="css/carouselBck.css" rel="stylesheet" media="all">
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
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" id="mainNav"> <!-- navigation links -->
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="glyphicon glyphicon-list"></span>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="dropdown-header">Gerais</li>
                                        <li><a href="indexLIn.php">Página inicial</a></li>
                                        <li><a href="navigation.php">Navegação</a></li>
                                        
                                        <li class="dropdown-header">Hortaliças</li>
                                        <li><a href="redirVegetables.php">Visualização</a></li>
                                        
                                        <li class="dropdown-header">Depoimentos</li>
                                        <li><a href="redirEvidences.php">Visualização</a></li>
                                        <li><a href="evidencesReg.php">Registro</a></li>
                                        
                                        <li class="dropdown-header">Forum</li>
                                        <li><a href="redirForum.php">Visualização</a></li>
                                        <li><a href="forumPost.php">Registro</a></li>
                                        
                                        <li class="dropdown-header">Dicas</li>
                                        <li><a href="redirTips.php">Visualização</a></li>
                                        <li><a href="tipsReg.php">Registro</a></li>
                                        
                                        <li class="dropdown-header">gControl</li>
                                        <li><a href="redirGCont.php">Visualização</a></li>
                                        <li><a href="vegetableCont.php">Meus cultivos</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <form class="navbar-form navbar-left" role="search" method="post" action="redirSearch.php">
                                <input class="hidden" name="myUser" id="myUser" value="<?=$_SESSION['username'] ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="user" id="user" placeholder="search">
                                </div>
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </form>
                            <a id="logo" class="navbar-brand" href="index.html"><img src="imgs/logo-gogarden.png" id="logoNavbar" alt="Logo goGarden"></a>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="glyphicon glyphicon-user glyphBlack"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="dropdown-header">Meu perfil</li>
                                        <li><a href="editProf.php">Editar</a></li>
                                        <li class="dropdown-header">Sessão</li>
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>  
            </header>

            <div class="container" id="introContainer"> <!-- intro container -->
                <h1>O que você vai plantar hoje?</h1>
            </div>        
        </div>
        
        <div class="container-fluid">
            <div class="row" id="regGControl"> <!-- reg(ister) + gControl -->
                <div class="col-xs-12 col-md-6" id="regP"> <!-- register container -->
                    <h2>Inscreva-se!</h2>
                    <p>Comece agora mesmo!</p>
                    <p>Crie sua conta e explore todos os benefícios dos alimentos orgânicos.</p>
                    <a href="#" class="button btnGG btnPurple hvr-trim">Crie uma conta</a> <!-- goto register page -->
                </div>

                <div class="col-xs-12 col-md-6" id="gCP"> <!-- gControl presentation container -->
                    <h2>Temos o que você precisa!</h2>
                    <p>Com o gControl você não precisa se preocupar com seu plantio! Nós cuidamos por você!</p>
                    <p>Hidden text</p>
                    <a href="redirGCont.php" class="button btnGG btnGreen hvr-trim">Confira</a> <!-- goto gControl presentation page -->
                </div>
            </div>
        </div>
        
        <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel"> <!-- vegetables presentation container -->
            <!-- Overlay -->
            <div class="overlay"></div>
            <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#bs-carousel" data-slide-to="1"></li>
                    <li data-target="#bs-carousel" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item slides active">
                        <div class="slide-1" id="alface"></div>
                        <div class="hero">
                            <hgroup>
                                <h2>Alface</h2>
                                <p>Vegetal em que as folhas, lisas ou crespas, são a parte comestível com coloração variável entre verde amarelado, verde escuro, roxo ou variegata. Pode ser plantado o ano todo...</p>
                            </hgroup>
                            <a href="vegetablesAlfaceAdm.php" class="button btnGG btnGreen hvr-trim">Saiba mais...</a>
                        </div>
                    </div>
                    <div class="item slides">
                        <div class="slide-2" id="tomate"></div>
                        <div class="hero">       
                            <hgroup>
                                <h2>Tomate</h2>
                                <p>Fruto comestível de cor variável entre vermelho, amaralo e rosa, com folhas verdes e pelos nos caules. Em regiões litorâneas, a época mais favorável para o plantio é de julho a agosto; em regiões...</p>
                            </hgroup>
                            <a href="vegetablesTomateAdm.php" class="button btnGG btnGreen hvr-trim">Saiba mais...</a>
                        </div>
                    </div>
                    <div class="item slides">
                        <div class="slide-2" id="cenoura"></div>
                        <div class="hero">       
                            <hgroup>
                                <h2>Cenoura</h2>
                                <p>Legume em que a raíz, alaranjada, é a parte comestível. Pode ser plantada o ano todo, mas deve-se selecionar a variedade correta para cada estação. O cultivo inicia-se na...</p>
                            </hgroup>
                            <a href="vegetablesCenouraAdm.php" class="button btnGG btnGreen hvr-trim">Saiba mais...</a>
                        </div>
                    </div>
                </div> 
        </div>
        
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