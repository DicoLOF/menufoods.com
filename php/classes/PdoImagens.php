<?php

/**
 * Description of Cliente
 *
 * @author 2D Analises
 */
include_once 'autoload.php';

class PdoImagens extends ModeloImagens {

    //FUNÇÃO PARA CADASTRO IMAGENS NO SLIDE INICIAL               
    public function insert_img() {
        $pdo = Conexao::conecta_pdo();
        try {
            $gravar = $pdo->prepare("INSERT INTO `imagens` (`id_login`, `foto_topo`, `mensagem`)
                                     VALUES(?, ?, ?)");
            $gravar->bindValue(1, $this->getId_login());
            $gravar->bindValue(2, $this->getFoto_topo());
            $gravar->bindValue(3, $this->getMensagem());
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

    //PEGAR O USUARIO PELO ID
    public function select_img($tabela) {
        $pdo = Conexao::conecta_pdo();
        try {
            $listar = $pdo->prepare("SELECT * FROM $tabela WHERE id_img = ?");
            $listar->bindValue(1, $this->getId_img());
            $listar->execute();

            if ($listar->rowCount() > 0) {
                $dados = $listar->fetchAll(PDO::FETCH_ASSOC);
                return $dados;
            } else {
                return FALSE;
            }
        } catch (Exception $exc) {
            echo "Erro no lista_tabela no Function_pdo" . $exc->getMessage();
        }
    }

}
