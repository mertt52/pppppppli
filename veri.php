<?php 
error_reporting(0);
include('lusyapi.php');
$username = $_GET['getir'];
$cookie=" sessionid=50416151894%3AweR0FmsnQUOOcK%3A4";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/'.$username.'');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'Accept-Language: tr-TR,tr;q=0.9',
  'Cookie: '.$cookie.'',
'Referer: https://www.instagram.com/'.$username.'/',
'sec-fetch-dest: document',
'sec-fetch-mode: navigate',
'sec-fetch-site: same-origin',
'sec-fetch-user: ?1',
'user-agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

$result = curl_exec($ch);
$html = str_get_html($result);
$pp=$html->find('meta[property=og:image]', 0)->content; 
$dizi=$html->find('meta[property=og:description]', 0)->content; 
$dizi = explode(' ',trim($dizi));
$m = $dizi[0];
$mm = $dizi[2];
$mmm= $dizi[5]; 

$marks = array(
"takipci"=>$m, 
"takip"=>$mm,
"gonderi"=>$mmm,
"pp"=>$pp
);
 echo json_encode($marks,JSON_UNESCAPED_SLASHES );
?>
