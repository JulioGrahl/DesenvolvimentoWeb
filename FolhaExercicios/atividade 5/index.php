<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 5 - Área do Triângulo Retângulo</title>
    <style>
        .container { max-width: 500px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="number"] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #fd7e14; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #e66a0a; }
        .resultado { margin-top: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 5px; }
        .frase-resultado { color: #198754; font-weight: bold; font-size: 1.1em; }
        .formula { background-color: #e9ecef; padding: 10px; border-radius: 5px; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercício 5 - Área do Triângulo Retângulo</h1>
        
        <div class="formula">
            <strong>Fórmula:</strong> Área = (Base × Altura) ÷ 2
        </div>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="base">Base do triângulo (metros):</label>
                <input type="number" id="base" name="base" step="any" min="0" required>
            </div>
            
            <div class="form-group">
                <label for="altura">Altura do triângulo (metros):</label>
                <input type="number" id="altura" name="altura" step="any" min="0" required>
            </div>
            
            <button type="submit">Calcular Área</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Criar variáveis apropriadas para o cálculo
            $base = floatval($_POST['base']);
            $altura = floatval($_POST['altura']);
            
            // Calcular a área do triângulo retângulo usando a fórmula: (Base * Altura) / 2
            $area = ($base * $altura) / 2;
            
            // Exibir o resultado com uma frase
            echo "<div class='resultado'>";
            echo "<h3>Resultado do Cálculo:</h3>";
            echo "<p class='frase-resultado'>A área do triângulo retângulo com base de " . $base . " metros e altura de " . $altura . " metros é " . $area . " metros quadrados.</p>";
            echo "<p><strong>Fórmula aplicada:</strong> (" . $base . " × " . $altura . ") ÷ 2 = " . $area . " m²</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>