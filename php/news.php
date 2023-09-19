<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type:' . "text/html");

include_once 'conexao.php';

$idUser = $_GET['idUser'];

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
	$sql = "SELECT * FROM news";
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
	 	$dados[] = $result -> fetch_assoc(); 
         $to      = $dados['email'];
         $subject = 'Lerin - Desenvolvimento WEB';
         $txt     = 'Olá, pessoal apaixonado por programação! Gostaria de compartilhar nossa parceria com a Lerin - especialistas em desenvolvimento web. Se você tem projetos incríveis em mente, visite-nos em lerin.com.br. Estamos aqui para tornar suas ideias realidade e elevar seu próximo projeto ao próximo nível!
         https://lerin.com.br';
         $headers = "From: contato@lerin.com.br" . "\r\n" .
         "CC: celio.monteiro.silva@gmail.com";
         
         mail($to,$subject,$txt,$headers);
         if(mail()){
            echo $dados['email'].' - Enviado com sucesso <br>';
         }

	 } 

 	echo json_encode($dados, JSON_PRETTY_PRINT); 
 } 
}
?>
