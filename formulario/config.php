<?php
    $dbhost = 'localhost';
    $dbUserName = 'root';
    $dbPassword = '';
    $dbName = 'gerenciamento_atendimento';

    $conexao = new mysqli($dbhost,$dbUserName, $dbPassword, $dbName);

        //Testar Conexao na Pagina

    //if($conexao -> connect_errno){
   //     echo "Erro";
    //}else{
    //    echo "Banco Conectado com Sucesso!";
   // }

?>