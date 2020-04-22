<div class="contentBox w100 bgwithte" data-anime="left">
    <div class="msgSuccess">
        <i class="fa fa-info"></i>
    </div>

    <div class="msgError">
        <i class="fa fa-times"></i>
    </div>

    <div class="callBox">
        <i class="fa fa-user"></i>
        <span>Adicionar Usuário</span>
    </div>
    <hr>
    <div class="cadUser">
        <form method="POST" enctype="multipart/form-data" id="form">
            <div class="inputBox w50 left">
                <label>Nome:</label>
                <input type="text" name="name" required>
            </div>
            <div class="inputBox w25 left">
                <label>RG:</label>
                <input type="text" name="rg" id="rg" required>
            </div>
            <div class="inputBox w25 left">
                <label>CPF:</label>
                <input type="text" id="cpf" name="cpf" data-input="cpf" required>
            </div>
            <div class="clear"></div>

            <div class="inputBox w50 left">
                <label>Endereço:</label>
                <input type="text" name="address" required>
            </div>
            <div class="inputBox w25 left">
                <label>Cidade:</label>
                <input type="text" name="city" required>
            </div>
            <div class="inputBox w25 left">
                <label>Estado:</label>
                <input type="text" name="uf" required>
            </div>
            <div class="clear"></div>

            <div class="inputBox w50 left">
                <label>E-mail:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="inputBox w50 left">
                <label>Telefone:</label>
                <input type="text" name="telefone" data-input="telefone" required>
            </div>
            <div class="clear"></div>

            <div class="inputBox w50 left">
                <label>Login:</label>
                <input type="text" name="login" id="login" value='' readonly>
            </div>
            <div class="inputBox w50 left">
                <label>Senha:</label>
                <input type="password" name="password" required>
            </div>
            <div class="clear"></div>

            <div class="inputBox w100">
                <label>Foto:</label>
                <input type="file" name="imagem" id="imagem" accept="image/*" required>
            </div>
            <div class="clear"></div>

            <div class="inputBox w25 left">
                <input type="hidden" name="verifica" value="Novo">
                <input type="submit" name="acao" value="Cadastrar">
            </div>
        </form>
    </div>
    <!--cadUser-->
    <div class="clear"></div>
</div>
<!--ContentBox-->