<?php

/**
 * Classe que envolve o site principal
 * Autor: Bruno Salmito
 * Versão: 0.0.1
 */
class Guest
{
    /**
     * guestOnline() -> Pega todos os visitantes online na página no momento
     */
    public static function guestOnline()
    {
        if (isset($_SESSION['guestOnline'])) {
            //Usuário online e navegando no site
            $data = date("Y-m-d H:i:s");
            $token = $_SESSION['guestOnline'];
            $ip = $_SERVER['REMOTE_ADDR'];
            $nav = $_SERVER['HTTP_USER_AGENT'];
            $disp = self::detectMobile($nav);

            //Verificamos se o painel de controle não excluiu o usuário (Usuário a mais de um minuto no site)
            $check = Mysql::connect()->prepare("SELECT * FROM `tb_admin.guestOnline` WHERE token = ?");
            $check->execute(array($_SESSION['guestOnline']));

            if ($check->rowCount() == 1) {
                //Painel de controle não excluiu do banco de dados
                $sql = Mysql::connect()->prepare("UPDATE `tb_admin.guestOnline` SET data = ? WHERE token = ?");
                $sql->execute(array($data, $token));
            } else {
                //Já foi excluído do banco de dados
                $sql = Mysql::connect()->prepare("INSERT INTO `tb_admin.guestOnline` VALUES(null,?,?,?,?,?)");
                $sql->execute(array($data, $ip, $nav, $disp, $token));
            }
        } else {
            //Usuário nõa esta online ou não esta navegando no site
            $token = uniqid();
            $data = date("Y-m-d H:i:s");
            $ip = $_SERVER['REMOTE_ADDR'];
            $nav = $_SERVER['HTTP_USER_AGENT'];
            $disp = self::detectMobile($nav);
            $_SESSION['guestOnline'] = $token;
            $sql = Mysql::connect()->prepare("INSERT INTO `tb_admin.guestOnline` VALUES(null,?,?,?,?,?)");
            $sql->execute(array($data, $ip, $nav, $disp, $token));
        }
    }

    /**
     * Visitor() -> Verifica se o usuário é um visitante a mais de 30 dias  
     */
    public static function visitor()
    {
        //Verifica se não é um visitante recente
        if (!isset($_COOKIE['guest'])) {
            // O Usuário não é um visitante recente
            $data = date("Y-m-d");
            $ip = $_SERVER['REMOTE_ADDR'];
            $nav = $_SERVER['HTTP_USER_AGENT'];
            $disp = self::detectMobile($nav);

            $sql = Mysql::connect()->prepare("INSERT INTO `tb_admin.visit` VALUES(null,?,?,?,?)");
            $sql->execute(array($ip, $data, $nav, $disp));

            // Alterar o tempo do cookie
            //setcookie("guest", "true", time() + (60 * 60 * 24 * 30));
            setcookie("guest", "true", time() + (60 * 60 * 24));
        }
    } //visitor

    /**
     * detectMobile() -> Verifica se o acesso do usuário foi feito atráves de um
     * dispositivo mobile ou desktop
     */

    private function detectMobile($agent)
    {
        // Identifica se o acesso é via mobile ou desktop
        $mobile = FALSE;
        $user_agents = array("iPhone", "iPad", "Android", "webOS", "BlackBerry", "iPod", "Symbian", "IsGeneric");

        foreach ($user_agents as $user_agent) {

            if (strpos($agent, $user_agent) !== FALSE) {
                $mobile = TRUE;
                $modelo = $user_agent;
                break;
            }
        }

        if ($mobile) {
            return strtolower($modelo);
        } else {
            return "desktop";
        }
    } //Fim detectMobile
}
