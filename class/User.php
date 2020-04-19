<?php
include_once('../config.php');
/**
 * Classe para controlar os usuários do sistema
 * Autor: Bruno Salmito
 * Versão: 0.0.1
 */
class User
{
    /**
     * Atualiza os dados do usuário
     * Um array com as informações deve ser informado
     * @param $info = Array contendo os dados do formulário
     */
    public static function updateUser($info, $id, $img)
    {
        $sql = Mysql::connect()->prepare("UPDATE `tb_admin.users` SET name = ?, password = ?, img = ?, 
        address = ?, city = ?, uf = ?, email = ?, telephone = ? WHERE id = ?");

        if ($sql->execute(array(
            $info['name'], $info['password'], $img, $info['address'], $info['city'], $info['uf'], $info['email'],
            $info['telefone'], $id
        ))) {
            //Atualizou com sucesso
            foreach ($info as $key => $value) {
                $_SESSION[$key] = $value;
            }
            $_SESSION['img'] = $img;
            return true;
        } else {
            return false;
        }
    } //fim updateUser

    /**
     * Adiciona um novo usuário ao banco de dados
     * Um array com as informações deve ser informado
     * @param $info = Array contendo os dados do formulário
     */
    public static function addUser($info, $img)
    {
        $sql = Mysql::connect()->prepare("INSERT INTO `tb_admin.users` VALUES(null,?,?,?,?,?,?,?,?,?,?)");

        if ($sql->execute(array(
            $info['name'], $info['login'], $info['password'], 4, $img, $info['address'], $info['city'], $info['uf'], $info['email'],
            $info['telefone']
        ))) {
            //Atualizou com sucesso
            return true;
        } else {
            return false;
        }
    } //fim addUser


    /**
     * Verifica se o arquivo enviado é uma imagem
     * @param $imagem = 
     */
    public static function validImag($imagem)
    {
        // Verifica se é uma imagem
        if (
            $imagem['type'] == 'image/jpeg' ||
            $imagem['type'] == 'image/jpg' ||
            $imagem['type'] == 'image/jpeg'
        ) {
            //É um arquivo de imagem
            $tamanho = intval($imagem['size'] / 1024);
            if ($tamanho < 300) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } // fim validImg

    /**
     * Faz o upload da imagem do usuário para a pasta de uploads
     * @param $imagem = 
     */
    public static function uploadImg($imagem)
    {
        //Faz o upload da imagem para a pasta do usuário

        $folder = 'D:/HTDOCS/xampp/htdocs/danki/back-end/projeto_01.2/painel/uploads/users/';
        if (move_uploaded_file($imagem['tmp_name'], $folder . $imagem['name'])) {
            //tudo certo com a imagem
            return $imagem['name'];
        } else {
            return false;
        }
    }
}//fim User
