<?php
    require_once 'conexao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Music Event</title>
</head>

<body>
  <?php
session_start();
include 'verifica_login.php';
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" href="css/main_principal.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Music Event</title>
  </head>

  <body>

    <!-- menu -->
    <nav class="navbar" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
          <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
          data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="principal.php">
            Inicio
          </a>

          <a class="navbar-item">
            Sobre
          </a>
        </div>
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            <a class="button is-light">
              Olá, <?php echo $_SESSION['usuario']; ?>
            </a>
            <a class="button is-primary" href="logout.php">
              <strong>Sair</strong>
            </a>
          </div>
        </div>
      </div>
      </div>
    </nav>

    <div class="pesquisar_dados">
      <form action="pesquisar.php" method="post">
        <input type="text" name="pesquisa" placeholder="Buscar eventos">
        <button type="submit" ><i class="fas fa-search"></i></button>
      </form>
    </div>

    <div class="exibi_dados">
      <?php
$query = "SELECT nome,link,email,categoria,descricao FROM evento";
// executa a query
$result = $conexao->query($query);
// $dados = mysqli_query($query, $conexao);
// transforma os dados em um array
$linha = $result->fetch_array();
// calcula quantos dados retornaram
$total = mysqli_num_rows($result);
?>

      <?php
// se o número de resultados for maior que zero, mostra os dados
if ($total > 0) {
    // inicia o loop que vai mostrar todos os dados
    do {
        ?>
      <p><?="<strong>Nome:</strong> ".$linha['nome']?>  <?="<br/><strong>Link:</strong> <a href='".$linha['link']."'>".$linha['link']."</a >"?>  <?="<br /><strong>E-mail:</strong> ".$linha['email']?> <?="<br/><strong>Categoria:</strong> ".$linha['categoria']?>
        <?="<br/><strong>Descrição:</strong> ".$linha['descricao']?></p>
      <?php
// finaliza o loop que vai mostrar os dados
    } while ($linha = mysqli_fetch_assoc($result));
    // fim do if
}
?>
  </div>
  </body>

  </html>
  <?php
// tira o resultado da busca da memória
mysqli_free_result($result);
?>
