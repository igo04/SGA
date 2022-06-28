
<?php 
 
    include('config.php');
    
    require_once('.repository/AtendenteRepository.php');
    $nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
  
?>

<!doctype html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de Atendentes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="col-6 offset-3">
        <table class="table table-stripped">   
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Nota</th>
                    <th>Data Cadastro</th>
                    <th colspan="2">Gerenciar</th>
                </tr>
             </thead>
             <tbody>
               <?php foreach(fnLocalizaAtendentePorNome($nome) as $atendente): ?>
                <tr>
                    <td><?= $atendente->id ?></td>
                    <td><?= $atendente->nome ?></td>
                    <td><?= $atendente->email ?></td>
                    <td><?= $atendente->nota ?></td>
                    <td><?= $atendente->created_at ?></td>
                    <td><a href="#" onclick="gerirUsuario(<?= $atendente->id ?>, 'edit');">Editar</a> </td>
                    <td><a onclick="return confirm('Deseja realmente excluir?') ? gerirUsuario(<?= $atendente->id ?>, 'del'): '';" href="#"></a>Excluir</td>
                </tr>
               <?php endforeach; ?> 
             </tbody>
             <?php if(isset($notificacao)) : ?>
             <tfoot>
                <tr>
                    <td colspan="7"><?= isset($_COOKIE[ 'notify']) ?></td>
                </tr>


             </tfoot>
             <?php endif; ?>

        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <?php include("rodape.php"); ?>
    <script> 

      window.post = function(data){
        return fetch(
          'set-session.php',
          {
            method: 'POST',
            headers: {'Content-Type' : 'application/json'},
            body: JSON.stringify(data)
          }
        )
        .then(response =>{
          console.dir(response,`Requisição completa! Resposta:`);
        })

      }

        function gerirUsuario(id, action){
        
        post({data : id}); 

        url = 'excluirAtendente.php';
        if(action === 'edit')
          url = 'formulario-edita-atendente.php';

          window.location.href = url;
      }
  
    
    </script>
  </body>

</html>