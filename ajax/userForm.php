<?php
include_once('../config.php');
//Mensagens de erro
//$response = ['status' => 0, 'message' => '<span>Erro....</span>'];
$response = ['status' => 0, 'message' => $_POST['verifica']];
if ($_POST['verifica'] == 'Editar') {
    //Usuário quer alterar a imagem
    if ($_FILES['imagem']['name'] != '') {
        //Verifica o formato da imagem
        if (User::validImag($_FILES['imagem'])) {
            //Imagem é válida
            $imagem = User::uploadImg($_FILES['imagem']);

            if (User::updateUser($_POST, $_SESSION['id'], $imagem)) {
                $response = ['status' => 1, 'message' => '<span>Usuário Atulizado...</span>'];
            } else {
                $response = ['status' => 2, 'message' => '<span>Erro ao atualizar...</span>'];
            } //Fim do if updateUser

        } else {
            $response = ['status' => 2, 'message' => '<span>A imagem não é válida</span>'];
        } //fim do vaidImag
    } else {
        //Usuário não quer mudar a imagem
        if (User::updateUser($_POST, $_SESSION['id'], $_SESSION['img'])) {
            $response = ['status' => 1, 'message' => '<span>Usuário Atulizado...</span>'];
        } else {
            $response = ['status' => 2, 'message' => '<span>Erro ao atualizar...</span>'];
        } //Fim do if updateUser
    } //fim do if $_FILES['imagem']['name'] != ''
} else if ($_POST['verifica'] == 'Cadastrar') {
    //Usuário novo
    if ($_FILES['imagem']['name'] != '') {
        //Usuário definiu uma imagem
        if (User::validImag($_FILES['imagem'])) {
            //A imagem é válida
            //Faz o upload
            $imagem = User::uploadImg($_FILES['imagem']);

            if (User::addUser($_POST, $imagem)) {
                //Usuário adicionado ao banco de dados
                $response = ['status' => 1, 'message' => '<span>Adicionado com sucesso</span>'];
            } else {
                //Erro ao adicionar
                $response = ['status' => 2, 'message' => '<span>Erro ao adicionar</span>'];
            }
        } else {
            //A imagem não é válida
            $response = ['status' => 2, 'message' => '<span>A imagem não é válida</span>'];
        }
    } else {
        //Usuário não definiu uma imagem
        $response = ['status' => 2, 'message' => '<span>Por favor defina uma imagem....</span>'];
    }
} else if ($_POST['verifica'] == 'Depoimento') {
    if ($_FILES['imagem']['name'] != '') {
        //Usuário inseriu uma imagem
        if (User::validImag($_FILES['imagem'])) {
            //A imagem é válida
            $imagem = User::uploadImg($_FILES['imagem']);
            if (Painel::addDepoimento($_POST, $imagem)) {
                //Adicionado com sucesso
                $response = ['status' => 1, 'message' => '<span>Depoimento cadastrado....</span>', 'action' => 'depoimento'];
            } else {
                //Problemas ao adicionar o depoimento
                $response = ['status' => 2, 'message' => '<span>Ops! Depoimento não cadastrado....</span>'];
            }
        } else {
            //A imagem não é válida
            $response = ['status' => 2, 'message' => '<span>Temos uma imagem inválida....</span>'];
        }
    } else {
        //Usuário não definiu uma imagem
        $imagem = 'avatar.png';
        if (Painel::addDepoimento($_POST, $imagem)) {
            //Depoimento Cadastrado
            $response = ['status' => 1, 'message' => '<span>Depoimento cadastrado....</span>', 'action' => 'depoimento'];
        } else {
            $response = ['status' => 2, 'message' => '<span>Ops! Depoimento não cadastrado....</span>'];
        }
    }
} else if ($_POST['verifica'] == 'AtualizaDep') {
    //Atualiza o cadastro
    if (Painel::updateDepoimento($_POST)) {
        //Atualizou com sucesso
        $response = ['status' => 1, 'message' => '<span>Depoimento atualizado....</span>', 'action' => 'depoimento'];
    } else {
        $response = ['status' => 2, 'message' => '<span>Ops! Depoimento não atualizado....</span>'];
    }
} else if ($_POST['verifica'] == 'NovoServico') {
    if (Painel::addServico($_POST)) {
        //Adicionou com sucesso
        $response = ['status' => 1, 'message' => '<span>Serviço adicionado com sucesso....</span>', 'action' => 'serviço'];
    } else {
        $response = ['status' => 2, 'message' => '<span>Ops! Serviço não cadastrado....</span>'];
    }
} //fim do verifica


echo json_encode($response);
