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
if (isset($_GET['id_paciente'])) {
    $id_paciente= intval($_GET['id_paciente']); // Sanitizar o ID

    // Buscar os dados da consulta no banco
    $sql = "SELECT * FROM paciente WHERE id_paciente = ?";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Erro ao preparar a consulta: " . $conn->error);
    }
    $stmt->bind_param("i", $id_paciente);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows == 0) {
        die("Erro: Consulta não encontrada.");
    }

    $row = $res->fetch_object();
    if ($row->sexo_paciente == "m") {
        $sexo = "Masculino";
    } else {
        $sexo = "Feminino";
    }

    // Iniciar o DomPDF
    $dompdf = new Dompdf();

    // HTML para o PDF

    $html = '<h1>Dados do Paciente</h1>';
    $html .= '<p><strong>nome do paciente:</strong> ' . htmlspecialchars($row->nome_paciente) . '</p>';
    $html .= '<p><strong>CPF:</strong> ' . htmlspecialchars($row->cpf_paciente) . '</p>';
    $html .= '<p><strong>E-mail:</strong> ' . htmlspecialchars($row->email_paciente) . '</p>';
    $html .= '<p><strong>Fone:</strong> ' . htmlspecialchars($row->fone_paciente) . '</p>';
    $html .= '<p><strong>Endereço:</strong> ' . htmlspecialchars($row->endereco_paciente) . '</p>';
    $html .= '<p><strong>Data de Nascimento:</strong> ' . htmlspecialchars($row->data_nasc_paciente) . '</p>';
    $html .= '<p><strong>Sexo:</strong> ' . htmlspecialchars($sexo) . '</p>';
 

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
    header('Content-Disposition: inline; filename="consulta_' . $id_paciente . '.pdf"');
    echo $dompdf->output(); // Envia o conteúdo do PDF
    exit;
} else {
    die("Erro: ID da consulta não informado.");
}
?>
