<?php 

    require_once('repository/AtendenteRepository.php');

    $nome = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
   

    $mds = "";
    if(fnDeleteAtendente($id)) {
        $msg = "Sucesso ao apagar";
    } else {
        $msg = "Falha ao apagar";
    }

    setcookie('notify', $msg, time() + 20);
    header("location:listagem-de-atendentes.php");
    exit;