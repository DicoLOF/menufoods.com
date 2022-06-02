<?php

/**
 * 2D Analises Empresa de criação de Software
 *
 * @author 2D Analises
 */
class PdoTempo extends ModeloTempo{

    //FUNÇÃO PARA CADASTRO               
    public function insert_tempo() {
        $pdo = Conexao::conecta_pdo();
        try {
            $gravar = $pdo->prepare("INSERT INTO `linha_tempo` (`id_login`, `foto_tempo`, `comentario`) VALUES(?, ?, ?)");
            $gravar->bindValue(1, $this->getId_login());
            $gravar->bindValue(2, $this->getFoto_tempo());
            $gravar->bindValue(3, $this->getComentario());
            $gravar->execute();
            if ($gravar->rowCount() > 0) :
                return true;
            else :
                return false;
            endif;
        } catch (Exception $exc) {
            echo "Erro ao gravar dados no banco" . $exc->getMessage();
        }
    }

    //FUNÇÃO PARA UPDATE               
    public function update_tempo() {
        $pdo = Conexao::conecta_pdo();
        try {
            $gravar = $pdo->prepare("UPDATE `cad_compra` SET `rua` = ?, `numero` = ?, `complemento` = ?, `bairro` = ?, `estado` = ?, `cidade` = ?, `pais` = ? WHERE `cad_compra`.`id_login` = ?;");
            $gravar->bindValue(1, $this->getRua());
            $gravar->bindValue(2, $this->getNumero());
            $gravar->bindValue(3, $this->getComplemento());
            $gravar->bindValue(4, $this->getBairro());
            $gravar->bindValue(5, $this->getEstado());
            $gravar->bindValue(6, $this->getCidade());
            $gravar->bindValue(7, $this->getPais());
            $gravar->bindValue(8, $this->getId_login());
            $gravar->execute();

            if ($gravar->rowCount() == 1) :
                return true;
            else :
                return false;
            endif;
        } catch (Exception $exc) {
            echo "Erro ao gravar dados no banco" . $exc->getMessage();
        }
    }

}
