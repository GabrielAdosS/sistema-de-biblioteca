<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alexandria</title>
    <link rel="shortcut icon" href="../imagens/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    <style>
        #tabelas {
            display: flex;
            flex-direction: column;
            gap: 105px;
            justify-content: center;
            align-items: center;
            padding: 30px 60px;
            background-color: #f2f2f2;
            font-family: "EB Garamond", serif;
        }
        #tabelas #tabela-livros table {
        border-collapse: collapse;
        border: solid 1px black;
        background-color: white;
        width: 1000px;
        }   
        #tabelas #tabela-livros table th,
        #tabelas #tabela-livros table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        }
        #tabelas #algueis table {
            border-collapse: collapse;
        border: solid 1px black;
        background-color: white;
        width: 1000px;
        }   
        #tabelas #algueis table th,
        #tabelas #algueis table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        }
        #tabelas #tabela-livros table th,
        #tabelas #algueis table th {
            color: #e84a5f;
        }
    </style>
</head>
<body>
    <?php
    
        include '../backend/conexao.php';

        include '../backend/livro.php';
        include '../backend/livrodao.php';

        include '../backend/alugar.php';
        include '../backend/alugardao.php';

        $codAluguel = filter_input(INPUT_POST, 'codAluguel');
        $codlivro = filter_input(INPUT_POST, 'codLivro');
        $quantLivro = filter_input(INPUT_POST, 'quantLivro');
        $acao = filter_input(INPUT_POST, 'acao');

        $alugar = new alugar();
        $alugardao = new alugardao();
        
        $alugar->setId_alugar($codAluguel);
        $alugar->setId_livro($codlivro);
        $alugar->setqdt($quantLivro);

        if($acao == 'Alugar') {
            $alugardao->cadastrarAluguel($alugar);
        } elseif ($acao == 'Apagar') {
            $alugardao->apagarAluguel($alugar);
        }
        
        ?>
    <div id="header">
        <div id="logo_e_titulo">
            <img src="../imagens/logo.png" alt="logo alexandria" id="logo">
            <h1 id="titulo">Alexandria</h1>
        </div>
        <div id="nav">
            <div class="botao"><a href="../index.php">Ínicio</a></div>
        </div>
    </div>
    <div id="banner">
        <img src="../imagens/banner.png" alt="bannner fundo">
        <div id="ApagarAluguel">
            <form action="./alugar.php" method="post">
                <label>Apagar aluguel</label>
                <input type="number" placeholder="Informe o código do aluguel..." class="cod" name="codAluguel">
                <input type="submit" value="Apagar" class="botao" name="acao"> 
            </form>
        </div>
        <div id="alugar">
            <form action="./alugar.php" method="post">
                <label>Alugar</label>
                <input type="number" placeholder="Informe o código do livro..." name="codLivro" class="cod">
                <label>Quantidade</label>
                <input type="number" placeholder="Informe a quantidade de livros..." name="quantLivro" class="cod">
                <input type="submit" value="Alugar" class="botao" name="acao">
            </form>
        </div>
    </div>
    <div id="tabelas">
        <div id="tabela-livros">
            <?php
                $consultaLivro = new livrodao();
                $consultaLivro->consultarLivros();
                if($consultaLivro->consultarLivros()) {
                    echo '<table>';
                    echo '<tr><th>Código do livro</th><th>Nome do livro</th><th>Editora</th><th>Autor do livro</th><th>Quantidade de livros</th></tr>';
                    foreach($consultaLivro->consultarLivros() as $tabela) {
                        echo '<tr>';
                        echo '<td>'. $tabela['id'] .'</td>';
                        echo '<td>'. $tabela['nome'] .'</td>';
                        echo '<td>'. $tabela['editora'] .'</td>';
                        echo '<td>'. $tabela['autor'] .'</td>';
                        echo '<td>'. $tabela['qdt'] .'</td';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
                ?>
        </div>
        <div id="algueis">
            <?php
                $alugardao->consultarAluguel();
                if($alugardao->consultarAluguel()) {
                    echo '<table>';
                    echo '<tr><th>Código do aluguel</th><th>Quantidade de livros</th><th>Código do livro</th></tr>';
                    foreach($alugardao->consultarAluguel() as $tabela) {
                        echo '<tr>';
                        echo '<td>'. $tabela['id_alugar'] .'</td>';
                        echo '<td>'. $tabela['qdt'] .'</td>';
                        echo '<td>'. $tabela['id_livro'] .'</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
            ?>
        </div>
    </div>
    <div id="footer">
        <p>Direitos reservados</p>
        <p>Imagens e textos gerados por Copilot e ChatGPT</p>
    </div>
</body>
</html>