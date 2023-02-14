<?php require_once "valida_acesso.php" ?>

<?php

  $chamado_dados = [];
  $chamados = null;

  $arquivo = fopen('arquivo.hd', 'r');

  while(!feof($arquivo)){
    //Atribuindo a linha recuperada do arquivo em forma de string a uma variavel
    $arquivo_string = fgets($arquivo);
    //Dividino essa string em um array com a funcao explode
    $chamados = explode('#', $arquivo_string);
    //Confirmando se foram passadas todas as posicoes nesse loop
    if(count($chamados) < 4){
      continue; 
    }
    /*Verificando se o usuario é Administrador ou Usuario comum para saber quais
    chamados devemos exibir na pagina*/
    if($_SESSION['perfil_id'] != 1){
      if($_SESSION['id'] != $chamados[0]){
        continue;
      }
    }
    //Incluindo o chamado a um array de chamados
    $chamado_dados[] = $chamados;
  }
  //Fechando o arquivo
  fclose($arquivo);

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

              <?php foreach ($chamado_dados as $chamado) { ?>

                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= $chamado[1] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $chamado[2] ?></h6>
                    <p class="card-text"><?= $chamado[3] ?></p>
                  </div>
                </div>

              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
