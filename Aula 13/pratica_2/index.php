<?php
namespace pratica_2;

class Pessoa {
    private $nome;
    private $sobrenome;
    private $dataNascimento;
    private $cpfCnpj;
    private $tipo;
    private $contato;
    private $endereco;

    // SETTERS
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    public function setDataNascimento($data) {
        $this->dataNascimento = $data;
    }

    // GETTERS
    public function getNome() {
        return $this->nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    // NOME COMPLETO
    public function getNomeCompleto() {
        return $this->nome . " " . $this->sobrenome;
    }

    // IDADE
    public function getIdade() {
        if (!$this->dataNascimento) return null;

        $hoje = new \DateTime();
        $idade = $hoje->diff($this->dataNascimento);
        return $idade->y;
    }
}

?>

