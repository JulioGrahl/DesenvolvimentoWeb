<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1 - Soma com Cores</title>
    <style>
        .azul { color: blue; font-weight: bold; }
        .verde { color: green; font-weight: bold; }
        .vermelho { color: red; font-weight: bold; }
        .container { max-width: 500px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="number"] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .resultado { margin-top: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercício 1 - Soma com Cores</h1>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="valor1">Primeiro valor:</label>
                <input type="number" id="valor1" name="valor1" step="any" required>
            </div>
            
            <div class="form-group">
                <label for="valor2">Segundo valor:</label>
                <input type="number" id="valor2" name="valor2" step="any" required>
            </div>
            
            <div class="form-group">
                <label for="valor3">Terceiro valor:</label>
                <input type="number" id="valor3" name="valor3" step="any" required>
            </div>
            
            <button type="submit">Calcular Soma</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Capturar os valores do formulário
            $valor1 = floatval($_POST['valor1']);
            $valor2 = floatval($_POST['valor2']);
            $valor3 = floatval($_POST['valor3']);
            
            // Calcular a soma
            $soma = $valor1 + $valor2 + $valor3;
            
            // Determinar a cor baseado nas condições
            $classe_cor = "";
            
            if ($valor1 > 10) {
                $classe_cor = "azul";
            } elseif ($valor2 < $valor3) {
                $classe_cor = "verde";
            } elseif ($valor3 < $valor1 && $valor3 < $valor2) {
                $classe_cor = "vermelho";
            }
            
            // Exibir o resultado
            echo "<div class='resultado'>";
            echo "<h3>Resultado:</h3>";
            echo "<p>Valor 1: " . $valor1 . "</p>";
            echo "<p>Valor 2: " . $valor2 . "</p>";
            echo "<p>Valor 3: " . $valor3 . "</p>";
            echo "<p class='" . $classe_cor . "'>Soma: " . $soma . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>