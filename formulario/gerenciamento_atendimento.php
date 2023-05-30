<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="main.css">
    <title>Resultados</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 5px;
            border-color:aqua;
        }
    </style>
</head>
<body class="body-result">
    <div class="div-result">
        <fieldset>
        <form method="GET" action="">
        <legend class="legend-gerencia"><b>Relatorio de Atendimento</b></legend>
                <br>
                <br>
            <div class="div-gerencia">
                <label for="data">Selecione data Atendimento (Dia-Mes-Ano):</label>
                <input type="date" id="data_nasc" name="data">
                <button type="submit" id="submit-gerencia">Pesquisar</button>
                <button type="button" class="btn-voltar">
                    <a href="index.php" class="btn-voltar-link"><b>Voltar</b></a>
                </button>
            </div>
        </form>
        <br>

        <?php
        // Configurações do banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gerenciamento_atendimento";

        // Conexão com o banco de dados
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Verifica se a conexão foi estabelecida corretamente
        if (!$conn) {
            die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
        }

        // Verifica se foi enviada uma data pelo formulário
        if (isset($_GET['data'])) {
            $data = $_GET['data'];

            // Consulta SQL com filtro de data
            $sql = "SELECT id, nome_cliente, cidade_municipio, sistema_usado, telefone, sexo, data_nascimento FROM formulario WHERE data_nascimento = '$data'";
            $result = mysqli_query($conn, $sql);

            // Verifica se a consulta retornou resultados
            if (mysqli_num_rows($result) > 0) {
                // Exibe os resultados em uma tabela HTML
                echo "<table>";
                echo "<tr>
                        <th>ID</th>
                        <th>Nome do Cliente</th>
                        <th>Cidade/Município</th>
                        <th>Sistema Usado</th>
                        <th>Telefone</th>
                        <th>Sexo</th>
                        <th>Data de Nascimento</th>
                      </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nome_cliente"] . "</td>";
                    echo "<td>" . $row["cidade_municipio"] . "</td>";
                    echo "<td>" . $row["sistema_usado"] . "</td>";
                    echo "<td>" . $row["telefone"] . "</td>";
                    echo "<td>" . $row["sexo"] . "</td>";
                    echo "<td>" . $row["data_nascimento"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Nenhum registro encontrado para a data especificada.";
            }
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($conn);
        ?>
        </fieldset>
        <label for="" class="credit-gerencia">®Copyright Lucas Matheus - Amendola e Amendola LTDA</label>
    </div>
</body>
</html>
