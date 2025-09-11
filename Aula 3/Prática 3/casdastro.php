<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h1>Dados Recebidos</h1>";
    echo "<ul>";
    
    echo "<li><strong>Nome:</strong> " . htmlspecialchars($_POST['nome']) . "</li>";
    echo "<li><strong>Sobrenome:</strong> " . htmlspecialchars($_POST['sobrenome']) . "</li>";
    echo "<li><strong>E-Mail:</strong> " . htmlspecialchars($_POST['email']) . "</li>";
    echo "<li><strong>Data de Nascimento:</strong> " . htmlspecialchars($_POST['nascimento']) . "</li>";
    echo "<li><strong>Sexo:</strong> " . htmlspecialchars($_POST['sexo']) . "</li>";
    echo "<li><strong>Endereço:</strong> " . htmlspecialchars($_POST['endereco']) . "</li>";
    echo "<li><strong>CEP:</strong> " . htmlspecialchars($_POST['cep']) . "</li>";
    echo "<li><strong>Cor favorita:</strong> " . htmlspecialchars($_POST['cor']) . "</li>";
    echo "<li><strong>Estado (UF):</strong> " . htmlspecialchars($_POST['uf']) . "</li>";
    
    echo "</ul>";
    echo "<p><a href='javascript:history.back()'>Voltar ao formulário</a></p>";
} else {
    echo "<p>Método de requisição inválido.</p>";
    echo "<p><a href='javascript:history.back()'>Voltar ao formulário</a></p>";
}
?>