<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Carta;

//VALIDAÇÃO DO ID
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
  header('location: index.php?status=error');
  exit;
}

//CONSULTA A VAGA
$Carta = Carta::getCarta($_GET['id']);

//VALIDAÇÃO DA CARTA
if (!$Carta instanceof Carta) {
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if (isset($_POST['excluir'])) {

  $Carta->excluir();

  header('location: index.php?status=success');
  exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirmar-exclusao.php';
include __DIR__ . '/includes/footer.php';