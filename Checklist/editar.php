<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar carta');

use \App\Entity\Carta;

//VALIDAÇÃO DO ID
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
  header('location: index.php?status=error');
  exit;
}

//CONSULTA A VAGA
$Carta = Carta::getCarta($_GET['id']);

//VALIDAÇÃO DA VAGA
if (!$Carta instanceof Carta) {
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if (isset($_POST['titulo'], $_POST['detalhes'], $_POST['ativo'])) {

  $Carta->titulo    = $_POST['titulo'];
  $Carta->detalhes = $_POST['detalhes'];
  $Carta->ativo     = $_POST['ativo'];
  $Carta->atualizar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';