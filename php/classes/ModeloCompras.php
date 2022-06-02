<?php

/**
 * Description of Cliente
 *
 * @author 2D Analises
 */
class ModeloCompras extends ModeloLogin {

    private $id_produto = null;
    private $rua = null;
    private $numero = null;
    private $complemento = null;
    private $bairro = null;
    private $estado = null;
    private $cidade = null;
    private $pais = null;

    function getId_produto() {
        return $this->id_produto;
    }

    function getRua() {
        return $this->rua;
    }

    function getNumero() {
        return $this->numero;
    }

    function getComplemento() {
        return $this->complemento;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getPais() {
        return $this->pais;
    }

    function setId_produto($id_produto) {
        $this->id_produto = $id_produto;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

}
