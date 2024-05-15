<?php
if (isset($_GET['file'])) {
    $file = $_GET['file'];

    if (file_exists($file)) {
        // Definir cabeçalhos para forçar o download do arquivo
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));

        // Ler e enviar o arquivo para o cliente
        readfile($file);
        exit;
    } else {
        // Se o arquivo não existir, exibir mensagem de erro
        echo '<p>O arquivo não está disponível para download.</p>';
    }
} else {
    // Se o parâmetro do arquivo não estiver presente na URL, exibir mensagem de erro
    echo '<p>O arquivo não está disponível para download.</p>';
}
?>
