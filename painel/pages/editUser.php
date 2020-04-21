<?php
Painel::permissionPage($_SESSION['grupo']);
/*
if (isset($_POST['acao'])) {
    if ($_FILES['imagem']['name'] != '') {
        //Usuário quer atualizar a imagem
        if (User::validImag($_FILES['imagem'])) {
            //A imagem é válida
            $imagem = User::uploadImg($_FILES['imagem']);
            if (User::updateUser($_POST, $_SESSION['id'], $imagem)) {
                //Atualizado com sucesso

            } else {
                //Erro no banco de dados
            }
        } else {
            //A imagem não é válida
        }
    } else {
        //Usuário não quer atualizar a imagem
        if (User::updateUser($_POST, $_SESSION['id'], $_POST['img_atual'])) {
            //banco de dados atualizado
        } else {
            //erro no banco de dados
        }
    }
}

*/
?>

<div class="contentBox w100 bgwithte" data-anime="left">
    <div class="msgSuccess">
        <i class="fa fa-info"></i>
    </div>

    <div class="msgError">
        <i class="fa fa-times"></i>
    </div>

    <div class="callBox">
        <i class="fa fa-user"></i>
        <span>Editar Usuário</span>
        <!--<span style="padding: 1.3rem;" class="right">Login: <?php echo $_SESSION['name']; ?></span>-->
    </div>
    <div class="clear"></div>
    <hr>

    <div class="cadUser" style="position: relative;">

        <div class="photoUserNow">
            <img src="<?php echo INCLUDE_PATH_PANEL; ?>uploads/users/<?php echo $_SESSION['img']; ?>">
        </div>
        <!--photoUserNow-->

        <form method="post" enctype="multipart/form-data" id="form">

            <div class="inputBox w50 left">
                <label>Nome:</label>
                <input type="text" data-input="basic" id="name" name="name" value="<?php echo $_SESSION['name']; ?>">
            </div>

            <div class="clear"></div>

            <div class="inputBox w50 left">
                <label>Endereço:</label>
                <input type="text" data-input="basic" id="address" name="address" value="<?php echo $_SESSION['address']; ?>">
            </div>

            <div class="clear"></div>

            <div class="inputBox w25 left">
                <label>Cidade:</label>
                <input type="text" data-input="basic" id="city" name="city" value="<?php echo $_SESSION['city']; ?>">
            </div>
            <div class="inputBox w25 left">
                <label>Estado:</label>
                <input type="text" data-input="basic" id="uf" name="uf" value="<?php echo $_SESSION['uf']; ?>">
            </div>
            <div class="clear"></div>

            <div class="inputBox w25 left">
                <label>E-mail:</label>
                <input type="email" data-input="basic" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">
            </div>
            <div class="inputBox w25 left">
                <label>Telefone:</label>
                <input type="text" name="telefone" id="telefone" data-input="telefone" value="<?php echo $_SESSION['telephone']; ?>">
            </div>
            <div class="clear"></div>

            <div class="inputBox w50 left">
                <label>Senha:</label>
                <input type="password" data-input="basic" id="password" name="password" value="<?php echo $_SESSION['password']; ?>">
            </div>

            <div class="inputBox w50 left">
                <label>Foto:</label>
                <input type="file" name="imagem" id="imagem" accept="image/*">
                <input type="hidden" name="img_atual" value="<?php echo $_SESSION['img']; ?>">

            </div>
            <div class="clear"></div>


            <div class="clear"></div>

            <div class="inputBox w25 left">
                <input type="hidden" id="verifica" name="verifica" value="Editar">
                <input type="submit" name="acao" value="Editar">
            </div>
        </form>
    </div>
    <!--cadUser-->
    <div class="clear"></div>
</div>
<!--ContentBox-->