<?php
$guestOnline = Painel::listUserOnline();
$guestDay = Painel::listGuestDay();
$guestMonth = Painel::listGuestMonth();
?>
<div class="information w100" data-anime="top">
    <div class="wraperInf left">
        <span>DashBoard - <b style="font-style: italic;"><?php echo Painel::getCompany(); ?></b></span>
    </div>

    <div class="wraperInf right">
        <span><strong>Home</strong> / Home</span>
    </div>
    <div class="clear"></div>
</div>
<!--information-->

<div class="contentBox w100">

    <div class="singleMetric w25 left" data-anime="left">
        <h2><?php echo count($guestOnline); ?></h2>
        <p>Visitantes Online</p>

        <i class="fa fa-user"></i>
        <div class="boxInfo">
            <span>Mais informações...</span>
        </div>
    </div>
    <!--singleMetric-->

    <div class="singleMetric w25 left" data-anime="top">
        <h2><?php echo count($guestDay); ?></h2>
        <p>Visitas Hoje</p>

        <i class="fa fa-users"></i>
        <div class="boxInfo">
            <span>Mais informações...</span>
        </div>
    </div>
    <!--singleMetric-->

    <div class="singleMetric w25 left" data-anime="top">
        <h2><?php echo count($guestMonth); ?></h2>
        <p>Visitas mês</p>

        <i class="fas fa-map"></i>
        <div class="boxInfo">
            <span>Mais informações...</span>
        </div>
    </div>
    <!--singleMetric-->

    <div class="singleMetric w25 left" data-anime="right">
        <h2>150</h2>
        <p>Online</p>

        <i class="far fa-paper-plane"></i>
        <div class="boxInfo">
            <span>Mais informações...</span>
        </div>
    </div>
    <!--singleMetric-->
    <div class="clear"></div>

</div>
<!--contetnBox-->
<div class="clear"></div>

<div class="contentBox w50 bgwithte left" data-anime="left">
    <div class="callBox">
        <i class="fa fa-user"></i>
        <span>Visitantes Online</span>
    </div>

    <div class="tableBox">
        <div class="row">
            <div class="col w33 left">
                <span>Ação</span>
            </div>
            <div class="col w33 left">
                <span>IP</span>
            </div>
            <div class="col w33 right">
                <span>Data-Hora</span>
            </div>
        </div>
        <!--row-->
        <div class="clear"></div>

        <?php foreach ($guestOnline as $key => $value) { ?>

            <div class="row">
                <div class="col w33 left">
                    <span><i class="fa fa-plus"></i></span>
                </div>
                <div class="col w33 left">
                    <span><?php echo $value['ip']; ?></span>
                </div>
                <div class="col w33 right">
                    <span><?php echo date("d-m-Y H:i:s", strtotime($value['data'])); ?></span>
                </div>
            </div>
            <!--row-->
            <div class="clear"></div>
        <?php }; ?>
    </div>
    <!--tableBox-->
</div>
<!--contentBox w50-->

<div class="contentBox w50 bgwithte right" data-anime="right">
    <div class="callBox">
        <i class="fa fa-users"></i>
        <span>Visitas Hoje</span>
    </div>

    <div class="tableBox">
        <div class="row">
            <div class="col w33 left">
                <span>Ação</span>
            </div>
            <div class="col w33 left">
                <span>IP</span>
            </div>
            <div class="col w33 right">
                <span>Data-Hora</span>
            </div>
        </div>
        <!--row-->
        <div class="clear"></div>
        <?php foreach ($guestDay as $key => $value) { ?>
            <div class="row">
                <div class="col w33 left">
                    <span><i class="fa fa-plus"></i></span>
                </div>
                <div class="col w33 left">
                    <span><?php echo $value['ip']; ?></span>
                </div>
                <div class="col w33 right">
                    <span><?php echo date("d-m-Y", strtotime($value['data'])); ?></span>
                </div>
            </div>
            <!--row-->
            <div class="clear"></div>
        <?php }; ?>
    </div>
    <!--tableBox-->
</div>
<!--contentBox w50-->
<div class="clear"></div>

<div class="contentBox w100 bgwithte" data-anime="top">
    <div class="callBox">
        <i class="far fa-address-card"></i>
        <span>Usuários Cadastrados</span>
    </div>

    <div class="tableBox">
        <div class="row">
            <div class="col w25 left">
                <span>Ação</span>
            </div>
            <div class="col w25 left">
                <span>Nome</span>
            </div>
            <div class="col w25 left">
                <span>Telefone</span>
            </div>
            <div class="col w25 right">
                <span>Data</span>
            </div>
        </div>
        <!--row-->
        <div class="clear"></div>

        <div class="row">
            <div class="col w25 left">
                <span><a href=""><img src="img/whatsapp.png" title="Enviar WhatsApp"></a></span>
            </div>
            <div class="col w25 left">
                <span>Bruno Salmito</span>
            </div>
            <div class="col w25 left">
                <span>(88) 9.8888-8888</span>
            </div>
            <div class="col w25 right">
                <span>13/04/2020</span>
            </div>
        </div>
        <!--row-->
        <div class="clear"></div>


    </div>
    <!--tableBox-->

</div>
<!--contentBox-->