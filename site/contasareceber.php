<?php
    session_start();
    //print_r($_SESSION);
    if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true )){
        unset( $_SESSION['login']);
        unset( $_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['login'];

  include_once('config.php');
  if(isset($_POST['submit'])){

    $data = $_POST['datareceber'];
    $grupo = $_POST['gruporeceber'];
    $subgrupo = $_POST['subgruporeceber'];
    $vencimento = $_POST['vencimentoreceber'];
    $historico = $_POST['historicoreceber'];
    $historicolongo = $_POST['historicolongoreceber'];
    $valor = $_POST['valorreceber'];
    $numparcelas = $_POST['numparcelasreceber'];
    $cliente = $_POST['clientereceber'];
    if ($numparcelas > 0 ){
      $valorparcela = $valor / $numparcelas;
    }else{
      header('Location: contasareceber.php');
    }

    $result = mysqli_query($conexao, "INSERT INTO contasreceber(lancamento,grupo,subgrupo,vencimento,historico,historicolongo,valor,numparcelas,valorparcela,cliente)
    VALUES ('$data','$grupo','$subgrupo','$vencimento','$historico','$historicolongo','$valor','$numparcelas','$valorparcela','$cliente')");


/*
    print_r(mysqli_error($conexao));
    die;
*/
 }
 $sql = "SELECT * FROM contasreceber ORDER BY lancamento DESC";

 $requisicao = $conexao->query($sql);
/*
 print_r($requisicao);
*/
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
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

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
      <form action="contasareceber.php" method="POST">
        <div class=lancamentotitulopagar><p><b>Novo Lançamento - Contas a Receber</b></p></div>
          <div class=inputspagardata>
            <input type="date" name="datareceber" id="datareceber" class="dataegrupos" required>
          </div>
          <div class=inputspagargrupo>   
                <select class="grupo-input" name="gruporeceber" id="gruporeceber" class="dataegrupos" required>
                  <option>Selecione</option>
                  <?php
                $result_grupos = "SELECT * FROM grupo";
                $resultado_grupos = mysqli_query($conexao, $result_grupos);
                while($row_grupos = mysqli_fetch_assoc($resultado_grupos)){ ?>

                <option value="<?php echo $row_grupos['id_grupo']; ?>"><?php echo $row_grupos['nome']; ?>
                  </option> <?php 
                  }
                ?>
              </select>
          </div>
          <div class=inputspagarsubgrupo>   
            <select class="grupo-input" name="subgruporeceber" id="subgruporeceber" class="dataegrupos" required>
            <option>Selecione</option>
            <?php
                $result_subgrupos = "SELECT * FROM subgrupo";
                $resultado_subgrupos = mysqli_query($conexao, $result_subgrupos);
                while($row_subgrupos = mysqli_fetch_assoc($resultado_subgrupos)){ ?>

                <option value="<?php echo $row_subgrupos['id_subgrupo']; ?>"><?php echo $row_subgrupos['nome']; ?>
                  </option> <?php 
                  }
             ?>
            </select>
        </div>
        <div class=inputspagardatavencimento>
            <input type="date" name="vencimentoreceber" id="vencimentoreceber" class="dataegrupos" required>
          </div>
          <div class=inputspagarhistorico>
              <input type="text" name="historicoreceber" id="historicoreceber" class="text-input" required>
          </div>
          <div class=inputspagarhistoricolongo>
            <input type="text" name="historicolongoreceber" id="historicolongoreceber" class="historicolongo" required>
        </div>
        <div class=inputspagarvalor>
          <input type="number" name="valorreceber" id="valorreceber" class="dataegrupos" required>
        </div>
        <div class=parcelamentotitulopagar><b><p>Parcelamento</p></b></div>
        <div class=inputspagarnumparcelas>
          <input type="number" name="numparcelasreceber" id="numparcelasreceber" class="numparcelas" required>
        </div>
        <div class=inputsclienterecebergeral>
        <input type="text" name="clientereceber" id="clientereceber"class="dataegrupos" required>
        </div>
        <div class= clientetitulopagargeral>
          <b><p>Cliente</p></b>
        </div>
        <div class=botaopagargeral>
          <button type="submit" name="submit" id="submit" class="btn btn-success">Gravar</button>
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
        <div class=inputspagarclientetextogeral><p> Cliente:</p></div>
      </div>
      <div class=pagargerenciarlancamentos>
        <div class="pagartitulogerenciar testefundoform"><b><p>Gerenciar Lançamentos</p></b></div>
        <div class=lancamentosbox>
        <div class="lancamentosdobanco">
        <table id="tabela_receber" class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Lançamento</th>
                  <th scope="col">Grupo</th>
                  <th scope="col">Subgrupo</th>
                  <th scope="col">Vencimento</th>
                  <th scope="col">Histórico</th>
                  <th scope="col">Hitórico Longo</th>
                  <th scope="col">Valor</th>
                  <th scope="col">Num. Parcelas</th>
                  <th scope="col">Valor Parcela</th>
                  <th scope="col">Cliente</th>
                  <th scope="col">...</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while ($user_data = mysqli_fetch_assoc($requisicao))
                  {
                    echo "<tr>";
                    echo "<td>".$user_data['idreceber']."</td>";
                    echo "<td>".$user_data['lancamento']."</td>";
                    echo "<td>".$user_data['grupo']."</td>";
                    echo "<td>".$user_data['subgrupo']."</td>";
                    echo "<td>".$user_data['vencimento']."</td>";
                    echo "<td>".$user_data['historico']."</td>";
                    echo "<td>".$user_data['historicolongo']."</td>";
                    echo "<td>".$user_data['valor']."</td>";
                    echo "<td>".$user_data['numparcelas']."</td>";
                    echo "<td>".$user_data['valorparcela']."</td>";
                    echo "<td>".$user_data['cliente']."</td>";
                    echo "<td>
                      <a class='btn btn-sm btn-primary botaoeditar' href='editreceber.php?id=$user_data[idreceber]'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                          <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                      </svg>
                      <a class='btn btn-sm btn-danger botaoexcluir' href='deletereceber.php?id=$user_data[idreceber]'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                        <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                      </svg>
                      </a>
                    </td>";
                    echo "<tr>";
                  }
                ?>
              </tbody>
          </table>
        </div>
        </div>
      </div>
      </div>
      </div>
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>             
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>           
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
<script>
$(document).ready( function () {
    $('#tabela_receber').DataTable(
      {             destroy: true,             dom: 'Bfrtip',             searching: false,             paging: true,
      
      }
    );
} );
</script>