<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 8 - Financiamento da Moto do Paulinho</title>
    <style>
        .container { max-width: 700px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="number"] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #17a2b8; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #138496; }
        .resultado { margin-top: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 5px; }
        .info-box { background-color: #e9ecef; padding: 15px; border-radius: 5px; margin: 15px 0; }
        .opcao-parcela { margin-bottom: 15px; padding: 15px; background-color: white; border-radius: 5px; border-left: 4px solid #17a2b8; }
        .juros { color: #dc3545; font-weight: bold; }
        .destaque { font-size: 1.1em; font-weight: bold; margin: 10px 0; }
        .tabela-parcelas { width: 100%; border-collapse: collapse; margin: 15px 0; }
        .tabela-parcelas th, .tabela-parcelas td { padding: 10px; text-align: center; border: 1px solid #ddd; }
        .tabela-parcelas th { background-color: #f8f9fa; font-weight: bold; }
        .tabela-parcelas tr:nth-child(even) { background-color: #f8f9fa; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercício 8 - Financiamento da Moto do Paulinho</h1>
        
        <div class="info-box">
            <p><strong>Valor da moto à vista:</strong> R$ 8.654,00</p>
            <p><strong>Sistema de juros:</strong> Juros Simples</p>
            <p><strong>Taxa base:</strong> 1,5% para 24 parcelas</p>
            <p><strong>Incremento:</strong> +0,5% a cada nível de parcelas</p>
        </div>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="valor_vista">Valor à vista da moto (R$):</label>
                <input type="number" id="valor_vista" name="valor_vista" step="0.01" min="0" value="8654.00" required>
            </div>
            
            <div class="form-group">
                <label for="taxa_base">Taxa de juros base (%):</label>
                <input type="number" id="taxa_base" name="taxa_base" step="0.1" min="0" value="1.5" required>
            </div>
            
            <div class="form-group">
                <label for="incremento">Incremento da taxa (%):</label>
                <input type="number" id="incremento" name="incremento" step="0.1" min="0" value="0.5" required>
            </div>
            
            <button type="submit">Calcular Parcelas</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Capturar valores do formulário
            $valor_vista = floatval($_POST['valor_vista']);
            $taxa_base = floatval($_POST['taxa_base']);
            $incremento = floatval($_POST['incremento']);
            
            // Opções de parcelamento
            $opcoes_parcelas = [24, 36, 48, 60];
            
            // Exibir o resultado
            echo "<div class='resultado'>";
            echo "<h3>Opções de Parcelamento:</h3>";
            echo "<p><strong>Valor à vista:</strong> R$ " . number_format($valor_vista, 2, ',', '.') . "</p>";
            
            echo "<table class='tabela-parcelas'>";
            echo "<tr>
                    <th>Parcelas</th>
                    <th>Taxa de Juros</th>
                    <th>Valor dos Juros</th>
                    <th>Valor Total</th>
                    <th>Valor da Parcela</th>
                  </tr>";
            
            foreach ($opcoes_parcelas as $index => $parcelas) {
                // Calcular taxa de juros para esta opção
                $taxa_juros = $taxa_base + ($index * $incremento);
                
                // Calcular juros simples: J = C × i × t
                $juros = $valor_vista * ($taxa_juros / 100) * ($parcelas / 12);
                
                // Calcular valor total
                $valor_total = $valor_vista + $juros;
                
                // Calcular valor da parcela
                $valor_parcela = $valor_total / $parcelas;
                
                echo "<tr>";
                echo "<td>" . $parcelas . "x</td>";
                echo "<td>" . number_format($taxa_juros, 1, ',', '.') . "%</td>";
                echo "<td class='juros'>R$ " . number_format($juros, 2, ',', '.') . "</td>";
                echo "<td>R$ " . number_format($valor_total, 2, ',', '.') . "</td>";
                echo "<td><strong>R$ " . number_format($valor_parcela, 2, ',', '.') . "</strong></td>";
                echo "</tr>";
            }
            
            echo "</table>";
            
            // Detalhamento de cada opção
            echo "<h4>Detalhamento das Opções:</h4>";
            
            foreach ($opcoes_parcelas as $index => $parcelas) {
                $taxa_juros = $taxa_base + ($index * $incremento);
                $juros = $valor_vista * ($taxa_juros / 100) * ($parcelas / 12);
                $valor_total = $valor_vista + $juros;
                $valor_parcela = $valor_total / $parcelas;
                
                echo "<div class='opcao-parcela'>";
                echo "<div class='destaque'>" . $parcelas . " parcelas de R$ " . number_format($valor_parcela, 2, ',', '.') . "</div>";
                echo "<p><strong>Taxa de juros:</strong> " . number_format($taxa_juros, 1, ',', '.') . "% ao mês</p>";
                echo "<p><strong>Valor dos juros:</strong> R$ " . number_format($juros, 2, ',', '.') . "</p>";
                echo "<p><strong>Valor total financiado:</strong> R$ " . number_format($valor_total, 2, ',', '.') . "</p>";
                echo "<p><strong>Cálculo dos juros:</strong> R$ " . number_format($valor_vista, 2, ',', '.') . " × " . number_format($taxa_juros, 1, ',', '.') . "% × " . $parcelas . " meses ÷ 12 = R$ " . number_format($juros, 2, ',', '.') . "</p>";
                echo "</div>";
            }
            
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>