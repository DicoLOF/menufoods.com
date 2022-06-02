<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PdoSlider
 *
 * @author Osvaldo
 */
class PdoSlider extends ModeloLogin {

    //PEGAR O USUARIO PELO ID
    public function id_log($tabela) {
        $pdo = Conexao::conecta_pdo();
        try {
            $login = $pdo->prepare("SELECT * FROM $tabela WHERE id_login = ?");
            $login->bindValue(1, $this->getId_login());
            $login->execute();

            if ($login->rowCount() > 0) {
                $dados = $login->fetchAll(PDO::FETCH_ASSOC);
                return $dados;
            } else {
                return FALSE;
            }
        } catch (Exception $exc) {
            echo "Erro no lista_tabela no Function_pdo" . $exc->getMessage();
        }
    }

}
