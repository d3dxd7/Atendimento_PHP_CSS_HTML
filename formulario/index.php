<?php 
//Se Existir essa Variavel [submit] = faca
    if(isset($_POST['submit']))
    {
        print_r('nome '.$_POST['nome']);
        print_r('<br>');
        print_r('cidade '.$_POST['cidade']);
        print_r('<br>');
        print_r('sistema-usado '.$_POST['sistema-usado']);
        print_r('<br>');
        print_r('tel-cel '.$_POST['tel-cel']);
        print_r('<br>');
        print_r('sexo '.$_POST['genero']);
        print_r('<br>');
        print_r('data_nasc '.$_POST['data_nasc']);
        print_r('<br>');
        include_once('config.php');

        $nome = $_POST['nome'];
        $cidade = $_POST['cidade'];
        $sistema_usado = $_POST['sistema-usado'];
        $tel_cel = $_POST['tel-cel'];
        $genero = $_POST['genero'];
        $data_nasc = $_POST['data_nasc'];

        //INSERT INTO formulario(nome_cliente, cidade_municipio, sistema_usado, telefone,
        //sexo, data_nascimento)VALUES ('lucas matheus','sales-sp','sis-sistema saude','17 - 9999-9999','Masculino','1998-04-17')

        //$resultado = mysqli_query($conexao, "INSERT INTO formulario(nome_cliente, cidade_municipio, sistema_usado, telefone,
        //sexo, data_nascimento)VALUES ($nome, $cidade, $sistema_usado, $tel_cel, $genero, $data_nasc)");
        
        // Preparar a consulta com prepared statements
        $consulta = $conexao->prepare("INSERT INTO formulario(nome_cliente, cidade_municipio, sistema_usado, telefone, sexo, data_nascimento) VALUES (?, ?, ?, ?, ?, ?)");
        // Vincular os parâmetros da consulta
        $consulta->bind_param("ssssss", $nome, $cidade, $sistema_usado, $tel_cel, $genero, $data_nasc);
        // Executar a consulta
        $resultado = $consulta->execute();
    
        if ($resultado) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir os dados: " . $conexao->error;
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <title>Gerenciamento Atendimento</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="box">
        <form action="index.php" method="POST">
            <fieldset>
                <legend><b>Formulario de Atendimento</b></legend>
                <br>
                <label for="" class="sistema">SIS - SAS - SIE - SSE</label>
                <br><br>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="input-user" required>
                    <label class="labelInput" for="nome">Nome Cliente</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="nome" class="input-user" required>
                    <label for="nome" class="labelInput">Cidade(Municipio)</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="sistema-usado" id="nome" class="input-user" required>
                    <label for="nome" class="labelInput">Sistema usado pelo cliente</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="tel-cel" id="nome" class="input-user" required>
                    <label for="nome" class="labelInput">Telefone/Celular</label>
                </div>
                <br>
                <p class="">Sexo:
                <br>
                <br>
                <input type="radio" name="genero" id="genero" value="Feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" name="genero" id="genero" value="Masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" name="genero" id="genero" value="outro" required>
                <label for="outro">Outro</label>
                </p>
                <hr>
                <br>
                <label for="data_nasc" id="data"><b>Data do Atendimento</b></label>
                <input type="date" name="data_nasc" id="data_nasc" required>
                <br><br>
                <input type="submit" name="submit" id="submit">
                <br><br>
                <button id="submit" href="">
                    <a href="gerenciamento_atendimento.php" id="submit-gerenciamento">Consultar Clientes</a>
                </button>
            </fieldset>
            <label for="" class="credit">®Copyright Lucas Matheus - Amendola e Amendola LTDA</label>
        </form>
    </div>
    
</body>
</html>