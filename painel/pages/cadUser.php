<div class="contentBox w100 bgwithte" data-anime="left">
    <div class="callBox">
        <i class="fa fa-user"></i>
        <span>Adicionar Usuário</span>
    </div>
    <hr>
    <div class="cadUser">
        <form method="POST" enctype="multipart/form-data">
            <div class="inputBox w50 left">
                <label>Nome:</label>
                <input type="text" name="name" required>
            </div>
            <div class="inputBox w25 left">
                <label>RG:</label>
                <input type="text" name="rg" required>
            </div>
            <div class="inputBox w25 left">
                <label>CPF:</label>
                <input type="text" name="cpf" data-input="cpf" required>
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
                <input type="email" name="email" required>
            </div>
            <div class="inputBox w50 left">
                <label>Telefone:</label>
                <input type="text" name="uf" data-input="telefone" required>
            </div>
            <div class="clear"></div>

            <div class="inputBox w50 left">
                <label>Login:</label>
                <input type="text" name="login" required>
            </div>
            <div class="inputBox w50 left">
                <label>Senha:</label>
                <input type="password" name="password" required>
            </div>
            <div class="clear"></div>

            <div class="inputBox w100">
                <label>Foto:</label>
                <input type="file" name="file" required>
            </div>
            <div class="clear"></div>

            <div class="inputBox w25 left">

                <input type="submit" name="acao" value="Cadastrar">
            </div>
        </form>
    </div>
    <!--cadUser-->
    <div class="clear"></div>
</div>
<!--ContentBox-->