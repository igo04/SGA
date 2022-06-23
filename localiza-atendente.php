<?php

require_once('.repository/AtendenteRepository.php');
$nome = filter_input(INPUT_POST, 'nomeAtendente', FILTER_SANITIZE_SPECIAL_CHARS);

header("location: lista-de-atendentes.php?nome={$nome}");
exit;