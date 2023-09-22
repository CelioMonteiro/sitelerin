<?php
$to               = 'contato@lerin.com.br';
$subject          = $_POST['assunto'];
$mensagemHTML     = 'nome: '.$_POST['nome']."\r\n"."email: ".$_POST['email']."\r\n".$_POST['mensagem'];

$emailsender = "contato@lerin.com.br";
$headers = "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "Return-Path: " . $emailsender . "\r\n"; 

if(!mail($to, $subject, $mensagemHTML, $headers ,"-r".$emailsender)){ // Se for Postfix
    $headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
    mail($to, $subject, $mensagemHTML, $headers );
    

}
?>