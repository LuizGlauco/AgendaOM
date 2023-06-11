<?php 
/* bloco de verificação
caso não esteja logado será direcionado para login.php
*/
@session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:login.php');
}

$logado = $_SESSION['login'];

$logado = "teste";
?>

<!DOCTYPE html>
<html lang="PT-Br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Agenda OM</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- CSS PERSONALIZADO -->
  <link href="css/style.css" rel="stylesheet">  
</head>
<?php 
    include "config.php"
?>
<body>
<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toogle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toogle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Agenda OM</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php?page=">Início</a></li>
                <li><a href="index.php?form_contato">Cadastrar</a></li>
                <li><a href="index.php?listar_contatos&contato=">Listar</a></li>
                <li><a href="index.php?sair=logout">Sair</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-left" role="search" name="busca  action="index.php">
                <div class="form-group">
                    <input type="hidden" name="page" value="listar_contatos" />
                    <input type="text" name="contato" class="form-control" placeholder="Buscar (Nome ou código)"/>
                </div>
            </form>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <!-- Main component for a primary marketing message or call to action -->
    <?php 
    $page='';
    if( empty($_REQUEST['page'])){
    ?>
    <div class="jumbotron">
        <h2><?php echo "Bem vindo(a) ". $logado ?> - Agenda OM!</h2>
        <p>Aqui você cadastra os seus contatos e pode realizar buscar a qualquer momento e em qualquer lugar!</p>
    </div>
    <?php }else{
        $pagina = $_REQUEST['page'];
        include ($pagina.'.php');
    }
    ?>

</div>
<?php 
mysqli_close($conn);
?>

    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>