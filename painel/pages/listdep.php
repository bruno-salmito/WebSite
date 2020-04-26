<?php
$depoimentos = Painel::selectTall("tb_site.depoimentos");
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
                        <span><?php echo substr($value['depoimento'], 0, 20); ?></span>
                    </div>
                    <div class="col w25 left">
                        <span><?php echo date("d-m-Y", strtotime($value['data'])); ?></span>
                    </div>
                    <div class="col w25 right">
                        <span title="Editar"><a href="" style="text-decoration: none; color: #ccc; font-size:1.4rem; padding-right: .5rem"><i class="fa fa-pen"></i></a><span>
                                <span title="Excluir"><a style="text-decoration: none; color: #ccc; font-size:1.4rem; padding-right: .5rem" href=""><i class="fa fa-times"></i></a></span>
                    </div>
                </div>
                <!--row-->
                <div class="clear"></div>
            <?php } ?>

        </div>
        <!--tableBox-->

        <div class="inputBox w25 left">
            <input type="hidden" name="verifica" value="Depoimento">
            <input type="submit" name="acao" value="Atualizar">
        </div>
        </form>
    </div>
    <!--cadUser-->
    <div class="clear"></div>
</div>
<!--ContentBox-->