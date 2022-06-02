<?php

/**
 * Description of Cliente
 *
 * @author 2D Analises
 */
class ModeloImagens extends ModeloLogin {

    private $id_img = null;
    private $foto_topo = null;
    private $mensagem = null;

    public function getId_img() {
        return $this->id_img;
    }

    public function getFoto_topo() {
        return $this->foto_topo;
    }

    public function getMensagem() {
        return $this->mensagem;
    }

    public function setId_img($id_img) {
        $this->id_img = $id_img;
    }

    public function setFoto_topo($foto_topo) {
        $this->foto_topo = $foto_topo;
    }

    public function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

}
