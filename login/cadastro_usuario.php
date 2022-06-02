<?php
//CADASTROS DE USUARIOS
if (isset($_POST['cad'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email_']);
    $senha = addslashes(md5($_POST['senha_']));

    $login->setNome($nome);
    $login->setEmail($email);
    $login->setSenha($senha);
    $login->setFoto("avatar.jpg");
    $login->setApelido("Meu Nome");

    if ($login->insert_user()) {
        echo '<script>alert ("Cadastro efetuado com sucesso !");</script>';
        $pegar_id = $login->lista_log($email, $senha);
        foreach ($pegar_id as $v) {
            $_SESSION['id_user'] = base64_encode($v['id_login']);
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['nome'] = $nome;
            header('Location:../logout');
        }
    } else {
        echo '<script>alert ("Este email já existe !");</script>';
    }
}
?>

<html>
    <body>
        <div id="top_cad">
            <div class="container">
                <a href="sobre"><i class="icon fa-history"></i> Sobre</a>&emsp13;&emsp13;
                <a href="acesso"><i class="icon fa-arrow-circle-left"></i> Entrar</a>
            </div>
        </div>
        <div class="container form_alinha">  
            <form action="" method="POST">                
                <div class="row form_alinha_2">
                    <p>Cadastre-se no Foods</p>
                    <table>
                        <tr>
                            <td><div class="6u$ 12u$(mobile)"><input type="text" name="nome" placeholder="Nome" required/></div></td>
                        </tr> 
                        <tr>
                            <td><div class="6u$ 12u$(mobile)"><input type="text" name="email_" placeholder="Email" required/></div>
                        </tr>                        
                        <tr>
                            <td><div class="6u$ 12u$(mobile)"><input type="password" name="senha_" placeholder="Senha" required/></div><td>
                        </tr>
                        <tr>
                            <td>
                                <div class="12u$">
                                    <button type="submit" name="cad"><i class="icon fa-check"> Cadastre-se</i></button>                                    
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="12u">
                                    <section>
                                        Ao inscrever-se, você concorda com os Termos de Serviço e a 
                                        Política de Privacidade, incluindo o Uso de Cookies.
                                    </section>                                 
                                </div>
                            <td>
                        </tr>
                    </table>  
                </div>                
            </form> 
        </div>         
    </body>
</html>
