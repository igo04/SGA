<?php 

    require_once('repository/AtendenteRepository.php');

    session_start();
   

    $mds = "";
    if(fnDeleteAtendente($_SESSION['id'])) {
        $msg = "Sucesso ao apagar";
    } else {
        $msg = "Falha ao apagar";
    }

    unset($_SESSION['id']);

    setcookie('notify', $msg, time() + 20);
    header("location:listagem-de-atendentes.php");
    exit;