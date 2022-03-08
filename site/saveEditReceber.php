<?php 
    include_once('config.php');
    
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $data = $_POST['datareceber'];
        $grupo = $_POST['gruporeceber'];
        $subgrupo = $_POST['subgruporeceber'];
        $vencimento = $_POST['vencimentoreceber'];
        $historico = $_POST['historicoreceber'];
        $historicolongo = $_POST['historicolongoreceber'];
        $valor = $_POST['valorreceber'];
        $numparcelas = $_POST['numparcelasreceber'];
        $valorparcela = $_POST['valorparcelareceber'];

        $sqlUpdate = "UPDATE contasreceber SET lancamento='$data', grupo='$grupo', subgrupo='$subgrupo', vencimento='$vencimento', historico='$historico',historicolongo='$historicolongo', valor='$valor', valorparcela='$valorparcela', numparcelas='$numparcelas'
        WHERE idreceber='$id'";

        $result = $conexao->query($sqlUpdate);
        print_r($historico);
    }

  header('Location: contasareceber.php');
    
?> 