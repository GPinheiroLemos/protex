<?php

    if(!empty($_GET['id']))
    {
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT *  FROM contasreceber WHERE idreceber=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM contasreceber WHERE idreceber=$id";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: contasareceber.php');
   
?>