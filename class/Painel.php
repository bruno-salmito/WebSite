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

    /**
     * Adiciona um efeito ao menu selecionado
     */
    public static function selectMenu($par)
    {
        $url = explode('/', @$_GET['url'])[0];
        if ($url == $par) {
            //Adiciona a classe que contém a estilização do menu selecionado
            echo 'class="menuSelect"';
        }
    }

    /**
     * Permissão de acesso ao menu
     */
    public static function permissionMenu($cargo)
    {
        if ($cargo == 0) {
            return true;
        } else {
            echo 'style="display:none"';
        }
    }
    /**
     * Permissão de acesso a página
     */
    public static function permissionPage($cargo)
    {
        if ($cargo == 0) {
            return true;
        } else {
            include('pages/not.php');
            die();
        }
    }
    /**
     * Cadastra um depoimento no banco de dados
     * @param $info = Array com as informações preenchidas
     * @param $img = foto do depoimento
     */
    public static function addDepoimento($info, $img)
    {
        $data = date("Y-m-d");
        $sql = Mysql::connect()->prepare("INSERT INTO `tb_site.depoimentos` VALUES (null,?,?,?,?)");
        $sql->execute(array($info['name'], $img, $info['depoimento'], $data));
        if ($sql->rowCount() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Selectiona todos os dados de uma
     * @param table de referência
     */
    public static function selectTall($table, $start = null, $end = null)
    {
        if ($start == null && $end == null) {
            $sql = Mysql::connect()->prepare("SELECT * FROM `$table` ORDER BY id DESC");
        } else {
            //Usuário não passou páginação
            $sql = Mysql::connect()->prepare("SELECT * FROM `$table` ORDER BY id DESC LIMIT $start,$end");
        }
        $sql->execute();

        return $sql->fetchAll();
    }

    /**
     * Deleta os dados de uma tabela
     */
    public static function deleteReg($table, $id = false)
    {
        if ($id == false) {
            //Apaga todos os dados da tabela
            $sql = Mysql::connect()->prepare("DELETE FROM `$table`");
        } else {
            //Apaga os dados pelo id
            $sql = Mysql::connect()->prepare("DELETE FROM `$table` WHERE $id");
        }
    }

    /**
     * Redireciona a página
     */
    public static function redireciona($pagina)
    {
        echo '<script>window.location.href="' . $pagina . '";</script>';
    }
    /**
     * Seleciona os dados do depoimento para editar
     */
    public static function selectDep($id)
    {
        $sql = Mysql::connect()->prepare("SELECT * FROM `tb_site.depoimentos` WHERE id = $id");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Atualiza o depoimento
     */
    public static function updateDepoimento($info)
    {
        $sql = Mysql::connect()->prepare("UPDATE `tb_site.depoimentos` SET nome = ?, depoimento = ? WHERE id = ?");
        if ($sql->execute(array($info['nome'], $info['depoimento'], $info['id']))) {
            return true;
        } else {
            return false;
        }
    }
}// fim class Painel
