<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2 - Divisibilidade por 2</title>
    <style>
        .container { max-width: 500px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="number"] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #218838; }
        .resultado { margin-top: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 5px; }
        .verdadeiro { color: green; font-weight: bold; }
        .falso { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercício 2 - Divisibilidade por 2</h1>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="numero">Digite um número:</label>
                <input type="number" id="numero" name="numero" step="any" required>
            </div>
            
            <button type="submit">Verificar Divisibilidade</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Capturar o valor do formulário
            $numero = floatval($_POST['numero']);
            
            // Verificar se o número é divisível por 2
            $divisivel = ($numero % 2 == 0);
            
            // Exibir o resultado
            echo "<div class='resultado'>";
            echo "<h3>Resultado:</h3>";
            echo "<p>Número informado: " . $numero . "</p>";
            
            if ($divisivel) {
                echo "<p class='verdadeiro'>\"Valor divisível por 2\"</p>";
            } else {
                echo "<p class='falso'>\"O valor não é divisível por 2\"</p>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>