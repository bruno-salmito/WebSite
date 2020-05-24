<?php

/**
 * Classe para controle do envio de e-mail
 * Classe base: PHPMailer
 * Autor: Bruno Salmito
 * Versão: 0.0.1
 */



class Email
{
    private $mailer;

    /**
     * Instância o tudo que é necessário para enviar e-mail
     * Options: host,username,password,name
     */
    public function __construct($host, $username, $password, $name)
    {
        //Instância tudo que é necessário para enviar e-mail
        $this->mailer = new PHPMailer;
        $this->mailer->isSMTP();                                            // Set mailer to use SMTP
        $this->mailer->Host = $host;
        $this->mailer->SMTPAuth = true;                                     // Enable SMTP Authentication
        $this->mailer->Username = $username;                                // SMTP username
        $this->mailer->Password = $password;                                // SMTP password
        $this->mailer->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $this->mailer->Port = 465;                                          //TCP port to connect to
        $this->mailer->setFrom($username, $name);
        $this->mailer->isHTML(true);                                        // Set email format to 
        $this->mailer->CharSet = 'UTF-8';
    } // Fim do construct

    /**
     * Adiciona o e-mail do destinatário
     * Options: email e name 
     */
    public function addEmailSend($email, $name)
    {
        $this->mailer->addAddress($email, $name);
    } // Fim do addEmailSend

    /**
     * Formato o e-mail para ser enviado adicionando o corpo do e-mail
     * Options: Array
     */
    public function setFormatEmail($info)
    {
        $this->mailer->Subject = $info['subject'];                          // Assunto do e-mail
        $this->mailer->Body = $info['body'];                                // Corpo do e-mail com html
        $this->mailer->AltBody = strip_tags($info['body']);                 // Corpo do e-mail sem html
    } // Fim do setFormatEmail

    /**
     * Envia o e-mail para nosso servidor
     * Options: void
     */
    public function sendEmail()
    {
        if ($this->mailer->send()) {
            return true;
        } else {
            return false;
        }
    }
}// Fim class Email
