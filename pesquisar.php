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
    require_once "conexao.php";
    $pesquisa = $_POST['pesquisa'];
    $sql = "SELECT * FROM evento WHERE nome LIKE '%$pesquisa%' or categoria LIKE '%$pesquisa%'";

    $result = $conexao->query($sql);
    if ($result != null) :
      while ($row_event = $result->fetch_array()):    
  ?>
      <p><?="<strong>Nome:</strong> ".$row_event['nome']?>  <?="<br/><strong>Link:</strong> <a href='".$row_event['link']."'>".$row_event['link']."</a>"?>
      <?="<br /><strong>E-mail:</strong> ".$row_event['email']?> <?="<br/><strong>Categoria:</strong> ".$row_event['categoria']?>
      <?="<br/><strong>Descrição:</strong> ".$row_event['descricao']?></p>
  <?php 
      endwhile;
    endif;
  ?>
</div>