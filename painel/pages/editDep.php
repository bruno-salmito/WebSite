<?php
if (isset($_GET['editar'])) {
    $id = (int) $_GET['editar'];
    $depoimento = Painel::selectDep($id);
} else {
    die();
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
        <span>Editar Depoimento</span>
    </div>
    <hr>
    <div class="cadUser">
        <form method="POST" enctype="multipart/form-data" id="form">
            <div class="inputBox w50 left">
                <label>Nome:</label>
                <input type="text" name="nome" id="name" value="<?php echo $depoimento[0]['nome']; ?>">
            </div>
            <div class="clear"></div>

            <div class="inputBox w100">
                <label>Depoimento:</label>
                <textarea class="w100" style="height: 15.0rem; resize:none" name="depoimento" id="depoimento"><?php echo $depoimento[0]['depoimento']; ?></textarea>
            </div>
            <div class="clear"></div>

            <div class="inputBox w25 left">
                <input type="hidden" name="verifica" value="AtualizaDep">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="acao" value="Atualizar">
            </div>
        </form>
    </div>
    <!--cadUser-->
    <div class="clear"></div>
</div>
<!--ContentBox-->