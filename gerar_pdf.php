<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('config.php');

require_once 'dompdf/autoload.inc.php'; // Caminho do DomPDF
use Dompdf\Dompdf;

// Verifique se a conexão com o banco está ativa
if (!isset($conn)) {
    die("Erro: Conexão com o banco de dados não encontrada.");
}

// Verificar se o ID foi enviado
if (isset($_GET['id_consulta'])) {
    $id_consulta = intval($_GET['id_consulta']); // Sanitizar o ID

    // Buscar os dados da consulta no banco
    $sql = "SELECT * FROM consulta AS c
            INNER JOIN paciente AS p ON p.id_paciente = c.paciente_id_paciente
            INNER JOIN medico AS m ON m.id_medico = c.medico_id_medico
            WHERE c.id_consulta = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Erro ao preparar a consulta: " . $conn->error);
    }
    $stmt->bind_param("i", $id_consulta);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows == 0) {
        die("Erro: Consulta não encontrada.");
    }

    $row = $res->fetch_object();

    // Iniciar o DomPDF
    $dompdf = new Dompdf();

    // HTML para o PDF
    $html = '<h1>Detalhes da Consulta</h1>';
    $html .= '<p><strong>Médico:</strong> ' . htmlspecialchars($row->nome_medico) . '</p>';
    $html .= '<p><strong>Paciente:</strong> ' . htmlspecialchars($row->nome_paciente) . '</p>';
    $html .= '<p><strong>Data:</strong> ' . htmlspecialchars($row->data_consulta) . '</p>';
    $html .= '<p><strong>Hora:</strong> ' . htmlspecialchars($row->hora_consulta) . '</p>';
    $html .= '<p><strong>Descrição:</strong> ' . htmlspecialchars($row->descricao_consulta) . '</p>';

    // Carregar HTML no DomPDF
    $dompdf->loadHtml($html);

    // Configurar o papel e a orientação
    $dompdf->setPaper('A4', 'portrait');

    // Renderizar o PDF
    $dompdf->render();

    // Limpar buffers antes de enviar o PDF
    if (ob_get_length()) {
        ob_end_clean(); // Evita erros ao enviar o PDF
    }

    // Enviar o PDF ao navegador
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="consulta_' . $id_consulta . '.pdf"');
    echo $dompdf->output(); // Envia o conteúdo do PDF
    exit;
} else {
    die("Erro: ID da consulta não informado.");
}
?>
