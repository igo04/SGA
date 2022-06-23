<?php

     require_once('Connection.php');    
     
     function fnaddAtendente($nome, $email, $nota) {
            $con = getConnection();
            
            $sql = "insert into Atendente (nome, email, nota) values (:pNome, :pEmail, :pNota)";

            $stmt = $con->prepare($sql);
            $stmt -> bindParam(":pNome",$nome);
            $stmt -> bindParam(":pEmail",$email);
            $stmt -> bindParam(":pNota",$nota);

            return $stmt->execute();

     }

    function fnlistAtendentes() {
       $con = getConnection();
       $sql = "select * from atendente";
       
      
       $result = $con->query($sql);
       $lstAtendente =array();
       while($atendente = $result->fetch(PDO::FETCH_OBJ)) {
            array_push($lstAtendentes, $atendente);

       }


       return $lstAtendentes;
    }

    function fnLocalizaAtendentePorId($id) {
       $con = getConnection();
       $sql = "select * from atendente where id = :pID";
       
       $stmt = $con->prepare($sql);
       $stmt-> bindParam(":pID",$id);
      
       if($stmt->execute()) {
              
              $stmt->setFetchMode(PDO::FETCH_OBJ);
              return $stmt->fetch();
       }
       
       return null;

    }

    require_once('Connection.php');    
     
    function fnUpdateAtendente($id, $nome, $email, $nota) {
           $con = getConnection();
           
           $sql = "update Atendente set nome= :pNome, email= :pEmail , nota= :pNota where id = :pID";

           $stmt = $con->prepare($sql);
           $stmt -> bindParam(":pID",$id);
           $stmt -> bindParam(":pEmail",$email);
           $stmt -> bindParam(":pNota",$nota);

           return $stmt->execute();

    }

    require_once('Connection.php');    
     
    function fnDeleteAtendente($id) {
           $con = getConnection();
           
           $sql = "delete from atendente where id = :pID";

           $stmt = $con->prepare($sql);
           $stmt -> bindParam(":pID",$id);
          

           return $stmt->execute();

    }

    function fnLogin($email, $senha) {
       $con = getConnection();
       $sql = "select id, email, created_at as createdAt from login where email = :pEmail and senha = pSenha";
       
       $stmt = $con->prepare($sql);
       $stmt-> bindParam(":pEmail",$email);
       $stmt-> bindParam(":pSenha",md5($senha));
       if($stmt->execute()) {
              
              $stmt->setFetchMode(PDO::FETCH_OBJ);
              return $stmt->fetch();
       }
       
       return null;

    }
