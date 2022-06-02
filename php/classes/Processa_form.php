<?php

/**
 * Description of Processa_form
 *
 * @author 2D Analises
 */
class Processa_form {

    public function envia_email($para, $nome, $mensagem) {

        $remetente = "2danalises@gmail.com";
        $assunto = "Contato Menu Foods";
//INFORMAÇOES DO FORMULARIO CONTATO PASSADOS POR METODO POST        
        $site = $para;
        $message = "<br><br>Cliente <strong>$nome,</strong><br><br>";
        $message .= "Este e um email de contato<br>";
        $message .= "do site Menu Foods<br>";
        $message .= "www.menufoods.com.br<br><br>";
        $message .= "<strong>Este é um email do site Menu Foods de possiveis clientes ou erros do site.</strong>";
        $mensagem = $mensagem;

//CORPO DA MENSAGEM DE COMO SERA NO EMAIL FORMATADO EM HTML
        $corpo = "<strong> Mensagem de Contato Menu Foods </strong><br><br>";
        $corpo .= "<strong> Nome : </strong> $nome";
        $corpo .= "<br><strong> Email: </strong> $site";
        $corpo .= "<br>$message<br>";
        $corpo .= "<br>$mensagem<br>";

        /* A LINHA DO EMAIL DE QUEM ESTA ENVIANDO DEVE SER COM < EMAIL > PARA 
          QUE OS EMAIL DO GMAIL POSSAM SER ENVIADOS TAMBEM */
        $header = "MIME-Version: 1.1\r\n";
        $header .= "Content-Type: text/html; charset = utf-8\r\n";
        $header .= "From: " . "Menu Foods" . "<$para>" . "\r\n";
        $header .= "Return-Path:" . $remetente . "\r\n";
        $header .= "Cc: " . $remetente . "\r\n";
        $header .= "Bcc: " . $remetente . "\r\n";
        $header .= "Reply-To: " . $remetente . "\r\n";

//COMANDO PHP RESPONSAVEL POR ENVIAR OS EMAIL
        mail($para, $assunto, $corpo, $header, $remetente);
//MENSAGEM DE ENVIO DE SUCESSO QUANDO O EMAIL FOR ENVIADO                  
//      header("location:contato.php");        
    }

}
