<?php

$mensagem = '';
if (isset($_GET['status'])) {
  switch ($_GET['status']) {
    case 'success':
      $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
      break;

    case 'error':
      $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
      break;
  }
}

$resultados = '';
foreach ($cartas as $Carta) {
  $resultados .= '<tr>
                      <td>' . $Carta->id . '</td>
                      <td>' . $Carta->titulo . '</td>
                      <td>' . $Carta->detalhes . '</td>
                      <td>' . ($Carta->ativo == 's' ? 'Uso' : 'Possui') . '</td>
                      <td>' . date('d/m/Y à\s H:i:s', strtotime($Carta->data)) . '</td>
                      <td>
                        <a href="editar.php?id=' . $Carta->id . '">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir.php?id=' . $Carta->id . '">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhuma carta encontrada
                                                       </td>
                                                    </tr>';

?>
<main>

  <?= $mensagem ?>

  <section>
    <a href="cadastrar.php">
      <button class="btn btn-success">Novo Carta</button>
    </a>
  </section>

  <section>

    <table class="table bg-light mt-3">
      <thead>
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th>Detalhes</th>
          <th>Status</th>
          <th>Data</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?= $resultados ?>
      </tbody>
    </table>

  </section>


</main>