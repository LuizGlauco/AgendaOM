<!DOCTYPE html>
<html lang="pt-br">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="css/login.css" rel="stylesheet">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agenda OM</title>
 
  <!-- CSS LOGIN -->
  <link href="css/login.css?v2=<?php echo time();?>" rel="stylesheet">

</head>
<?php 
include "conexao.php";
?>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn container img first">
      <img src="img/logo_topo.png" id="icon" alt="User Icon" />
    </div>
    <div>
      <h2>Agenda OM</h2>
    </div>

    <!-- Login Form -->
    <form class="form-signin" method="POST" action="dao/verifica_login.php">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Usuário" required autofocus>
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="Senha" required>
      <input type="submit" class="fadeIn fourth" value="Logar">
  
        <?php 
        if(isset($_GET['erro'])){
          echo '<div class="alert alert-danger error">';
          echo "Login ou senha inválidos!";
          echo '</div>';
        }

        ?>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Esqueceu a Senha?</a>
    </div>

  </div>
</div>  
</body>
</html>

