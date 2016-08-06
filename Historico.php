<?php

class Historico {
    
    private $id;
    private $dataHistorico;
    private $descricao;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getDataHistorico() {
        return $this->$dataHistorico;
    }
    public function setDataHistorico(DateTime $dataHistorico) {
        $this->dataHistorico = $dataHistorico;
    }
    
    public function getDescricao() {
        return $this->descricao;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
}