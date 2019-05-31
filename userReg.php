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
        <link href="css/vegetables.css" rel="stylesheet" media="all">
        <link href="css/tips.css" rel="stylesheet" media="all">
        <link href="css/footer.css" rel="stylesheet" media="all">
        <link href="css/login.css" rel="stylesheet" media="all">
        <link href="css/userRegister.css" rel="stylesheet" media="all">
    </head>
    
    <body>
        <header>
            <img src="imgs/logo-gogarden.png">      
        </header>
        <!-- content -->
        <div class="container">
            <?php if(isset($returnCad)){?>
                <h2><?=$returnCad?></h2>
            <?php } ?>
            
            <form class="form-horizontal" method="post" action="userRegister.php">
                <legend>Pronto para começar?</legend>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputName" class="col-md-4 col-form-label">Nome</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="inputName" id="inputName">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputSurname" class="col-md-4 col-form-label">Sobrenome</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="inputSurname" id="inputSurname">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="textNeeds" class="col-md-4 col-form-label">Campos obrigatórios</label>
                        <div class="col-md-8">
                            <p><a href="#"><span class="label label-info hoverA">Todos os campos são obrigatórios!</span></a></p>
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputLocation" class="col-md-4 col-form-label">Localização</label>
                        <select class="custom-select col-md-8" name="inputLocation" id="inputLocation">
                            <option selected>Escolha...</option>
                            <option value="Ac">AC</option>
                            <option value="Al">AL</option>
                            <option value="Am">AM</option>
                            <option value="Ap">AP</option>
                            <option value="Ba">BA</option>
                            <option value="Ce">CE</option>
                            <option value="Df">DF</option>
                            <option value="Es">ES</option>
                            <option value="Go">GO</option>
                            <option value="Ma">MA</option>
                            <option value="Mg">MG</option>
                            <option value="Ms">MS</option>
                            <option value="Mt">MT</option>
                            <option value="Pa">PA</option>
                            <option value="Pb">PB</option>
                            <option value="Pe">PE</option>
                            <option value="Pi">PI</option>
                            <option value="Pr">PR</option>
                            <option value="Rj">RJ</option>
                            <option value="Rn">RN</option>
                            <option value="Ro">RO</option>
                            <option value="Rr">RR</option>
                            <option value="Rs">RS</option>
                            <option value="Sc">SC</option>
                            <option value="Se">SE</option>
                            <option value="Sp">SP</option>
                            <option value="To">TO</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputTelephone" class="col-md-4 col-form-label">Telefone</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="inputTelephone" id="inputTelephone">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputUsername" class="col-md-4 col-form-label">Nome de usuário</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="inputUsername" id="inputUsername">
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="inputEmail" class="col-md-4 col-form-label">Email</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" name="inputEmail" id="inputEmail">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword" class="col-md-4 col-form-label">Senha</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control" name="inputPassword" id="inputPassword">
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputPasswordConfirm" class="col-md-4 col-form-label">Confirmação de senha</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control" name="inputPasswordConfirm" id="inputPasswordConfirm">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="terms" id="terms"> Li e concordo com os termos de uso.
                        </label>
                    </div>
                </div><br>
                
                <div class="form-row">
                    <button class="button btnGG btnGreen hvr-trim">Criar uma conta</button><br><br><br>
                </div>
            </form>
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