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

// Consulta SQL
$sql = "SELECT id, nome_cliente, cidade_municipio, sistema_usado, telefone, sexo, data_nascimento FROM gerenciamento_atendimento";
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
    echo "Nenhum registro encontrado.";
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>