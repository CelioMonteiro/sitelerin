<?php 
$user_agent = $_SERVER['HTTP_USER_AGENT'];

function getOS() { 

   global $user_agent;

   $os_platform  =  "SO desconhecido";

   $os_array  =  array(
                        '/windows nt 10/i'     =>  'Windows 10',
                        '/windows nt 6.3/i'     =>  'Windows 8.1',
                        '/windows nt 6.2/i'     =>  'Windows 8',
                        '/windows nt 6.1/i'     =>  'Windows 7',
                        '/windows nt 6.0/i'     =>  'Windows Vista',
                        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                        '/windows nt 5.1/i'     =>  'Windows XP',
                        '/windows xp/i'         =>  'Windows XP',
                        '/windows nt 5.0/i'     =>  'Windows 2000',
                        '/windows me/i'         =>  'Windows ME',
                        '/win98/i'              =>  'Windows 98',
                        '/win95/i'              =>  'Windows 95',
                        '/win16/i'              =>  'Windows 3.11',
                        '/macintosh|mac os x/i' =>  'Mac OS X',
                        '/mac_powerpc/i'        =>  'Mac OS 9',
                        '/linux/i'              =>  'Linux',
                        '/ubuntu/i'             =>  'Ubuntu',
                        '/iphone/i'             =>  'iPhone',
                        '/ipod/i'               =>  'iPod',
                        '/ipad/i'               =>  'iPad',
                        '/android/i'            =>  'Android',
                        '/blackberry/i'         =>  'BlackBerry',
                        '/webos/i'              =>  'Mobile'
                    );

   foreach ($os_array as $regex => $value) { 

       if (preg_match($regex, $user_agent)) {
          $os_platform    =   $value;
       }

   }   

return $os_platform;

}

$user_os = getOS();

function get_client_ip() {
   $ipaddress = '';
   if (isset($_SERVER['HTTP_CLIENT_IP']))
       $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
   else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
       $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
   else if(isset($_SERVER['HTTP_X_FORWARDED']))
       $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
   else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
       $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
   else if(isset($_SERVER['HTTP_FORWARDED']))
       $ipaddress = $_SERVER['HTTP_FORWARDED'];
   else if(isset($_SERVER['REMOTE_ADDR']))
       $ipaddress = $_SERVER['REMOTE_ADDR'];
   else
       $ipaddress = 'UNKNOWN';
   return $ipaddress;
}

$to      = "celio.monteiro.silva@gmail.com";
$subject = "acesso do site";
$txt     = "sistem: ".$user_os." - ip: ".$ipaddress;
$headers = "From: contato@lerin.com.br" . "\r\n" .
"CC: celio.monteiro.silva@gmail.com";

if(mail($to,$subject,$txt,$headers)){
   echo "email enviado";
}



?>