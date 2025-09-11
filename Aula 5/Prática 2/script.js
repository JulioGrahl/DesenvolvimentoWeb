
function adicionarLinhaMedia() {
    const tabela = document.getElementById('tabela-notas');
    const tbody = tabela.querySelector('tbody');
    const colunasNotas = 9; 
    
    if (document.getElementById('linha-media-materia')) {
        alert('A linha de média por matéria já foi adicionada!');
        return;
    }
    
    const novaLinha = document.createElement('tr');
    novaLinha.id = 'linha-media-materia';
    novaLinha.className = 'media-coluna';
    
    const celulaMedia = document.createElement('td');
    celulaMedia.textContent = 'Média por Nota';
    celulaMedia.style.fontWeight = 'bold';
    novaLinha.appendChild(celulaMedia);

    for (let i = 1; i <= colunasNotas; i++) {
        let soma = 0;
        let count = 0;

        const linhasAlunos = tbody.querySelectorAll('tr:not(.media-coluna):not(.media-linha)');
        linhasAlunos.forEach(linha => {
            const celula = linha.cells[i];
            if (celula && celula.textContent.trim() !== '') {
                const nota = parseFloat(celula.textContent.replace(',', '.'));
                if (!isNaN(nota)) {
                    soma += nota;
                    count++;
                }
            }
        });

        const media = count > 0 ? (soma / count) : 0;

        const celula = document.createElement('td');
        celula.textContent = media.toFixed(2);
        novaLinha.appendChild(celula);
    }

    tbody.appendChild(novaLinha);

    document.getElementById('btn-media-colunas').disabled = true;
}

function adicionarColunaMedia() {
    const tabela = document.getElementById('tabela-notas');
    const thead = tabela.querySelector('thead');
    const tbody = tabela.querySelector('tbody');
    const colunasNotas = 9; 

    if (document.getElementById('coluna-media-aluno')) {
        alert('A coluna de média por aluno já foi adicionada!');
        return;
    }

    const linhaCabecalho1 = thead.querySelector('tr:first-child');
    const novoCabecalho1 = document.createElement('th');
    novoCabecalho1.textContent = 'Média por Aluno';
    novoCabecalho1.id = 'coluna-media-aluno';
    novoCabecalho1.className = 'media-linha';
    novoCabecalho1.rowSpan = 2;
    linhaCabecalho1.appendChild(novoCabecalho1);
    
    const linhaCabecalho2 = thead.querySelector('tr:last-child');
    
    const linhasAlunos = tbody.querySelectorAll('tr:not(.media-coluna):not(.media-linha)');
    linhasAlunos.forEach(linha => {
        let soma = 0;
        let count = 0;

        for (let i = 1; i <= colunasNotas; i++) {
            const celula = linha.cells[i];
            if (celula && celula.textContent.trim() !== '') {
                const nota = parseFloat(celula.textContent.replace(',', '.'));
                if (!isNaN(nota)) {
                    soma += nota;
                    count++;
                }
            }
        }

        const media = count > 0 ? (soma / count) : 0;

        const celulaMedia = document.createElement('td');
        celulaMedia.textContent = media.toFixed(2);
        celulaMedia.className = 'media-linha';
        linha.appendChild(celulaMedia);
    });

    const linhaMediaMateria = document.getElementById('linha-media-materia');
    if (linhaMediaMateria) {
        const celulaVazia = document.createElement('td');
        celulaVazia.textContent = '-';
        linhaMediaMateria.appendChild(celulaVazia);
    }

    document.getElementById('btn-media-linhas').disabled = true;
}