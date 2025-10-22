<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 7 - Financiamento da Mariazinha</title>
    <style>
        .container { max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="number"] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #dc3545; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #c82333; }
        .resultado { margin-top: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 5px; }
        .info-box { background-color: #e9ecef; padding: 15px; border-radius: 5px; margin: 15px 0; }
        .valor-item { margin-bottom: 10px; padding: 10px; background-color: white; border-radius: 4px; }
        .juros { color: #dc3545; font-weight: bold; }
        .destaque { font-size: 1.2em; font-weight: bold; margin: 15px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercício 7 - Financiamento da Mariazinha</h1>
        
        <div class="info-box">
            <p><strong>Valor do carro à vista:</strong> R$ 22.500,00</p>
            <p><strong>Condição do financiamento:</strong> 60 parcelas de R$ 489,65</p>
        </div>
        
        <form method="POST" action="">
            <p>Você pode usar os valores padrão ou modificar conforme necessário:</p>
            
            <div class="form-group">
                <label for="valor_vista">Valor à vista do carro (R$):</label>
                <input type="number" id="valor_vista" name="valor_vista" step="0.01" min="0" value="22500.00" required>
            </div>
            
            <div class="form-group">
                <label for="valor_parcela">Valor de cada parcela (R$):</label>
                <input type="number" id="valor_parcela" name="valor_parcela" step="0.01" min="0" value="489.65" required>
            </div>
            
            <div class="form-group">
                <label for="numero_parcelas">Número de parcelas:</label>
                <input type="number" id="numero_parcelas" name="numero_parcelas" min="1" value="60" required>
            </div>
            
            <button type="submit">Calcular Juros</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Capturar valores do formulário
            $valor_vista = floatval($_POST['valor_vista']);
            $valor_parcela = floatval($_POST['valor_parcela']);
            $numero_parcelas = intval($_POST['numero_parcelas']);
            
            // Calcular o valor total financiado
            $valor_total_financiado = $valor_parcela * $numero_parcelas;
            
            // Calcular o valor dos juros (diferença entre o total financiado e o valor à vista)
            $valor_juros = $valor_total_financiado - $valor_vista;
            
            // Calcular percentual de juros
            $percentual_juros = ($valor_juros / $valor_vista) * 100;
            
            // Exibir o resultado
            echo "<div class='resultado'>";
            echo "<h3>Resultado do Financiamento:</h3>";
            
            echo "<div class='valor-item'>";
            echo "<strong>Valor do carro à vista:</strong> R$ " . number_format($valor_vista, 2, ',', '.');
            echo "</div>";
            
            echo "<div class='valor-item'>";
            echo "<strong>Valor total financiado (" . $numero_parcelas . " parcelas):</strong> R$ " . number_format($valor_total_financiado, 2, ',', '.');
            echo "</div>";
            
            echo "<div class='valor-item juros'>";
            echo "<strong>Valor gasto somente com juros:</strong> R$ " . number_format($valor_juros, 2, ',', '.');
            echo "</div>";
            
            echo "<div class='destaque juros'>";
            echo "Mariazinha pagará R$ " . number_format($valor_juros, 2, ',', '.') . " só em juros!";
            echo "</div>";
            
            echo "<div class='valor-item'>";
            echo "<strong>Percentual de juros em relação ao valor à vista:</strong> " . number_format($percentual_juros, 2, ',', '.') . "%";
            echo "</div>";
            
            echo "<div class='valor-item'>";
            echo "<strong>Detalhamento:</strong>";
            echo "<br>Valor à vista: R$ " . number_format($valor_vista, 2, ',', '.');
            echo "<br>Valor total financiado: R$ " . number_format($valor_total_financiado, 2, ',', '.');
            echo "<br>Juros = R$ " . number_format($valor_total_financiado, 2, ',', '.') . " - R$ " . number_format($valor_vista, 2, ',', '.') . " = R$ " . number_format($valor_juros, 2, ',', '.');
            echo "</div>";
            
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>