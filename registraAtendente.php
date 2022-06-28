<?php

    require_once('repository/AtendenteRepository.php');

    # https://www.php.net/manual/pt_BR/filter.filters.sanitize.php
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $nota = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_NUMBER_INT);

    if(empty($nome) || empty($email) || empty($nota)) {
        $msg = "Preencher todos os campos primeiro.";
    } else {
        if(fnaddAtendente($nome, $email, $nota)) {
            $msg = "Sucesso ao gravar";
        } else {
            $msg = "Falha na gravação";
        }
    }
    
    $page = "formulario-cadastro-atendente.php";
    setcookie('notify', $msg, time() + 10, "sga/{$page}", 'localhost');
   
    header("location: {$page}");
    exit;