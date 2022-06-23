<?php 

    session_start();

    require_once('repository/LoginRepository.php');

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
 

    
        
    $page = "listagem-de-atendentes.php";

    if($_SESSION['login'] = fnLogin( $email, $senha)) {
      $page = 'location errorPage.php';
      
      $expire = (time() + 20);
    
      setcookie('notify', 'Falha ao efetuar o login', $expire,'/sga/errorPage.php', 'localhost', isset($_SERVER['HTTPS']), true);
            
    }

 header("location:{$page}");
    exit;