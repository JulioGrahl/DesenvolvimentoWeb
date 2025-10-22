<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 6 - Feira do Joãozinho</title>
    <style>
        .container { max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="number"] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #218838; }
        .resultado { margin-top: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 5px; }
        .produto-item { margin-bottom: 8px; padding: 8px; background-color: white; border-radius: 4px; }
        .vermelho { color: red; font-weight: bold; }
        .azul { color: blue; font-weight: bold; }
        .verde { color: green; font-weight: bold; }
        .total { font-size: 1.2em; font-weight: bold; margin: 15px 0; }
        .info-box { background-color: #e9ecef; padding: 15px; border-radius: 5px; margin: 15px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercício 6 - Feira do Joãozinho</h1>
        
        <div class="info-box">
            <p><strong>Joãozinho recebeu: R$ 50,00</strong></p>
            <p><strong>Produtos disponíveis:</strong> Maçã, Melancia, Laranja, Repolho, Cenoura, Batatinha</p>
        </div>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="maca_preco">Preço da Maçã (R$/Kg):</label>
                <input type="number" id="maca_preco" name="maca_preco" step="0.01" min="0" required>
            </div>
            <div class="form-group">
                <label for="maca_quantidade">Quantidade de Maçã (Kg):</label>
                <input type="number" id="maca_quantidade" name="maca_quantidade" step="0.01" min="0" required>
            </div>
            
            <div class="form-group">
                <label for="melancia_preco">Preço da Melancia (R$/Kg):</label>
                <input type="number" id="melancia_preco" name="melancia_preco" step="0.01" min="0" required>
            </div>
            <div class="form-group">
                <label for="melancia_quantidade">Quantidade de Melancia (Kg):</label>
                <input type="number" id="melancia_quantidade" name="melancia_quantidade" step="0.01" min="0" required>
            </div>
            
            <div class="form-group">
                <label for="laranja_preco">Preço da Laranja (R$/Kg):</label>
                <input type="number" id="laranja_preco" name="laranja_preco" step="0.01" min="0" required>
            </div>
            <div class="form-group">
                <label for="laranja_quantidade">Quantidade de Laranja (Kg):</label>
                <input type="number" id="laranja_quantidade" name="laranja_quantidade" step="0.01" min="0" required>
            </div>
            
            <div class="form-group">
                <label for="repolho_preco">Preço do Repolho (R$/Kg):</label>
                <input type="number" id="repolho_preco" name="repolho_preco" step="0.01" min="0" required>
            </div>
            <div class="form-group">
                <label for="repolho_quantidade">Quantidade de Repolho (Kg):</label>
                <input type="number" id="repolho_quantidade" name="repolho_quantidade" step="0.01" min="0" required>
            </div>
            
            <div class="form-group">
                <label for="cenoura_preco">Preço da Cenoura (R$/Kg):</label>
                <input type="number" id="cenoura_preco" name="cenoura_preco" step="0.01" min="0" required>
            </div>
            <div class="form-group">
                <label for="cenoura_quantidade">Quantidade de Cenoura (Kg):</label>
                <input type="number" id="cenoura_quantidade" name="cenoura_quantidade" step="0.01" min="0" required>
            </div>
            
            <div class="form-group">
                <label for="batatinha_preco">Preço da Batatinha (R$/Kg):</label>
                <input type="number" id="batatinha_preco" name="batatinha_preco" step="0.01" min="0" required>
            </div>
            <div class="form-group">
                <label for="batatinha_quantidade">Quantidade de Batatinha (Kg):</label>
                <input type="number" id="batatinha_quantidade" name="batatinha_quantidade" step="0.01" min="0" required>
            </div>
            
            <button type="submit">Calcular Compra</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Dinheiro disponível
            $dinheiro_disponivel = 50.00;
            
            // Calcular valor gasto com cada produto
            $produtos = [
                'Maçã' => [
                    'preco' => floatval($_POST['maca_preco']),
                    'quantidade' => floatval($_POST['maca_quantidade']),
                    'total' => floatval($_POST['maca_preco']) * floatval($_POST['maca_quantidade'])
                ],
                'Melancia' => [
                    'preco' => floatval($_POST['melancia_preco']),
                    'quantidade' => floatval($_POST['melancia_quantidade']),
                    'total' => floatval($_POST['melancia_preco']) * floatval($_POST['melancia_quantidade'])
                ],
                'Laranja' => [
                    'preco' => floatval($_POST['laranja_preco']),
                    'quantidade' => floatval($_POST['laranja_quantidade']),
                    'total' => floatval($_POST['laranja_preco']) * floatval($_POST['laranja_quantidade'])
                ],
                'Repolho' => [
                    'preco' => floatval($_POST['repolho_preco']),
                    'quantidade' => floatval($_POST['repolho_quantidade']),
                    'total' => floatval($_POST['repolho_preco']) * floatval($_POST['repolho_quantidade'])
                ],
                'Cenoura' => [
                    'preco' => floatval($_POST['cenoura_preco']),
                    'quantidade' => floatval($_POST['cenoura_quantidade']),
                    'total' => floatval($_POST['cenoura_preco']) * floatval($_POST['cenoura_quantidade'])
                ],
                'Batatinha' => [
                    'preco' => floatval($_POST['batatinha_preco']),
                    'quantidade' => floatval($_POST['batatinha_quantidade']),
                    'total' => floatval($_POST['batatinha_preco']) * floatval($_POST['batatinha_quantidade'])
                ]
            ];
            
            // Calcular valor total da compra
            $valor_total = 0;
            foreach ($produtos as $produto) {
                $valor_total += $produto['total'];
            }
            
            // Exibir o resultado
            echo "<div class='resultado'>";
            echo "<h3>Resumo da Compra:</h3>";
            
            // Mostrar detalhes de cada produto
            foreach ($produtos as $nome => $dados) {
                echo "<div class='produto-item'>";
                echo "<strong>$nome:</strong> " . $dados['quantidade'] . " Kg × R$ " . number_format($dados['preco'], 2, ',', '.') . "/Kg = R$ " . number_format($dados['total'], 2, ',', '.');
                echo "</div>";
            }
            
            echo "<div class='total'>Total da compra: R$ " . number_format($valor_total, 2, ',', '.') . "</div>";
            echo "<div class='total'>Dinheiro disponível: R$ " . number_format($dinheiro_disponivel, 2, ',', '.') . "</div>";
            
            // Verificar situação financeira
            $diferenca = abs($valor_total - $dinheiro_disponivel);
            
            if ($valor_total > $dinheiro_disponivel) {
                echo "<p class='vermelho'>Joãozinho precisa de mais R$ " . number_format($diferenca, 2, ',', '.') . " para pagar a conta.</p>";
            } elseif ($valor_total < $dinheiro_disponivel) {
                echo "<p class='azul'>Joãozinho ainda pode gastar R$ " . number_format($diferenca, 2, ',', '.') . ".</p>";
            } else {
                echo "<p class='verde'>O saldo para compras foi esgotado. Valor exato!</p>";
            }
            
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>