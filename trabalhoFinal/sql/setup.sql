/*

---------------------------------------------------------- Adição de tabelas ------------------------------------------------------
CREATE TABLE dispositivos (
    id_dispositivo SERIAL PRIMARY KEY,
    nome_dispositivo VARCHAR(100) NOT NULL,
    status BOOLEAN DEFAULT TRUE -- Ativo/Inativo
);

CREATE TABLE perguntas (
    id_pergunta SERIAL PRIMARY KEY,
    texto_pergunta TEXT NOT NULL,
    ordem INTEGER UNIQUE NOT NULL,
    status BOOLEAN DEFAULT TRUE -- Ativa/Inativa
);

CREATE TABLE avaliacoes (
    id_avaliacao BIGSERIAL PRIMARY KEY,
    id_dispositivo INTEGER REFERENCES dispositivos(id_dispositivo),
    id_pergunta INTEGER REFERENCES perguntas(id_pergunta),
    resposta INTEGER CHECK (resposta >= 0 AND resposta <= 10) NOT NULL, -- Escala 0 a 10
    feedback_textual TEXT, -- Opcional
    data_hora_avaliacao TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL -- Data/Hora obrigatória
);

INSERT INTO dispositivos (nome_dispositivo, status) VALUES 
('Recepção Principal', TRUE),
('Caixa de Atendimento', TRUE);

INSERT INTO perguntas (texto_pergunta, ordem, status) VALUES 
('Qual a sua satisfação com o atendimento recebido?', 1, TRUE),
('Como você avalia a limpeza e organização do ambiente?', 2, TRUE),
('A agilidade no seu atendimento atendeu suas expectativas?', 3, TRUE);
----------------------------------------------------------------------------------------------------------------------------------


---------------------------------------------------- Select para ver respostas ---------------------------------------------------
SELECT
    A.id_avaliacao,
    D.nome_dispositivo AS setor_avaliado,
    P.texto_pergunta AS pergunta_feita,
    A.resposta AS pontuacao_obtida,
    CASE 
        WHEN A.resposta = 0 THEN 'MUITO INSATISFEITO'
        WHEN A.resposta = 10 THEN 'COMPLETAMENTE SATISFEITO'
        ELSE 'Neutro/Outro' 
    END AS nivel_satisfacao, -- Adiciona rótulos baseados na escala 0 a 10 [5, 6]
    A.feedback_textual,
    A.data_hora_avaliacao
FROM
    avaliacoes A
INNER JOIN
    dispositivos D ON A.id_dispositivo = D.id_dispositivo -- Associa a avaliação ao local/setor [2, 4]
INNER JOIN
    perguntas P ON A.id_pergunta = P.id_pergunta           -- Associa a avaliação à pergunta específica [4]
ORDER BY
    A.data_hora_avaliacao DESC;
-----------------------------------------------------------------------------------------------------------------------------------