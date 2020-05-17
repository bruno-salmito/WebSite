<div class="contentBox w100 bgwithte" data-anime="left">
    <div class="msgSuccess">
        <i class="fa fa-info"></i>
    </div>

    <div class="msgError">
        <i class="fa fa-times"></i>
    </div>

    <div class="callBox">
        <i class="fa fa-user"></i>
        <span>Adicionar Serviço</span>
    </div>
    <hr>
    <div class="cadUser">
        <form method="POST" enctype="multipart/form-data" id="form">
            <div class="inputBox w100 left">
                <label>Icone:</label>
                <input type="text" name="icone" required>
            </div>
            <div class="inputBox w100 left">
                <label>Título</label>
                <input type="text" name="titulo">
            </div>
            <div class="inputBox w100 left">
                <label>Descrição</label>
                <input type="text" name="descricao" required style="height: 20.0rem">
            </div>
            <div class="clear"></div>


            <div class="inputBox w25 left">
                <input type="hidden" name="verifica" value="NovoServico">
                <input type="submit" name="acao" value="Cadastrar">
            </div>
        </form>
    </div>
    <!--cadUser-->
    <div class="clear"></div>
</div>
<!--ContentBox-->