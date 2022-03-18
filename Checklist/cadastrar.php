<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar vaga');

use \App\Entity\Carta;

$Carta = new Carta;

//VALIDAÇÃO DO POST
if (isset($_POST['titulo'], $_POST['detalhes'], $_POST['ativo'])) {

  $Carta->titulo    = $_POST['titulo'];
  $Carta->detalhes = $_POST['detalhes'];
  $Carta->ativo     = $_POST['ativo'];
  $Carta->cadastrar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';