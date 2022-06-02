<?php

include_once './autoload.php';

//CLASSE PARA INSERIR ALTERAR DELETAR
class PdoLogin extends ModeloLogin {

    //FUNÇÃO PARA CADASTRO               
    public function insert_user() {
        $pdo = Conexao::conecta_pdo();
        try {
            $gravar = $pdo->prepare("INSERT INTO `login` (`nome`, `email`, `apelido`, `senha`, `foto`)
                                     VALUES(?, ?, ?, ?, ?)");
            $gravar->bindValue(1, $this->getNome());
            $gravar->bindValue(2, $this->getEmail());
            $gravar->bindValue(3, $this->getApelido());
            $gravar->bindValue(4, $this->getSenha());
            $gravar->bindValue(5, $this->getFoto());
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

    public function delete($del_table, $del_id) {
        $pdo = Conexao::conecta_pdo();
        try {
            $deletar = $pdo->prepare("DELETE FROM $del_table WHERE $del_id = ?");
            $deletar->bindValue(1, $this->getId_login());
            $deletar->execute();

            if ($deletar->rowCount() > 0) :
                return true;
            else :
                return false;
            endif;
        } catch (Exception $exc) {
            echo "Erro no select_curriculo no Function_pdo" . $exc->getMessage();
        }
    }

    //VERIFICA SE AS SENHA E LOGIN ESTÃO CORRETOS
    public function logar() {
        $pdo = Conexao::conecta_pdo();
        try {
            $login = $pdo->prepare("SELECT * FROM login WHERE email = ? AND senha = ?");
            $login->bindValue(1, $this->getEmail());
            $login->bindValue(2, $this->getSenha());
            $login->execute();
            if ($login->rowCount() == 1) {
                $dados = $login->fetch(PDO::FETCH_OBJ);
                $_SESSION['email'] = $dados->email;
                $_SESSION['logado'] = TRUE;
                return true;
            }
        } catch (Exception $e) {
            echo "Erro na funcao logar" . $e->getMessage();
            return FALSE;
        }
    }

    public function log_admin($email) {
        $pdo = Conexao::conecta_pdo();
        try {
            $login = $pdo->prepare("SELECT * FROM login WHERE email = ?");
            $login->bindValue(1, $email);
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

    //LISTA APENAS O USUARIA COM LOGIN E SENHA CORRETOS
    public function lista_log($email, $senha) {
        $pdo = Conexao::conecta_pdo();
        try {
            $login = $pdo->prepare("SELECT * FROM login WHERE email = ? AND senha = ?");
            $login->bindValue(1, $email);
            $login->bindValue(2, $senha);
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

    public function update_log() {
        $pdo = Conexao::conecta_pdo();
        try {
            $login = $pdo->prepare("UPDATE `login` SET `apelido` = ?, `nome` = ? WHERE `login`.`id_login` = ?;");
            $login->bindValue(1, $this->getApelido());
            $login->bindValue(2, $this->getNome());
            $login->bindValue(3, $this->getId_login());
            $login->execute();

            if ($login->rowCount() > 0) :
                return true;
            else :
                return false;
            endif;
        } catch (Exception $exc) {
            echo "Erro no PdoLogin update_log()" . $exc->getMessage();
        }
    }

    public function update_avatar() {
        $pdo = Conexao::conecta_pdo();
        try {
            $login = $pdo->prepare("UPDATE `login` SET `foto` = ? WHERE `login`.`id_login` = ?;");
            $login->bindValue(1, $this->getFoto());
            $login->bindValue(2, $this->getId_login());
            $login->execute();

            if ($login->rowCount() > 0) :
                return true;
            else :
                return false;
            endif;
        } catch (Exception $exc) {
            echo "Erro no PdoLogin update_avatar()" . $exc->getMessage();
        }
    }

    public function log_acesso($ip, $data, $nome) {
        $log = "php/log.txt";
        $texto = "O usuario {$nome}, acessou o sistema na data {$data} com o IP {$ip}\n";
        $caracter = strlen($texto);

        if (file_exists($log)) {
            $abrir_arq = fopen($log, "a+");
            fputs($abrir_arq, $texto, $caracter);
        } else {
            $abrir_arq = fopen($log, "a+");
            fputs($abrir_arq, $texto, $caracter);
        }
    }

    public function insert_log() {
        $pdo = Conexao::conecta_pdo();
        try {
            $gravar = $pdo->prepare("INSERT INTO `acesso` (`acess_nome`, `acess_login`, `acess_senha`, `permissao`) VALUES(?, ?, ?, ?)");
            $gravar->bindValue(1, $this->getAcess_nome());
            $gravar->bindValue(2, $this->getAcess_login());
            $gravar->bindValue(3, $this->getAcess_senha());
            $gravar->bindValue(4, $this->getPermissao());
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

    //SAI COM O USUARIO DA PAGINA EM QUE ESTA LOGADO PARA APAGINA INICIAL
    public static function deslogar() {
        unset($_SESSION['logado']);
        $_SESSION['email'] = NULL;
        $_SESSION['senha'] = NULL;
        session_destroy();
        $_COOKIE['foods'] = 'null';
    }

}
