<?php
if (Painel::login() == false) {
    header('Location', INCLUDE_PATH_PANEL);
    die();
}
if (isset($_GET['logout'])) {
    Painel::logout();
    Painel::redirect();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- TAG'S RESPONSIVO -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TAG'S DIVERSOS -->
    <meta charset="UTF-8">
    <!-- TAG'S LINKS E FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PANEL; ?>css/main.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/all.css">
    <title>Painel de controle</title>
</head>

<body>
    <!--Menu Superior-->
    <header>
        <div class="menu-section">
            <div class="menu-toggle" title="Fechar Menu">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <!--menu-toggle-->
        </div>
        <!--menu-section-->

        <div class="logout">
            <a href="<?php echo INCLUDE_PATH_PANEL; ?>?logout"><i title="Sair" class="fas fa-sign-out-alt"></i></a>
        </div>
        <!--logout-->
        <div class="clear"></div>
    </header>
    <div class="clear"></div>


    <!--Menu Lateral-->
    <div class="asside">
        <div class="center">
            <div class="panelLogo" title="Logo da empresa">
                <i class="fa fa-rocket"></i>
                <span><?php echo Painel::getCompany(); ?></span>
            </div>
            <!--panelLogo-->

            <div class="bar">
                <span></span>
            </div>
            <!--bar-->

            <div class="user">
                <div class="userImg">
                    <div class="iconeUser">
                        <!--<i title="Bruno Salmito" class="fa fa-user"></i>-->
                        <img src="<?php echo INCLUDE_PATH_PANEL; ?>uploads/users/<?php echo $_SESSION['img']; ?>" alt="<?php echo $_SESSION['name']; ?>">

                    </div>
                    <span><?php echo $_SESSION['name']; ?></span>
                    <span><?php echo Painel::getCargo($_SESSION['grupo']); ?></span>
                    <span><a href="<?php echo INCLUDE_PATH_PANEL; ?>"><i class="fa fa-home"></i></a></span>

                </div>
            </div>
            <!--user-->
            <div class="clear"></div>
            <div class="bar">
                <span></span>
            </div>
            <!--bar-->
            <div class="assideMenu">
                <h2>Cadastros</h2>
                <i class="fa fa-plus"></i>
                <ul data-asside="top">
                    <li><a href="<?php echo INCLUDE_PATH_PANEL; ?>cadUser">Usuário</a></li>
                    <li><a href="<?php echo INCLUDE_PATH_PANEL; ?>cadSlider">Slider</a></li>
                    <li><a href="<?php echo INCLUDE_PATH_PANEL; ?>cadDep">Depoimento</a></li>
                    <li><a href="<?php echo INCLUDE_PATH_PANEL; ?>cadServ">Serviços</a></li>
                    <li><a href="<?php echo INCLUDE_PATH_PANEL; ?>cadTeam">Equipe</a></li>
                </ul>
            </div>
            <!--assideMenu-->
            <div class="assideMenu">
                <h2>Editar</h2>
                <i class="fa fa-plus"></i>
                <ul data-asside="top">
                    <li><a href="<?php echo INCLUDE_PATH_PANEL; ?>editUser">Usuário</a></li>
                    <li><a href="<?php echo INCLUDE_PATH_PANEL; ?>editComp">Empresa</a></li>
                </ul>
            </div>
            <!--assideMenu-->

            <div class="assideMenu">
                <h2>Relatórios</h2>
                <i class="fa fa-plus"></i>
                <ul data-asside="top">
                    <li><a href="">Visitas</a></li>
                    <li><a href="">E-Mail</a></li>
                    <li><a href="">Leads</a></li>
                </ul>
            </div>
            <!--assideMenu-->
            <div class="bar">
                <span></span>
            </div>
            <!--bar-->

        </div>
        <!--center-->

    </div>
    <!--asside-->
    <div class="clear"></div>


    <!--Conteúdo-->
    <div class="content">
        <!-- Tirar o comentário e acrescentar as mensagens de erro   
        <div class="msgError right" data-anime="warning">
            <i class="fa fa-info"></i>
            <span>Algo de errado aconteceu aqui.</span>
        </div>
        <div class="clear"></div>

        <div class="msgSuccess right" data-anime="warning">
            <i class="fa fa-info"></i>
            <span>CAdastrado com sucesso</span>
        </div>
        <div class="clear"></div>
-->
        <div class="center">

            <?php Painel::loadPage(); ?>


        </div>
        <!--center-->

        <script src="js/animate.js"></script>
        <script src="js/menu.js"></script>
        <script src="js/mask.js"></script>


</body>

</html>