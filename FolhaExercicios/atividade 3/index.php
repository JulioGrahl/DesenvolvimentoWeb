<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 3 - Área do Quadrado</title>
    <style>
        .container { max-width: 500px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="number"] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #17a2b8; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #138496; }
        .resultado { margin-top: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 5px; }
        .frase-resultado { color: #333; font-weight: bold; font-size: 1.1em; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercício 3 - Área do Quadrado</h1>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="lado">Comprimento do lado do quadrado (metros):</label>
                <input type="number" id="lado" name="lado" step="any" min="0" required>
            </div>
            
            <button type="submit">Calcular Área</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Capturar o valor do formulário
            $lado = floatval($_POST['lado']);
            
            // Calcular a área do quadrado (lado × lado)
            $area = $lado * $lado;
            
            // Exibir o resultado
            echo "<div class='resultado'>";
            echo "<h3>Resultado:</h3>";
            echo "<p class='frase-resultado'>\"A área do quadrado de lado " . $lado . " metros é " . $area . " metros quadrados\"</p>";
            echo "<p><strong>Fórmula:</strong> Área = lado × lado</p>";
            echo "<p><strong>Cálculo:</strong> " . $lado . " × " . $lado . " = " . $area . " m²</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>