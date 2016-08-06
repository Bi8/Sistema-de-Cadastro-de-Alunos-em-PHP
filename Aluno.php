<?php

class Aluno {
    
    private $id;
    private $nome;
    private $endereco;
    private $turma;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEndereco() {
        return $this->endereco;
    }
    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }
    
    public function getTurma() {
        return $this->turma;
    }
    public function setTurma($turma) {
        $this->turma = $turma;
    }
    
}