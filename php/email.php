<?php
$to      = $_POST['email'];
$subject = $_POST['assunto'];
$txt     = 'nome: '.$_POST['nome'].'-'.$_POST['mensagem'];
$headers = "From: contato@lerin.com.br" . "\r\n" .
"CC: celio.monteiro.silva@gmail.com";

mail($to,$subject,$txt,$headers);

 echo 'email enviado com sucesso ';

?>