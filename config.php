<?php 
  
  session_start();
  
  date_default_timezone_set('America/sao_Paulo');

    if(!isset($_SESSION['login']) || empty(isset($_SESSION['login']))){

        header("location: errorPage.php?notify=acesso-negado");
        exit;
    }