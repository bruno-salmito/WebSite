<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!--TAG RESPONSIVO-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--TAG'S LINKS E FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="../css/all.css">
    <!--TAG'S DIVERSAS-->
    <meta charset="UTF-8">
    <title>Painel de Controle</title>
</head>

<body>
    <div class="loader">
        <img src="<?php echo INCLUDE_PATH; ?>img/loader.gif">
    </div>

    <div class="msgErro">
        <i class="fa fa-info"></i>
        <span>Verifique seu usuário e senha</span>
    </div>

    <div class="container">
        <form method="POST" autocomplete="off">
            <img src="../img/avatar.png" alt="">
            <h2>Entrar</h2>
            <div class="inputBox">
                <input type="text" name="login" id="login" required>
                <label for="login">Usuário</label>
            </div>

            <div class="inputBox">
                <input type="password" name="password" id="password" required>
                <label for="login">Senha</label>
            </div>
            <input type="submit" value="Entrar" name="logar">
        </form>
    </div>
    <!--container-->
    <script src="<?php echo INCLUDE_PATH_PANEL; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH_PANEL; ?>js/loginAjax.js"></script>
</body>

</html>