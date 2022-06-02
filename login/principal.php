<?php
/**
 * Description of Cliente
 *
 * @author 2D Analises
 */
session_start();
include_once '../php/autoload.php';
$log = new PdoLogin();
$login = new PdoLogin();
$comp = new PdoCompras();

//FORMULARIO DE LOG DE ACESSO PARA PAGINA ACESSO
if (isset($_POST['ok'])) {
    $email = addslashes($_POST['email']);
    $senha = addslashes(md5($_POST['senha']));
    $log->setEmail($email);
    $log->setSenha($senha);

    if ($log->logar()) {
        date_default_timezone_set('America/Sao_Paulo');
        $log->log_acesso($_SERVER['REMOTE_ADDR'], date("d/m/Y G:i:sa"), $email);
        $pegar_id = $login->lista_log($email, $senha);
        foreach ($pegar_id as $v) {
            $_SESSION['logado'];
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['id_user'] = base64_encode($v['id_login']);
            if ($email == '2danalises@gmail.com' && $senha == $v['senha']) {
                header('Location:../adm/cpainel');
            } else {
                header('Location:../logout');
            }
        }
    } else {
        echo '<script> alert("Login ou Senha incorretos");</script>';
    }
}
?>

<!DOCTYPE HTML>
<!--
        SITE CONSTRUIDO POR 2D ANALISES
-->

<html lang="pt-br">
    <head>
        <title>Foods</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />		
        <link rel="stylesheet" href="../assets/css/main.css" />
        <link rel="stylesheet" href="../assets/css/style.css" />       
    </head>
    <body>
        <?php include_once 'url.php'; ?>         
    </body>
</html>
