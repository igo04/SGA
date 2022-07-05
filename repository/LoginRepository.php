<?php

     require_once('Connection.php');    
     
    

    function fnLogin($email, $senha) {
       $con = getConnection();
       $sql = "select id, email, created_at as createdAt from login where email = :pEmail and senha = pSenha";
       
       $stmt = $con->prepare($sql);
       $stmt-> bindParam(":pEmail",$email);
       $stmt-> bindParam(":pSenha",md5($senha));
       if($stmt->execute()) {
              
              $stmt->setFetchMode(PDO::FETCH_OBJ);
           
       }
       
       return null;

    }
