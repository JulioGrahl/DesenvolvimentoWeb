<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 4 - Área do Retângulo</title>
    <style>
        .container { max-width: 500px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="number"] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #6f42c1; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #5a359c; }
        .resultado { margin-top: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 5px; }
        h1.frase-resultado { color: #d63384; }
        h3.frase-resultado { color: #0d6efd; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercício 4 - Área do Retângulo</h1>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="lado_a">Lado A do retângulo (metros):</label>
                <input type="number" id="lado_a" name="lado_a" step="any" min="0" required>
            </div>
            
            <div class="form-group">
                <label for="lado_b">Lado B do retângulo (metros):</label>
                <input type="number" id="lado_b" name="lado_b" step="any" min="0" required>
            </div>
            
            <button type="submit">Calcular Área</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Configurar as variáveis que representam os lados
            $lado_a = floatval($_POST['lado_a']);
            $lado_b = floatval($_POST['lado_b']);
            
            // Calcular a área do retângulo (lado_a × lado_b)
            $area = $lado_a * $lado_b;
            
            // Determinar a tag HTML baseado na área
            $tag_html = ($area > 10) ? 'h1' : 'h3';
            
            // Exibir o resultado
            echo "<div class='resultado'>";
            echo "<h3>Resultado:</h3>";
            echo "<" . $tag_html . " class='frase-resultado'>\"A área do retângulo de lados " . $lado_a . " e " . $lado_b . " metros é " . $area . " metros quadrados.\"</" . $tag_html . ">";
            echo "<p><strong>Fórmula:</strong> Área = lado A × lado B</p>";
            echo "<p><strong>Cálculo:</strong> " . $lado_a . " × " . $lado_b . " = " . $area . " m²</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>