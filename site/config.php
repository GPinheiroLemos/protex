<?php

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'protexbanco';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
/*
    if($conexao->connect_errno)
    {
       echo "Erro";
    }
else
    {
        echo "Conexao Efetuada Com Sucesso";
    }
*/
?>