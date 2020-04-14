<?php

/**
 * Arquivo de configuração principal do PHP
 * Autor: Bruno Salmito
 * Versão: 0.0.1
 */

# Seta o time zone padrão do sistema
date_default_timezone_set('America/Sao_Paulo');

# Sessões padrões
session_start();

# Faz o autoloader de todas as classes
$autoloader = function ($class) {
    if ($class == 'Email') {
        include_once('class/phpmailer/PHPMailerAutoload.php');
    }
    include_once('class/' . $class . '.php');
};
spl_autoload_register($autoloader);


# Variáveis globais
define('INCLUDE_PATH', 'http://localhost/danki/back-end/projeto_01.2/');
define('INCLUDE_PATH_PANEL', INCLUDE_PATH . 'painel');
