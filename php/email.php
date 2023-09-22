<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type:' . "text/html");

 //$to      = $dados['email'];
 $to = 'contato@lerin.com.br';
 $subject = 'Lerin - Desenvolvimento WEB';
 //$mensagemHTML = 'Nome: - '.$_POST["nome"].'\r\n'.'email: '.$_POST['email'].'\r\n'.'Mesangem: '.'\r\n'.$_POST['mensagem: '];
 $mensagemHTML = 'teste';
 $emailsender = "contato@lerin.com.br";
 $headers = "Content-type: text/html; charset=UTF-8\r\n";
 $headers .= "Return-Path: " . $emailsender . "\r\n"; 
 
 if(!mail($to, $subject, $mensagemHTML, $headers ,"-r".$emailsender)){ // Se for Postfix
     $headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
     mail("celio.monteiro.silva@gmail.com", $subject, $mensagemHTML, $headers );
    
 
 }

echo 'enviado com sucesso!'; 
?>