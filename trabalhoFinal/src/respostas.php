<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/funcoes.php';

function salvar_avaliacao($dados, $db) {
    global $db_error;
    if ($db_error) {
        return false;
    }

    $id_dispositivo_padrao = 1; 

    $feedback_textual_sanitized = isset($dados['feedback']) ? pg_escape_string($db, trim($dados['feedback'])) : null;

    $success = true;

    foreach ($dados as $key => $value) {
        if (strpos($key, 'pergunta_') === 0) {
            $id_pergunta = (int) filter_var($key, FILTER_SANITIZE_NUMBER_INT);
            $resposta = (int) filter_var($value, FILTER_SANITIZE_NUMBER_INT);

            if ($resposta < 0 || $resposta > 10) {
                continue; 
            }

            $insert_query = "INSERT INTO avaliacoes (id_dispositivo, id_pergunta, resposta, feedback_textual, data_hora_avaliacao) 
                             VALUES ($id_dispositivo_padrao, $id_pergunta, $resposta, 
                             " . (is_null($feedback_textual_sanitized) ? 'NULL' : "'" . $feedback_textual_sanitized . "'") . ", 
                             NOW())";
            
            $result = pg_query($db, $insert_query);

            if (!$result) {
                error_log("Erro ao salvar avaliação.");
                $success = false;
            }
        }
    }
    return $success;
}
?>