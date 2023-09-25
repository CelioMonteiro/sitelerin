<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type:' . "text/html");

include_once 'conexao.php';

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(!$conn) {
	echo '[{"erro": "Não foi possível conectar ao banco"';
	echo '}]';
 }else {
//SQL de BUSCA LISTAGEM
	$sql = "SELECT * FROM news_restaurante limit 5";
	$result = $conn->query($sql);
	$n =mysqli_num_rows($result);
 
if (!$result) {
 //Caso não haja retorno
	 echo '[{"erro": "Há algum erro com a busca. Não retorna resultados"';
	 echo '}]';
 }else if($n<1) {
 //Caso não tenha nenhum item
	 echo '[{"erro": "Não há nenhum dado cadastrado"';
	 echo '}]';
 }else {
	 //Mesclar resultados em um array
	 for($i = 0; $i<$n; $i++) { 
	 	$dados = $result -> fetch_assoc(); 
        //$to      = $dados['email'];
		$to = 'celio.monteiro.silva@gmail.com';
		$subject = 'Lerin - Desenvolvimento WEB';
    	
		$mensagemHTML = '<!DOCTYPE html><html lang="en"><head><title>Lerin - Desenvolvimento de SITES - WEB - APPs</title><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no"><link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet"><link rel="stylesheet" href="https://lerin.com.br/css/open-iconic-bootstrap.min.css"><link rel="stylesheet" href="https://lerin.com.br/css/style.css"><style>@media (max-width:991.98px){.ftco-navbar-light{background-color:#faebd7!important}}body{background-color:#faebd7!important}.navbar img{width:150px}.ftco-about ul.about-info li span:first-child{color:#ffbd39}</style></head><body><section class="ftco-about img ftco-section ftco-no-pb" id="about-section"><nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar"><div class="container"><img src="https://lerin.com.br/images/logo-small.png"></div></nav></section><section class="ftco-about img ftco-section ftco-no-pb" id="about-section"><div class="container"><a class="navbar-brand" href="index.html">Lerin</a><h2 class="mb-4">Sobre</h2><p>Trabalho com desenvolvimento de sites, sitemas WEB e apps.</p><ul class="about-info mt-4 px-md-0 px-2"><li class="d-flex"><span>Nome:</span><span>Celio Monteiro</span></li><li class="d-flex"><span>Email:</span><span>contato@lerin.com.br</span></li><li class="d-flex"><span>Tel:</span><span><a href="https://api.whatsapp.com/send?phone=5521996418307&text=Converse%20conosco%20pelo%20WhatsApp!%20Estamos%20prontos%20para%20responder%20%C3%A0s%20suas%20perguntas%20e%20ajudar%20com%20seus%20projetos%20web." target="_blank">(21) 996418307</a></span></li></ul><p class="text"><p><a href="images/cv_celio.pdf" target="_blank" class="btn btn-primary py-3 px-3">Download CV</a></p></p></div></section><section class="ftco-section" id="services-section"><div class="container"><h1 class="big big-2">Serviços</h1><p>Soluções<bold>WEB</bold>personalizadas.<br>Desenvolvimento de sites, sistemas e aplicativos para atender suas necessidades.</p><div class="row"><ul><li>Criação de Sites</li><li>Criação de Conteúdo</li><li>Web Developer</li><li>Sistemas WEB</li><li>Redes Sociais</li></ul></div></div></section><footer class="ftco-footer ftco-section"><div class="container"><div class="row"><div class="col-md-12 text-center"><p>Copyright &copy;<script>document.write((new Date).getFullYear())</script>All rights reserved | This template is made with<i class="icon-heart color-danger" aria-hidden="true"></i>by<a href="#" target="_blank">lerin</a></p></div></div></div></footer></body></html>';

		//$mensagemHTML = 'teste';
        $emailsender = "contato@lerin.com.br";
        $headers = "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "Return-Path: " . $emailsender . "\r\n"; 
        
		if(!mail($to, $subject, $mensagemHTML, $headers ,"-r".$emailsender)){ // Se for Postfix
            $headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
            mail("celio.monteiro.silva@gmail.com", $subject, $mensagemHTML, $headers );
           
        
        }
         
        echo $to.' - Enviado com sucesso'. "\r\n"; 
         
        
	 } 

 } 
}
?>
