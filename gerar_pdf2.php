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
if (isset($_GET['id_medico'])) {
    $id_medico= intval($_GET['id_medico']); // Sanitizar o ID

    // Buscar os dados da consulta no banco
    $sql = "SELECT * FROM medico WHERE id_medico = ?";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Erro ao preparar a consulta: " . $conn->error);
    }
    $stmt->bind_param("i", $id_medico);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows == 0) {
        die("Erro: Consulta não encontrada.");
    }

    $row = $res->fetch_object();

    // Iniciar o DomPDF
    $dompdf = new Dompdf();

    // HTML para o PDF
    $html = '<h1>Dados do Médico</h1>';
    $html .= '<p><strong>nome do medico:</strong> ' . htmlspecialchars($row->nome_medico) . '</p>';
    $html .= '<p><strong>crm:</strong> ' . htmlspecialchars($row->crm_medico) . '</p>';
    $html .= '<p><strong>especialidade:</strong> ' . htmlspecialchars($row->especialidade_medico) . '</p>';
 

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
    header('Content-Disposition: inline; filename="consulta_' . $id_medico . '.pdf"');
    echo $dompdf->output(); // Envia o conteúdo do PDF
    exit;
} else {
    die("Erro: ID da consulta não informado.");
}
?>
