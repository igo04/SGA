
<?php 

    include('config.php');
    require_once('.repository/AtendenteRepository.php');
    $atendente = fnLocalizaAtendentePorId($_SESSION['id']);

   
?>

<!doctype html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edição de Atendente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
     <?php include('navbar.php'); ?>
    <div class="col-6 offset-3">
        <fieldset>
            <legend>Avaliação Atendente</legend>
            <form action="editaAtendente.php" method="post" class="form">
                <div class="card col-4 offset-4 text-center">
                    <img src="<?= $atendente->foto ?>" id="avatarId" class="rounded" alt="foto do usuário">
                </div>
                <div class="mb-3 form-group">
                  <label for="fotoId" class="form-label">Foto</label>
                  <input type="file" name="foto" id="fotoId" class="form-control" >
                  <div id="helperFoto" class="form-text">Importe a foto</div>
                </div>
                <div class="mb-3 form-group">
                    <label for="fotoId" class="form-label">Foto</label>
                    <input type="file" name="foto" id="fotoId" class="form-control">
                    <div id="helperFoto" class="form-text">Importe a foto</div>
                </div>

                <div>
                    <input type="hidden" name="idAtendente" id="atendenteId"   value="<?= $atendente->nome ?>">
                </div>
                <div class="mb-3 form-group">
                    <label for="nomeId" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nomeId" class="form-control" placeholder="Informe o nome" value="<?= $atendente->nome ?>">
                    <div id="helperNome" class="form-text">Informe o nome completo</div>
                </div>
                
                <div class="mb-3 form-group">
                    <label for="emailId" class="form-label">E-mail</label>
                    <input type="email" name="email" id="emailId" class="form-control" placeholder="Informe o e-mail" value="<?= $atendente->email ?>">
                    <div id="helperEmail" class="form-text">Informe o e-mail</div>
                </div>
                <div class="mb-3 form-group">
                    <label for="notaId" class="form-label">nota</label>
                    <input type="text" name="nota" id="notaId" class="form-control" placeholder="Informe a nota" value="<? $atendente->nota ?> ">
                    <div id="helperNota" class="form-text">Informe a nota</div>
                </div>
                <button type="submit" class="btn btn-dark">Enviar</button>
                <div id="notify" class="form-text text-capitalize fs-4"><?= isset($_COOKIE[ 'notify']) ? $_COOKIE['notify']: '' ?></div>
            </form>
        </fieldset>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <?php include("rodape.php"); ?>
    <script src="js/base64.js"></script>

  </body>


</html>