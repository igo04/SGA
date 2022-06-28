<?php 

    require_once('repository/AtendenteRepository.php');

    $nome = filter_input(INPUT_POST, 'idAtendente', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $matricula = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_NUMBER_INT);

    $mds = "";
    if(fnUpdateAtendente($id, $nome, $email, $nota)) {
        $msg = "Sucesso ao gravar";
    } else {
        $msg = "Falha na Gravação";
    }

    $_SESSION['id'] = $id;
    $page = "formulario-edita-atendente.php";
    setcookie('notify', $msg, time() + 20);
    header("location:formulario-edita-atendente.php?id=$id");
    exit;