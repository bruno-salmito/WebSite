<?php
include_once('config.php');
Guest::visitor();
Guest::guestOnline();
?>

<!DOCTYPE html>
<!-- 
    Projeto desenvolvido para fins de estudo das linguagens PHP/JavaScript/Mysql
    Autor: Bruno Salmito
    Versão: 0.0.1
    GitHub: GitHub: https://github.com/bruno-salmito
    Este projeto pode ser utilizado e modificado a vontade.
-->
<html lang="pt-br">

<head>
    <!-- TAG'S SEO -->
    <meta name="description" content="Desenvolvimento de sites, aplicativos, sistemas personalizados">
    <meta name="author" content="Bruno Salmito">
    <meta name="keywords" content="websites,landing page,desenvolvimento de apps, sistemas web">
    <!-- TAG Responsivo -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Links e fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/all.css">

    <!-- TAG'S diversas -->
    <meta charset="UTF-8">
    <title>Bruno Salmito</title>
</head>

<body>
    <div class="loader">
        <img src="<?php echo INCLUDE_PATH; ?>img/loader.gif">
    </div>
    <header>
        <div class="center">
            <div class="logo">
                <i class="fa fa-rocket"></i>
                <span>Bruno Salmito</span>
            </div>
            <!--logo-->

            <div class="menuSection">
                <div class="menu-toggle">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
                <!--menu-toggle-->
                <nav>
                    <ul>
                        <li><a href="#services">Sobre</a></li>
                        <li><a href="#team">Serviços</a></li>
                        <li><a href="#contact">Contato</a></li>
                        <li><a href="<?php echo INCLUDE_PATH_PANEL; ?>" target="_blank">Login</a></li>
                    </ul>
                </nav>
            </div>
            <!--menuSection-->

            <div class="clear"></div>
        </div>
        <!--center-->
    </header>

    <div class="warningError">
        <i class="fa fa-info"></i>
        <!--<span>Ops! algo de errado aconteceu</span>-->
    </div>

    <div class="warningSuccess">
        <i class="fa fa-info"></i>

    </div>


    <section class="call">

        <span class="skewed"></span>
        <div class="center">

            <div class="callText" data-banner="left">
                <div class="callTextWraper">
                    <h2>Sistemas <span>próprios</span> para empresas Autênticas.</h2>
                    <h4>Sistemas rápidos, exclusivos e fáceis de usar</h4>

                    <div class="formBox">
                        <form method="POST">
                            <div class="inputBox">
                                <input type="email" name="email" placeholder="Seu e-mail" required>
                                <input type="submit" value="Orçamento" name="acao">
                                <label>*Informe o seu melhor e-mail</label>
                            </div>
                            <div class="clear"></div>
                        </form>
                    </div>
                    <!--formBox-->
                </div>
                <!--callTextWraper-->
            </div>
            <!--callText-->


            <div class="callImg" data-banner="right">
                <div class="imac">

                </div>
                <div class="iphone">

                </div>
            </div>
            <!--callImg-->
            <div class="clear"></div>
        </div>
        <!--center-->
    </section>

    <section class="services" id="services">
        <div class="center">
            <h1 data-anime="top">Controle completo para sua empresa</h1>
            <h2 data-anime="left">Assuma o controle de sua empresa. Veja alguns de nossos recursos.</h2>

            <div class="boxWraper">
                <?php
                $sql = Mysql::connect()->prepare("SELECT * FROM `tb_site.servicos` LIMIT 3");
                $sql->execute();
                $servico = $sql->fetchAll(PDO::FETCH_ASSOC);
                $contador = 1;
                foreach ($servico as $key => $value) {
                    switch ($contador) {
                        case 1:
                            echo '<div class="boxSingle" data-anime="left">';
                            $contador++;
                            break;

                        case 2:
                            echo '<div class="boxSingle" data-anime="top">';
                            $contador++;
                            break;
                        case 3:
                            echo '<div class="boxSingle" data-anime="right">';
                            $contador = 1;
                            break;
                    }
                    echo '<i class="' . $value['icone'] . '"></i>';
                    echo '<h4>' . $value['titulo'] . '</h4>';
                    echo '<p>' . $value['descricao'] . '</p>';
                    echo '</div>';
                }
                ?>

                <?php /*
                    <div class="boxSingle" data-anime="left">
                        <i class="far fa-copy"></i>
                        <h4>Controle Financeiro</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum eveniet at animi expedita? Fugit
                            reprehenderit rem quod minus quia autem ab? Impedit eius earum qui quos nesciunt unde maiores
                            repellendus.</p>
                    </div>
                    <!--boxSingle-->


                <div class="boxSingle" data-anime="top">
                    <i class="far fa-paper-plane"></i>
                    <h4>Controle Financeiro</h4>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum eveniet at animi expedita? Fugit
                        reprehenderit rem quod minus quia autem ab? Impedit eius earum qui quos nesciunt unde maiores
                        repellendus.</p>
                </div>
                <!--boxSingle-->
                <div class="boxSingle" data-anime="right">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>Controle Financeiro</h4>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum eveniet at animi expedita? Fugit
                        reprehenderit rem quod minus quia autem ab? Impedit eius earum qui quos nesciunt unde maiores
                        repellendus.</p>
                </div>
                <!--boxSingle-->
            </div>
            <!--boxWraper-->

            <div class="boxWraper">
                <div class="boxSingle" data-anime="left">
                    <i class="far fa-copy"></i>
                    <h4>Controle Financeiro</h4>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum eveniet at animi expedita? Fugit
                        reprehenderit rem quod minus quia autem ab? Impedit eius earum qui quos nesciunt unde maiores
                        repellendus.</p>
                </div>
                <!--boxSingle-->
                <div class="boxSingle" data-anime="top">
                    <i class="far fa-paper-plane"></i>
                    <h4>Controle Financeiro</h4>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum eveniet at animi expedita? Fugit
                        reprehenderit rem quod minus quia autem ab? Impedit eius earum qui quos nesciunt unde maiores
                        repellendus.</p>
                </div>
                <!--boxSingle-->
                <div class="boxSingle" data-anime="right">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>Controle Financeiro</h4>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum eveniet at animi expedita? Fugit
                        reprehenderit rem quod minus quia autem ab? Impedit eius earum qui quos nesciunt unde maiores
                        repellendus.</p>
                </div>
                <!--boxSingle-->
                */
                ?>
            </div>
            <!--boxWraper-->

            <div class="clear"></div>
        </div>
        <!--center-->
    </section>

    <section class="testimony" data-anime="top">
        <?php
        $data = date('Y-m-d');
        $sql = Mysql::connect()->prepare("SELECT * FROM `tb_site.depoimentos` WHERE data <= ?  ORDER BY data DESC limit 1");
        $sql->execute(array($data));
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="center">
            <div class="wrapTestimony">
                <h2>O que nossos clientes dizem.</h2>
                <?php foreach ($info as $key => $value) {
                    if ($value['depoimento']) {
                        echo '<blockquote>' . $value['depoimento'] . '<blockquote>';
                    }
                    if ($value['nome']) {
                        echo '<p>' . $value['nome'] . '</p>';
                    }
                    if ($value['img']) {
                        echo '<img src="painel/uploads/users/' . $value['img'] . '"></img>';
                    }
                }; ?>
            </div>
        </div>
        <!--center-->
    </section>

    <section class="team" id="team">
        <div class="center">
            <h2 data-anime="top">conheça nossa equipe</h2>
            <p data-anime="left">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam dolorem magnam soluta
                sapiente, voluptate
                autem sed laboriosam, at, porro ab consectetur excepturi eligendi optio corrupti cumque labore facere
                similique exercitationem.</p>
            <p data-anime="right">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni hic veniam praesentium
                sequi blanditiis
                vel modi corrupti ipsa deserunt, atque maxime sit voluptates ducimus cupiditate perferendis iste sed
                velit enim.</p>

            <div class="wraperTeam">
                <div class="singleTeam" data-anime="left">
                    <img src="img/avatar.png">
                    <h2>Lorem Ipsum</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam molestias quidem doloremque
                        similique ullam voluptatum.
                    </p>
                    <div class="socialBar">
                        <span></span>
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-github"></i>
                    </div>
                </div>
                <!--singleTeam-->

                <div class="singleTeam" data-anime="top">
                    <img src="img/avatar1.png">
                    <h2>Lorem Ipsum</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam molestias quidem doloremque
                        similique ullam voluptatum.
                    </p>
                    <div class="socialBar">
                        <span></span>
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-github"></i>
                    </div>
                </div>
                <!--singleTeam-->

                <div class="singleTeam" data-anime="right">
                    <img src="img/avatar.png">
                    <h2>Lorem Ipsum</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam molestias quidem doloremque
                        similique ullam voluptatum.
                    </p>
                    <div class="socialBar">
                        <span></span>
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-github"></i>
                    </div>
                </div>
                <!--singleTeam-->
            </div>
            <!--wraperTeam-->

            <div class="clear"></div>
        </div>
        <!--center-->
    </section>

    <section class="contact" data-anime="bottom" id="contact">
        <div class="center">
            <div class="boxForm" da>
                <h2>Entre em contato</h2>
                <form method="POST">
                    <div class="inputBox">
                        <label>Nome:</label>
                        <input type="text" name="nome" required>
                    </div>
                    <div class="inputBox w50">
                        <label>Email:</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="inputBox w50">
                        <label>Telefone:</label>
                        <input type="text" name="telefone" data-input="telefone" required>
                    </div>
                    <div class="inputBox">
                        <label>Mensagem:</label>
                        <textarea name="mensagem" required></textarea>
                    </div>
                    <input type="submit" name="acao" value="Enviar">
                </form>
            </div>
            <!--boxForm-->

            <div class="maps">
                <h2>Faça uma visita!</h2>
                <div class="map" id="map">

                </div>
                <!--map-->
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </section>



    <!-- Inclusão dos scripts -->
    <script src="<?php echo INCLUDE_PATH; ?>js/principal.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/mask.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/menu.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/animate.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9j0Zd3F40EqQT8bvfbDN476fXnwhN7LY"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/maps.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/ajax.js"></script>

    <script>
        // Monitora o click em todos os links que em seu href contém #
        $('nav a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            var id = $(this).attr('href');
            var targetOffset = $(id).offset().top;

            $('html,body').animate({
                scrollTop: targetOffset - 60
            }, 600);
        });
    </script>

</body>

</html>