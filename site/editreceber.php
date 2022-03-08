<?php

if(!empty($_GET['id']))
{
  include_once('config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM contasreceber WHERE idreceber=$id;";
    
    $result = $conexao->query($sqlSelect);

    if($result -> num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
        $data = $user_data['lancamento'];
        $grupo = $user_data['grupo'];
        $subgrupo = $user_data['subgrupo'];
        $vencimento = $user_data['vencimento'];
        $historico = $user_data['historico'];
        $historicolongo = $user_data['historicolongo'];
        $valor = $user_data['valor'];
        $numparcelas = $user_data['numparcelas'];
        $valorparcela = $user_data['valorparcela'];
        $cliente = $user_data['cliente'];

        }
        /*
        print_r($result);
        */
    }
    else{
        header('Loocation: contasreceber.php');
    }

}

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
      
      .barra {
  
        position: fixed;
      
      } 
      .sair{
        position: absolute;
        height: 400px;
        margin-top: -10px;
      } 
      .bg-cinza{
          background-color: #EEEEEE;
      }
    </style>
  </head>
  
  <body class="bg-cinza">
  
    <div class="row h-100">
      <div class="col-1 ">
      <nav class ="navbar bg-dark h-100 barra">
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
      <div class="col-10">
      <div class="containerpagar">
      <form action="saveEditReceber.php" method="POST">
        <div class=lancamentotitulopagar><p><b>Editar Dados - Contas a Receber</b></p></div>
        <div class=inputsclientereceber>
        <input type="text" name="clientereceber" id="clientereceber"class="dataegrupos" value="<?php echo $cliente ?>" required>
        </div>
          <div class=inputspagardata>
            <input type="date" name="datareceber" id="datareceber" class="dataegrupos" value="<?php echo $data ?>" required>
          </div>
          <div class=inputspagargrupo>   
                <select class="grupo-input" name="gruporeceber" id="gruporeceber" class="dataegrupos"  required>
                  <option>Selecione</option>
                <option>Grupo 1</option>
                <option>Grupo 2</option>
                <option>Grupo 3</option>
                <option>Grupo 4</option>
                <option>Grupo 5</option>
              </select>
          </div>
          <div class=inputspagarsubgrupo>   
            <select class="grupo-input" name="subgruporeceber" id="subgruporeceber" class="dataegrupos" required>
              <option>Selecione</option>
              <option>SubGrupo 1</option>
              <option>SubGrupo 2</option>
              <option>SubGrupo 3</option>
              <option>SubGrupo 4</option>
              <option>SubGrupo 5</option>
            </select>
        </div>
        <div class=inputspagardatavencimento>
            <input type="date" name="vencimentoreceber" id="vencimentoreceber" class="dataegrupos" value="<?php echo $vencimento ?>" required>
          </div>
          <div class=inputspagarhistorico>
              <input type="text" name="historicoreceber" id="historicoreceber" class="text-input" value="<?php echo $historico ?>" required>
          </div>
          <div class=inputspagarhistoricolongo>
          <input type="text" name="historicolongoreceber" id="historicolongoreceber" class="historicolongo" value="<?php echo $historicolongo ?>" required>
        </div>
        <div class=inputspagarvalor>
          <input type="number" name="valorreceber" id="valorreceber" class="dataegrupos" value="<?php echo $valor ?>" required>
        </div>
        <div class=parcelamentotitulopagar><b><p>Parcelamento</p></b></div>
        <div class=inputspagarnumparcelas>
          <input type="number" name="numparcelasreceber" id="numparcelasreceber" class="numparcelas" value="<?php echo $numparcelas ?>" required>
        </div>
        <div class=inputspagarvalorparcela>
          <input type="number" name="valorparcelareceber" id="valorparcelareceber"class="dataegrupos" value="<?php echo $valorparcela ?>" required>
        </div>
        <div>
          <input type="hidden" name="id" value="<?php echo $id ?>">
        </div>
        <div class= clientetitulopagar>
          <b><p>Cliente</p></b>
        </div>
        <div class=botaopagar>
          <button type="submit" name="update" id="update" class="btn btn-success">Gravar</button>
        </div>
      </form>
      </div>
      <div class=containerpagartexto>
        <div class=inputspagardatatexto><p>Lançamento:</p></div>
        <div class=inputspagargrupotexto><p>Grupo:</p></div>
        <div class=inputspagarsubgrupotexto><p>SubGrupo:</p></div>
        <div class=inputspagardatavencimentotexto><p>Vencimento:</p></div>
        <div class=inputspagarhistoricotexto><p>Histórico:</p></div>
        <div class=inputspagarhistoricolongotexto><p>Histórico Longo:</p></div>
        <div class=inputspagarvalortexto><p>Valor:</p></div>
        <div class=inputspagarnumparcelastexto>Parcelas:</div>
        <div class=inputspagarvalorparcelatexto><p>Valor da Parcela:</p></div>
        <div class=inputspagarclientetextoedit><p> Cliente:</p></div>
      </div> 
      </div>
      </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>

</html>