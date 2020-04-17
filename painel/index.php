<?php
include_once('../config.php');

//Verifica se o usuário esta logado
if (Painel::login()) {
    include('main.php');
} else {
    include('login.php');
}
