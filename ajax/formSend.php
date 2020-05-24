<?php

/**
 * Script para controlar o envio do formulário para e-mail
 * via Ajas (Json).
 * Autor: Bruno Salmito
 * Versão: 0.0.1
 */
include_once('../config.php');
$data = [];

// Verifica se existe o array post e post_email
if (isset($_POST['email']) & $_POST['email'] != '') {
    // Verifica se é um e-mail válido
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        //E-mail digitado é válido

        $subject = 'Novo cadastro no site';                         //Assunto do e-mail
        $body = '';

        //Preenche o corpo do e-mail com as informações do formulário
        foreach ($_POST as $key => $value) {
            $body .= ucfirst($key) . ' => ' . $value;
            $body .= '<br/>';
        }

        $info = array('subject' => $subject, 'body' => $body);
        //Instância o objeto e-mail para envio das informações
        $mail = new Email(
            'mail.sbagenciaweb.com.br',
            'contato@sbagenciaweb.com.br',
            'SENHA',
            'Bruno'
        );

        $mail->addEmailSend('brunosalmito@gmail.com', 'Bruno Salmito');     // Adiciona o e-mail para onde vai ser enviado o cadastro
        $mail->setFormatEmail($info);                                       // Formata o e-mail para envio

        if ($mail->sendEmail()) {
            $data['success'] = true;
            $data['msg'] = "<span>Enviado com sucesso...</span>";
        } else {
            //Ocorreu um erro ao enviar
            $data['success'] = false;
            $data['msg'] = "<span>Ops! Algo errado aconteceu...</span>";
        }
    } else {
        //E-mail digitado não é válido
        $data['success'] = false;
        $data['msg'] = "<span>Digite um e-mail válido</span>";
    }
} else {
    // Usuário não digitou nada.
    $data['success'] = false;
    $data['msg'] = "<span>Erro: Preencha o formulário.</span>";
}

die(json_encode($data));
