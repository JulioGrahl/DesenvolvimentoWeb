<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 10 - Árvore de Pastas</title>
    <style>
        .container { max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        .arvore { font-family: 'Courier New', monospace; margin: 20px 0; }
        .pasta { margin-left: 20px; }
        .pasta-nome { font-weight: bold; color: #2c3e50; }
        .item-pasta { margin-left: 20px; color: #7f8c8d; }
        .nivel-0 { margin-left: 0; }
        .nivel-1 { margin-left: 20px; }
        .nivel-2 { margin-left: 40px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercício 10 - Árvore de Pastas</h1>
        
        <h3>Array de entrada:</h3>
        <pre><?php
        $pastas = array(
            "bsn" => array(
                "3a Fase" => array("desenvWeb", "bancoDados 1", "engSoft 1"),
                "4a Fase" => array("Intro Web", "bancoDados 2", "engSoft 2")
            )
        );
        print_r($pastas);
        ?></pre>

        <h3>Árvore de Pastas Gerada:</h3>
        <div class="arvore">
            <?php
            // Função recursiva para exibir a árvore de pastas
            function exibirArvore($array, $nivel = 0) {
                foreach ($array as $chave => $valor) {
                    // Determinar a classe CSS baseada no nível
                    $classeNivel = "nivel-" . $nivel;
                    
                    // Se o valor for um array, é uma pasta com subitens
                    if (is_array($valor)) {
                        echo "<div class='pasta $classeNivel'>";
                        echo "<div class='pasta-nome'>" . str_repeat("-- ", $nivel) . $chave . "</div>";
                        // Chamada recursiva para exibir os subitens
                        exibirArvore($valor, $nivel + 1);
                        echo "</div>";
                    } else {
                        // É um item simples
                        echo "<div class='item-pasta $classeNivel'>" . str_repeat("-- ", $nivel) . $valor . "</div>";
                    }
                }
            }

            // Chamar a função para exibir a árvore
            exibirArvore($pastas);
            ?>
        </div>

        <h3>Árvore no formato texto (como no exemplo):</h3>
        <div class="arvore" style="background-color: #f8f9fa; padding: 15px; border-radius: 5px;">
            <pre><?php
            // Função alternativa para exibir no formato exato do exercício
            function exibirArvoreFormatada($array, $prefixo = "") {
                foreach ($array as $chave => $valor) {
                    if (is_array($valor)) {
                        echo $prefixo . "- " . $chave . "\n";
                        exibirArvoreFormatada($valor, $prefixo . "    ");
                    } else {
                        echo $prefixo . "-- " . $valor . "\n";
                    }
                }
            }
            
            exibirArvoreFormatada($pastas);
            ?></pre>
        </div>
    </div>
</body>
</html>