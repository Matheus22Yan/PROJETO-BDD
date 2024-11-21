<h1>Listar Consulta</h1>
<?php
// Habilitar exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Consultar dados de consultas
$sql = "SELECT * FROM consulta AS c
        INNER JOIN paciente AS p ON p.id_paciente = c.paciente_id_paciente
        INNER JOIN medico AS m ON m.id_medico = c.medico_id_medico";

$res = $conn->query($sql);

$qtd = $res->num_rows;

if ($qtd > 0) {
    echo "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    echo "<table class='table table-bordered table-striped table-hover'>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Médico</th>";
    echo "<th>Paciente</th>";
    echo "<th>Data</th>";
    echo "<th>Hora</th>";
    echo "<th>Descrição</th>";
    echo "<th>Ações</th>";
    echo "</tr>";
    $count = 1;
    while ($row = $res->fetch_object()) {
        echo "<tr>";
        echo "<td>" . $count++ . "</td>";
        echo "<td>" . $row->nome_medico . "</td>";
        echo "<td>" . $row->nome_paciente . "</td>";
        echo "<td>" . $row->data_consulta . "</td>";
        echo "<td>" . $row->hora_consulta . "</td>";
        echo "<td>" . $row->descricao_consulta . "</td>";
        echo "<td>
            <button class='btn btn-success' onclick=\"location.href='?page=editar-consulta&id_consulta=" . $row->id_consulta . "';\">Editar</button>
            <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-consulta&acao=excluir&id_consulta=" . $row->id_consulta . "';}else{false;}\">Excluir</button>
            <a href='gerar_pdf.php?id_consulta=" . $row->id_consulta . "' class='btn btn-primary'>Gerar PDF</a>
        </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Não encontrou resultado</p>";
}
?>
