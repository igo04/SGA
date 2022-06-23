<?php 

    require_once('repository/AtendenteRepository.php');

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $matricula = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_NUMBER_INT);

    $mds = "";
    if(fnaddAtendente($nome, $email, $nota)) {
        $msg = "Sucesso ao gravar";
    } else {
        $msg = "Falha na Gravação";
    }

    setcookie('notify', $msg, time() + 20);
   
    header("location:formulario-cadastro-atendente.php");
    exit;