<?php
// Página Principal (formulário de avaliação) [4]

// Inclui a lógica necessária para processar submissão e buscar perguntas
require_once __DIR__ . '/../src/perguntas.php';
require_once __DIR__ . '/../src/respostas.php';

// A variável $db é carregada via src/db.php, que é incluído em src/perguntas.php e src/respostas.php
global $db, $db_error;

$perguntas = buscar_perguntas($db);
$error_message = '';

// Processamento da Submissão
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($db_error) {
        $error_message = "Erro: O Banco de Dados está inacessível. Sua avaliação não pôde ser salva.";
    } 
    elseif (salvar_avaliacao($_POST, $db)) {
        // Redireciona para a página de agradecimento [4]
        header('Location: obrigado.php'); 
        exit;
    } else {
        $error_message = "Ocorreu um erro ao salvar sua avaliação. Tente novamente.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Avaliação de Serviços</title>
    <!-- Caminhos ajustados para public/css/ e public/js/ -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Avalie Nossos Serviços</h1>
        <p>Sua opinião é fundamental para nossa melhoria contínua.</p>

        <?php if ($error_message): ?>
            <div class="alert alert-error"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form id="evaluationForm" method="POST" action="index.php">
            
            <?php if (!empty($perguntas)): ?>
                <?php foreach ($perguntas as $pergunta): ?>
                    <div class="question-block" data-id="<?php echo $pergunta['id_pergunta']; ?>">
                        <h2><?php echo $pergunta['ordem'] . '. ' . htmlspecialchars($pergunta['texto_pergunta']); ?></h2>
                        <div class="scale-selector">
                            <label for="pergunta_<?php echo $pergunta['id_pergunta']; ?>">Resposta: </label>
                            <input 
                                type="range" 
                                min="0" 
                                max="10" 
                                value="5" 
                                class="slider" 
                                name="pergunta_<?php echo $pergunta['id_pergunta']; ?>" 
                                id="pergunta_<?php echo $pergunta['id_pergunta']; ?>"
                                required
                            >
                            <span class="scale-value" id="value_pergunta_<?php echo $pergunta['id_pergunta']; ?>">5</span>
                            <div class="scale-labels">
                                <span>0 (MUITO INSATISFEITO)</span>
                                <span>10 (COMPLETAMENTE SATISFEITO)</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="question-block feedback-block">
                <h2>Feedback Adicional (Opcional)</h2>
                <p>Gostaria de adicionar algum comentário ou sugestão?</p>
                <textarea name="feedback" rows="4" maxlength="500" placeholder="Digite seu feedback aqui..."></textarea>
            </div>

            <button type="submit" class="btn-submit">Enviar Avaliação</button>
        </form>

        <footer>
            <p>
                **Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.**
            </p>
        </footer>
    </div>
</body>
</html>