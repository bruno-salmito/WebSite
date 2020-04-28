<?php
if (isset($_GET['excluir'])) {
    //Usuário soliciou a exclusão de um registro
    $idExcluir = (int) $_GET['excluir'];
    //Painel::deleteReg('tb_site.depoimentos', $idExcluir);
    $sql = Mysql::connect()->prepare("DELETE FROM `tb_site.depoimentos` WHERE id = $idExcluir");
    $sql->execute();
    Painel::redireciona(INCLUDE_PATH_PANEL . 'listdep');
}
$paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$porPagina = 4;
$depoimentos = Painel::selectTall("tb_site.depoimentos", ($paginaAtual - 1) * $porPagina, $porPagina);
// /$depoimentos = Painel::selectTall("tb_site.depoimentos");
?>
<div class="contentBox w100 bgwithte" data-anime="left">
    <div class="msgSuccess">
        <i class="fa fa-info"></i>
    </div>

    <div class="msgError">
        <i class="fa fa-times"></i>
    </div>

    <div class="callBox">
        <i class="far fa-address-card"></i>
        <span>Depoimentos Cadastrados</span>
    </div>
    <hr>
    <div class="cadUser">
        <div class="tableBox">
            <div class="row" style="text-align: center">
                <div class="col w25 left">
                    <span>Nome</span>
                </div>
                <div class="col w25 left">
                    <span>Depoimento</span>
                </div>
                <div class="col w25 left">
                    <span>Data</span>
                </div>
                <div class="col w25 right">
                    <span>Ação<span>
                </div>
            </div>
            <!--row-->
            <div class="clear"></div>
            <?php foreach ($depoimentos as $key => $value) { ?>


                <div class="row" style="text-align: center">
                    <div class="col w25 left" style="text-align: left">
                        <span><?php echo $value['nome']; ?></span>
                    </div>
                    <div class="col w25 left">
                        <span><?php echo substr($value['depoimento'], 0, 20) . (" ..."); ?></span>
                    </div>
                    <div class="col w25 left">
                        <span><?php echo date("d-m-Y", strtotime($value['data'])); ?></span>
                    </div>
                    <div class="col w25 right">
                        <span title="Editar"><a href="<?php echo INCLUDE_PATH_PANEL; ?>editDep?editar=<?php echo $value['id']; ?>" style="text-decoration: none; color: #ccc; font-size:1.4rem; padding-right: .5rem"><i class="fa fa-pen"></i></a><span>
                                <span title="Excluir"><a actionBtn="delete" style="text-decoration: none; color: #ccc; font-size:1.4rem; padding-right: .5rem" href="<?php echo INCLUDE_PATH_PANEL; ?>listdep?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i></a></span>
                    </div>
                </div>
                <!--row-->
                <div class="clear"></div>
            <?php } ?>
            <div class="paginacao">
                <?php $totalPaginas = ceil(count(Painel::selectTall("tb_site.depoimentos")) / $porPagina);
                for ($i = 1; $i <= $totalPaginas; $i++) {
                    if ($i == $paginaAtual) {
                        echo '<a  class="paginaSelect" href="' . INCLUDE_PATH_PANEL . 'listdep?pagina=' . $i . '">' . $i . '</a>';
                    } else {
                        echo '<a href="' . INCLUDE_PATH_PANEL . 'listdep?pagina=' . $i . '">' . $i . '</a>';
                    }
                }
                ?>
                <div class="clear"></div>
            </div>
            <div class="btn">
                <a href="" class="">Atualizar</a>
            </div>
        </div>
        <!--tableBox-->

    </div>
    <!--cadUser-->
    <div class="clear"></div>

</div>
<!--ContentBox-->