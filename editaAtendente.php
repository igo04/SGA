<?php

    require_once('repository/AtendenteRepository.php');
    require_once('util/base64.php');
    session_start();

    $nome = filter_input(INPUT_POST, 'idAtendente', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $matricula = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_NUMBER_INT);

    $foto = converterBase64($_FILES['foto']);

    if(fnUpdateAtendente($id, $nome, $foto, $email, $nota)) {
        $msg = "Sucesso ao gravar";
    } else {
        $msg = "Falha na gravação";
    }
    
    $_SESSION['id'] = $id;
    $page = "formulario-edita-atendente.php";
    setcookie('notify', $msg, time() + 10, "sga/{$page}", 'localhost');
    header("location: {$page}");
    exit;