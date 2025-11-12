<?php

require_once __DIR__ . '/db.php';

function buscar_perguntas($db) {
    global $db_error;

    if ($db_error) {
        return [
            ['id_pergunta' => 991, 'texto_pergunta' => 'Simulação: Qual a satisfação com o atendimento?', 'ordem' => 1],
            ['id_pergunta' => 992, 'texto_pergunta' => 'Simulação: Como avalia o ambiente?', 'ordem' => 2]
        ];
    }

    $query = "SELECT id_pergunta, texto_pergunta, ordem 
              FROM perguntas 
              WHERE status = TRUE 
              ORDER BY ordem ASC";
    
    $result = pg_query($db, $query);
    
    if ($result) {
        return pg_fetch_all($result);
    }
    return [];
}
?>