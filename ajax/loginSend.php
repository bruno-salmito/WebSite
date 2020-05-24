<?php
include_once('../config.php');
$data = [];

$login = $_POST['login'];
$password = $_POST['password'];

$sql = Mysql::connect()->prepare("SELECT * FROM `tb_admin.users` WHERE login = ? AND password = ?");
$sql->execute(array($login, $password));

if ($sql->rowCount() >= 1) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($info[0] as $key => $value) {
        $_SESSION[$key] = $value;
    }
    $data['success'] = true;
    $data['msg'] = 'Tudo ok';
} else {
    $data['success'] = false;
    $data['msg'] = 'Algo errado';
}
die(json_encode($data));
