<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Carta;

$cartas = Carta::getcartas();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';