<?php
/**
 * 2D Analises Empresa de criação de Software
 *
 * @author 2D Analises
 */
session_start();
include_once '../php/autoload.php';

//CLASSES ESTANCIADAS
$login = new PdoLogin();
$compras = new PdoCompras();
$imagens = new PdoImagens();
$topo = new PdoSlider();
$login->setId_login(base64_decode($_COOKIE['foods']));
$valor = $login->id_log("login");
$slide = $login->id_log("imagens");
$log_admin = $login->log_admin('2danalises@gmail.com');

//CRIA O COOKIE (FOODS) SE CASO ELE NA EXISTIR
if (!isset($_COOKIE['foods'])) {
    setcookie('foods', $_SESSION['id_user']);
}

//ADICIONA O ID ROOT PARA O SLIDER FUNCIONAR
foreach ($log_admin as $l) {
    $id = $l['id_login'];
    $topo->setId_login($id);
    $slide = $topo->id_log('imagens');
}

if (isset($_GET['sair'])) {
    if ($_GET['sair'] == 'ok') {
        PdoLogin::deslogar();
    }
    header('Location: ../logout');
}

//ATUALIZA DADOS DO CLIENTE
if (isset($_POST['cad_compra'])) {
    $rua = addslashes($_POST['rua']);
    $numero = addslashes($_POST['numero']);
    $complemento = addslashes($_POST['complemento']);
    $bairro = addslashes($_POST['bairro']);
    $estado = addslashes($_POST['estado']);
    $cidade = addslashes($_POST['cidade']);
    $pais = addslashes($_POST['pais']);
    $id_cad = base64_decode($_COOKIE['foods']);

    if ($rua == NULL && $numero == NULL) {
        //CADASTRA O ID_LOGIN PRIMEIRO PARA ATUALIZAR O RESTO QD O USUARIO SOLICITAR
        $compras->setId_login(base64_decode($_COOKIE['foods']));
        $compras->insert_compra();
    }
    $compras->setRua($rua);
    $compras->setNumero($numero);
    $compras->setComplemento($complemento);
    $compras->setBairro($bairro);
    $compras->setEstado($estado);
    $compras->setCidade($cidade);
    $compras->setPais($pais);
    $compras->setId_login($id_cad);
    if ($compras->update_compras()) {
        header('Location: logout');
    } else {
        header('Location: logout');
    }
}

//ATUALIZA APELIDO E NOME DO PERFIL
if (isset($_POST['upload'])) {
    $apelido = addslashes($_POST['apelido']);
    $nome = addslashes($_POST['nome']);

    $login->setApelido($apelido);
    $login->setNome($nome);
    if ($login->update_log()) {
        header('Location: logout');
    } else {
        header('Location: logout');
    }
}

//ADICIONA IMAGENS NO SLIDER PRINCIPAL USANDO A CLASSE WIDEIMAGE
if (isset($_POST['image'])) {
    try {
        $foto_temp = $_FILES['foto_top']['tmp_name'];
        $foto = $_FILES['foto_top']['name'];
        $pasta = "../images/img_top/";

        //TRANSFORMA O NOME DA FOTO EM UM NOME UNICO PARA SALVAR NO BANCO
        $extensao = end(explode(".", $foto));
        $novo_nome = $login->getId_login() . uniqid() . "." . $extensao;

        //REDIMENSIONA AS IMAGENS PARA O TAMANHO L 100 * A 130
        $imag = WideImage::load($foto_temp);
        $redimensionar = $imag->resize(1000, 470, 'fill');
        $redimensionar->saveToFile($pasta . $novo_nome);

        $id_img = base64_decode($_COOKIE['foods']);
        $mensagem = addslashes($_POST['mensagem']);

        $imagens->setId_login($id_img);
        $imagens->setFoto_topo($novo_nome);
        $imagens->setMensagem($mensagem);
        if ($imagens->insert_img()) {
            echo '<script>alert ("Imagem adicionada ao slide !");</script>';
        } else {
            echo '<script>alert ("Erro !");</script>';
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
        echo '<script> alert ("Insira imagens com ate 8 MB !");</script>';
    }
}

//DELETA FOTOS DO SLIDER PRINCIPAL
if (isset($_GET["deletado"])) {
    $login->setId_login($_GET['deletado']);
    $imagens->setId_img($_GET['deletado']);
    $dados = $imagens->select_img("imagens");
    foreach ($dados as $v) {
        unlink("../images/img_top/" . $v['foto_topo']);
    }
    if ($login->delete("imagens", "id_img")) {
        echo '<script> location.reload(); </script>';
        header('Location: logout');
    } else {
        
    }
}
?>

<!DOCTYPE HTML>
<!--
        SITE DE CARDAPIO DIGITAL 2D ANALISES
-->
<html lang="pt-br">
    <head>
        <title>Foods</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />		
        <link rel="stylesheet" href="../assets/css/main.css" />
        <link rel="stylesheet" href="../assets/css/style.css" />              
        <script src="../assets/js/jquery.min.js"></script>
    </head>
    <body>

        <!-- Header -->
        <div id="header">
            <div class="top">
                <!-- INICIO LOGO -->
                <div id="logo">
                    <?php foreach ($valor as $v) { ?>
                        <span class="image avatar48"><img src="../images/img_perfil/<?php echo $v['foto']; ?>" alt="" /></span>
                        <p>Seja bem vindo(a) !</p>
                        <h1 id="title"><?php echo $v['apelido']; ?></h1>  
                    <?php } ?>                    
                    <div class="tirar"><a class="icon fa fa-cogs fa-5x" href="#perfil" > Editar perfil</a></div>
                </div>
                <!-- FIM LOGO -->

                <!-- INICIO NAV -->
                <nav id="nav">	                    
                    <ul>
                        <li><a href="../restaurantes"><span class="icon fa-home">Home</span></a></li>
                        <li><a href="../promocoes"><span class="icon fa-th">Promoções</span></a></li>
                        <li><a href="../show"><span class="icon fa-ticket">Shows</span></a></li>
                        <li><a href="../contato"><span class="icon fa-envelope">Contato</span></a></li>
                        <li><a href="../login/acesso"><span class="icon fa-user-secret">Login</span></a></li>
                        <li><a href="./restricted.php?sair=ok"><span class="icon fa-close">Sair</span></a></li>
                    </ul>
                </nav>
                <!-- FIM NAV -->
            </div>

            <div iv class="bottom">

                <!-- ICONES REDE SOCIAL -->
                <ul class="icons">
                    <li><a href="https://twitter.com/?lang=pt" class="icon fa-twitter" target="_blank"><span class="label">Twitter</span></a></li>
                    <li><a href="https://pt-br.facebook.com/" class="icon fa-facebook" target="_blank"><span class="label">Facebook</span></a></li>
                    <li><a href="https://www.youtube.com/?gl=BR&hl=PT" class="icon fa-youtube" target="_blank"><span class="label">Youtube</span></a></li>
                    <li><a href="https://instagram.com/" class="icon fa-instagram" target="_blank"><span class="label">Instagram</span></a></li>
                    <li><a href="https://mail.google.com/" class="icon fa-envelope" target="_blank"><span class="label">Email</span></a></li>
                </ul>
            </div>     
        </div>

        <!-- MAN -->
        <div id="main">
            <!-- TOPO --> 
            <div id="slider">
                <div class="flexslider">                   
                    <ul class="slides">                                                
                        <?php foreach ($slide as $s) { ?>                        
                            <li>
                                <div class="absoluto icon fa-user-secret"> 
                                    <?php
                                    foreach ($valor as $v) {
                                        echo $v['nome'];
                                    }
                                    ?>
                                </div>
                                <div class="slider-caption">
                                    <a href="#img" class="icon fa-picture-o"> Inserir</a>                                    
                                    <p><?php echo $s['mensagem']; ?></p>  
                                </div>
                                <img src="../images/img_top/<?php echo $s['foto_topo']; ?>" />  
                                <div id="close"><a href="restricted.php?deletado=<?php echo $s['id_img']; ?>"><i class="icon fa-trash-o"></i></a></div>
                            </li>                               
                        <?php } ?>                           
                    </ul>                    
                </div>
            </div> 
            <section id="portfolio" class="two">
                <?php include_once 'url.php'; ?>
            </section>
        </div>

        <!-- RODAPE -->
        <div id="footer">
            <!-- COPYRIGHT -->
            <ul class="copyright">
                <li>Copyright &copy; 2015 2danalises .Todos direitos reservados | menufoods.com.br</li>
            </ul>
        </div>
        <!-- INICIO SCRIPTS -->  

        <script src="../assets/js/jquery.scrolly.min.js"></script>
        <script src="../assets/js/jquery.scrollzer.min.js"></script>
        <script src="../assets/js/skel.min.js"></script>
        <script src="../assets/js/util.js"></script>  
        <script src="../assets/js/main.js"></script>     
        <script src="../assets/js/plugins.js"></script> 
        <!-- INICIO SCRIPTS -->
    </body>
</html>
