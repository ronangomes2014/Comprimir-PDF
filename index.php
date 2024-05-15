<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprimir PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        h2 {
            color: #333;
        }
        input[type="file"] {
            margin-top: 20px;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        p {
            margin-top: 20px;
            color: #333;
        }
        footer {
            margin-top: 20px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo -->
        <img src="logo.png" alt="Logo" width="100">
        <h2>Comprimir PDF</h2>

        <!-- Lógica para comprimir PDF -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
                $input_file = $_FILES['file']['tmp_name'];
                $output_file = 'compressed.pdf';
                
                // Comprimir o PDF
                $cmd = "gs -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/screen -dNOPAUSE -dQUIET -dBATCH -sOutputFile=$output_file $input_file";
                exec($cmd, $output, $return_var);

                if ($return_var === 0) {
                    echo '<p>Arquivo comprimido com sucesso!</p>';
                    echo '<br><a href="download.php?file=' . $output_file . '" download>Download do Arquivo Comprimido</a>';
                } else {
                    echo '<p>Erro ao comprimir o arquivo PDF.</p>';
                }
            } else {
                echo '<p>Por favor, selecione um arquivo PDF para comprimir.</p>';
            }
        }
        ?>

        <!-- Formulário -->
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="file" accept=".pdf"><br>
            <input type="submit" value="Comprimir PDF">
        </form>

        <!-- Frase de rodapé -->
        <footer>Desenvolvido por Ronan Gomes - Deltech Solutions</footer>
    </div>
</body>
</html>
