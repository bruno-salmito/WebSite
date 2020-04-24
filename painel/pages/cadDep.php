<div class="contentBox w100 bgwithte" data-anime="left">
    <div class="msgSuccess">
        <i class="fa fa-info"></i>
    </div>

    <div class="msgError">
        <i class="fa fa-times"></i>
    </div>

    <div class="callBox">
        <i class="fa fa-user"></i>
        <span>Cadastrar Depoimento</span>
    </div>
    <hr>
    <div class="cadUser">
        <form method="POST" enctype="multipart/form-data" id="form">
            <div class="inputBox w50 left">
                <label>Nome:</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="inputBox w50 right">
                <label>Foto:</label>
                <input type="file" name="imagem" id="imagem" accept="image/*">
            </div>
            <div class="clear"></div>

            <div class="inputBox w100">
                <label>Depoimento:</label>
                <textarea class="w100" style="height: 15.0rem; resize:none" name="depoimento" id="depoimento"></textarea>
            </div>
            <div class="clear"></div>

            <div class="inputBox w25 left">
                <input type="hidden" name="verifica" value="Depoimento">
                <input type="submit" name="acao" value="Cadastrar">
            </div>
        </form>
    </div>
    <!--cadUser-->
    <div class="clear"></div>
</div>
<!--ContentBox-->