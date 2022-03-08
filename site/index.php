<?php
    session_start();
    //print_r($_SESSION);
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true )){
        unset( $_SESSION['usuario']);
        unset( $_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['login'];

    ?>
<!doctype html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
      .bemvindo{
          text-align:center;
      

      }
      .barra {

        position: fixed;
      

        margin-top: -56px;
      }
      .sair{
          position: absolute;
          height: 400px;
          margin-top: -10px;
          

      }

    </style>
  </head>
  
  <body>
  <div class='bemvindo'>
         <?php
        echo "<h1> Bem vindo <u>$logado</u></h1>";
        ?>
  </div>
    <div class="row h-100">
      <div class="col-1 ">
        
      <nav class ="barra navbar bg-dark h-100">
        
      <ul class ="nav navbar-nav menuesq">
      <li class =" adminli">
      <a class ="admin" href="#" style="text-decoration:none"> ADMIN </a>
      </li>
      <li class ="nav-item">
      <a class ="nav-link" href="index.php"> Página Inicial </a>
      </li>
  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Financeiro
        </a> 
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="contasapagar.php">Contas a Pagar</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="contasareceber.php">Contas a Receber</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="grupos.php">Grupos/Subgrupos</a></li>
        </ul>
      </li>

      <li class ="nav-item">
      <a class ="nav-link" href="#"> Fornecedores </a>
      </li>
      <li class ="sair">
        <a class ="nav-link" href="sair.php"> Sair </a>
        </li>
      
      </ul>
      </nav>
     
      </div>
   
      </div>
      
      


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>