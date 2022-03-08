<?php 
 session_start();
include_once("config.php");

$subgrupo = filter_input(INPUT_POST,'novosubgrupo', FILTER_SANITIZE_STRING);
// echo "Grupo: $grupo <br>"; 
$result_subgrupo = "INSERT INTO subgrupo(nome) VALUES ('$subgrupo')";
$resultado_subgrupo = mysqli_query($conexao ,$result_subgrupo);

if(mysqli_insert_id($conexao)){
    $_SESSION['msg'] = 'Subgrupo cadastrado com sucesso';
	header("Location: grupos.php");

}else{


}

?>
