<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 9 - Financiamento da Moto do Juquinha (Juros Compostos)</title>
    <style>
        .container { max-width: 800px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="number"] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #218838; }
        .resultado { margin-top: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 5px; }
        .info-box { background-color: #e9ecef; padding: 15px; border-radius: 5px; margin: 15px 0; }
        .opcao-parcela { margin-bottom: 15px; padding: 15px; background-color: white; border-radius: 5px; border-left: 4px solid #28a745; }
        .juros { color: #dc3545; font-weight: bold; }
        .destaque { font-size: 1.1em; font-weight: bold; margin: 10px 0; }
        .tabela-parcelas { width: 100%; border-collapse: collapse; margin: 15px 0; }
        .tabela-parcelas th, .tabela-parcelas td { padding: 10px; text-align: center; border: 1px solid #ddd; }
        .tabela-parcelas th { background-color: #f8f9fa; font-weight: bold; }
        .tabela-parcelas tr:nth-child(even) { background-color: #f8f9fa; }
        .formula { background-color: #d1ecf1; padding: 10px; border-radius: 5px; margin: 10px 0; font-family: monospace; }
        .comparacao { background-color: #fff3cd; padding: 15px; border-radius: 5px; margin: 15px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercício 9 - Financiamento da Moto do Juquinha</h1>
        
        <div class="info-box">
            <p><strong>Valor da moto à vista:</strong> R$ 8.654,00</p>
            <p><strong>Sistema de juros:</strong> Juros Compostos</p>
            <p><strong>Taxa base:</strong> 2,0% para 24 parcelas</p>
            <p><strong>Incremento:</strong> +0,3% a cada nível de parcelas</p>
            <div class="formula">
                <strong>Fórmula dos Juros Compostos:</strong> M = C × (1 + i)<sup>t</sup><br>
                Onde: M = Montante, C = Capital, i = Taxa, t = Tempo
            </div>
        </div>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="valor_vista">Valor à vista da moto (R$):</label>
                <input type="number" id="valor_vista" name="valor_vista" step="0.01" min="0" value="8654.00" required>
            </div>
            
            <div class="form-group">
                <label for="taxa_base">Taxa de juros base (%):</label>
                <input type="number" id="taxa_base" name="taxa_base" step="0.1" min="0" value="2.0" required>
            </div>
            
            <div class="form-group">
                <label for="incremento">Incremento da taxa (%):</label>
                <input type="number" id="incremento" name="incremento" step="0.1" min="0" value="0.3" required>
            </div>
            
            <button type="submit">Calcular Parcelas com Juros Compostos</button>
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
            echo "<h3>Opções de Parcelamento com Juros Compostos:</h3>";
            echo "<p><strong>Valor à vista:</strong> R$ " . number_format($valor_vista, 2, ',', '.') . "</p>";
            
            echo "<table class='tabela-parcelas'>";
            echo "<tr>
                    <th>Parcelas</th>
                    <th>Taxa de Juros</th>
                    <th>Montante Total</th>
                    <th>Valor dos Juros</th>
                    <th>Valor da Parcela</th>
                  </tr>";
            
            foreach ($opcoes_parcelas as $index => $parcelas) {
                // Calcular taxa de juros para esta opção
                $taxa_juros = $taxa_base + ($index * $incremento);
                
                // Converter taxa percentual para decimal
                $taxa_decimal = $taxa_juros / 100;
                
                // Calcular montante usando juros compostos: M = C × (1 + i)^t
                $montante_total = $valor_vista * pow(1 + $taxa_decimal, $parcelas);
                
                // Calcular valor dos juros
                $valor_juros = $montante_total - $valor_vista;
                
                // Calcular valor da parcela
                $valor_parcela = $montante_total / $parcelas;
                
                echo "<tr>";
                echo "<td>" . $parcelas . "x</td>";
                echo "<td>" . number_format($taxa_juros, 1, ',', '.') . "% a.m.</td>";
                echo "<td>R$ " . number_format($montante_total, 2, ',', '.') . "</td>";
                echo "<td class='juros'>R$ " . number_format($valor_juros, 2, ',', '.') . "</td>";
                echo "<td><strong>R$ " . number_format($valor_parcela, 2, ',', '.') . "</strong></td>";
                echo "</tr>";
            }
            
            echo "</table>";
            
            // Detalhamento de cada opção
            echo "<h4>Detalhamento das Opções:</h4>";
            
            foreach ($opcoes_parcelas as $index => $parcelas) {
                $taxa_juros = $taxa_base + ($index * $incremento);
                $taxa_decimal = $taxa_juros / 100;
                $montante_total = $valor_vista * pow(1 + $taxa_decimal, $parcelas);
                $valor_juros = $montante_total - $valor_vista;
                $valor_parcela = $montante_total / $parcelas;
                
                echo "<div class='opcao-parcela'>";
                echo "<div class='destaque'>" . $parcelas . " parcelas de R$ " . number_format($valor_parcela, 2, ',', '.') . "</div>";
                echo "<p><strong>Taxa de juros:</strong> " . number_format($taxa_juros, 1, ',', '.') . "% ao mês</p>";
                echo "<p><strong>Montante total:</strong> R$ " . number_format($montante_total, 2, ',', '.') . "</p>";
                echo "<p><strong>Valor dos juros:</strong> R$ " . number_format($valor_juros, 2, ',', '.') . "</p>";
                echo "<p><strong>Cálculo do montante:</strong> R$ " . number_format($valor_vista, 2, ',', '.') . " × (1 + " . number_format($taxa_decimal, 3, ',', '.') . ")<sup>" . $parcelas . "</sup> = R$ " . number_format($montante_total, 2, ',', '.') . "</p>";
                echo "</div>";
            }
            
            // Comparação com juros simples (do Paulinho)
            echo "<div class='comparacao'>";
            echo "<h4>💡 Comparação: Juros Simples vs Juros Compostos</h4>";
            echo "<p><strong>Para 60 parcelas:</strong></p>";
            
            // Juros simples (Paulinho - exercício anterior)
            $taxa_juros_simples = 3.0; // 1.5% base + 1.5% incremento
            $juros_simples = $valor_vista * ($taxa_juros_simples / 100) * (60 / 12);
            $total_simples = $valor_vista + $juros_simples;
            $parcela_simples = $total_simples / 60;
            
            // Juros compostos (Juquinha)
            $taxa_juros_compostos = 2.9; // 2.0% base + 0.9% incremento
            $taxa_composta_decimal = $taxa_juros_compostos / 100;
            $total_compostos = $valor_vista * pow(1 + $taxa_composta_decimal, 60);
            $juros_compostos = $total_compostos - $valor_vista;
            $parcela_compostos = $total_compostos / 60;
            
            echo "<p>• <strong>Paulinho (Juros Simples):</strong> R$ " . number_format($parcela_simples, 2, ',', '.') . " por mês</p>";
            echo "<p>• <strong>Juquinha (Juros Compostos):</strong> R$ " . number_format($parcela_compostos, 2, ',', '.') . " por mês</p>";
            echo "<p class='juros'><strong>Diferença:</strong> R$ " . number_format($parcela_compostos - $parcela_simples, 2, ',', '.') . " a mais por mês!</p>";
            echo "</div>";
            
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>