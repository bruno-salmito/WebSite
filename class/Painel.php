<?php

/**
 * Classe do painel de controle que contém os principais metódos para 
 * uso no painel
 * Autor: Bruno Salmto
 * Versão: 0.0.1
 */

class Painel
{
    /**
     * Verifica se o usuário esta logado, caso:
     * True: Redireciona para o painel de controle
     * False: Para a página de login  
     */
    public static function login()
    {
        //Caso exista retorna true, caso não retorna falso
        return isset($_SESSION['login']) ? true : false;
    } //Fim login()

    /**
     * Faz o logout do usuário no painel de controle
     */
    public static function logout()
    {
        session_destroy();
    } //fim logout

    /**
     * Faz o redirecionamento para o site principal
     */
    public static function redirect()
    {
        //header('Location', INCLUDE_PATH);
        echo '<script>window.location.href="login";</script>';
    } //fim redirect

    /**
     * Retorno o cargo do usuário
     */
    public static function getCargo($cargo)
    {
        $info = [
            '0' => 'Administrador',
            '1' => 'Secretário',
            '2' => 'Digitador',
            '3' => 'Pesquisador'
        ];
        return $info[$cargo];
    }

    /**
     * Retorna as informações da empresa
     */
    public static function getCompany()
    {
        $sql = Mysql::connect()->prepare("SELECT * FROM `tb_admin.company`");
        $sql->execute();
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $info[0]['razao_social'];
    }

    /**
     * Carrega a página solicitada pela URL
     */
    public static function loadPage()
    {
        //Verifica se o usuário solicitou alguma página no painel
        if (isset($_GET['url'])) {
            $url = explode('/', $_GET['url']);
            if (file_exists('pages/' . $url[0] . '.php')) {
                //Página existe
                include('pages/' . $url[0] . '.php');
            } else {
                //Página não existe / incluir página de erro
                include('pages/home.php');
            }
        } else {
            //Caso a url não foi passada
            include('pages/home.php');
        }
    } //fim loadPage

    /**
     * Retonar a quantidade de usuários online
     */
    public static function listUserOnline()
    {
        self::deletUserOnline();
        $sql = Mysql::connect()->prepare("SELECT * FROM `tb_admin.guestOnline`");
        $sql->execute();
        return $sql->fetchAll();
    }

    /**
     * Deleta usuários que não estão navegando a mais de 2 minutos no site
     */

    private static function deletUserOnline()
    {
        $data = date("Y-m-d H:i:s");
        Mysql::connect()->exec("DELETE FROM `tb_admin.guestOnline` WHERE data < '$data' - INTERVAL 1 MINUTE");
    } //deletUserOnline()


    /**
     * Verifica a quantidade de visitas no dia
     */
    public static function listGuestDay()
    {
        $data = date("Y-m-d");
        $sql = Mysql::connect()->prepare("SELECT * FROM `tb_admin.visit` WHERE data = ?");
        $sql->execute(array($data));
        return $sql->fetchAll();
    } //fim listGuestDay

    /**
     * Verifica a quantidade de visitas no mês
     */
    public static function listGuestMonth()
    {
        $data = date("m");
        $sql = Mysql::connect()->prepare("SELECT * FROM `tb_admin.visit` WHERE MONTH(data) = '$data' ");
        $sql->execute();
        return $sql->fetchAll();
    }
}// fim class Painel
