<?php
if (isset($_POST['acao'])) {
    echo 'ok';
} else {
    echo 'não';
}
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
        <span>Cadastrar Categoria</span>
    </div>
    <hr>
    <div class="cadUser">
        <form method="POST" enctype="multipart/form-data">
            <div class="inputBox w100">
                <label>Categoria:</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="inputBox w100">
                <label>Slug</label>
                <input type="text" name="slug" id="slug">
            </div>
            <div class="clear"></div>

            <div class="inputBox w25 left">
                <input type="hidden" name="verifica" value="Categoria">
                <input type="submit" name="acao" value="Cadastrar">
            </div>
        </form>
    </div>
    <!--cadUser-->
    <div class="clear"></div>
</div>
<!--ContentBox-->