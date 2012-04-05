<?php

header('Content-Type: text/plain;charset=utf8');

$url='http://sms.x.baokim.vn/services/api_sms/mt_send';
#$url='http://otp.baokim.local/otpREST/send';

$c = curl_init($url);

global $header;

function writeHeader($curl, $headerStr)
{
	global $header;
	
	$header .= $headerStr;
	
	return strlen($headerStr);
}

curl_setopt_array($c, array(
	#CURLOPT_HEADER		=> true,
	CURLINFO_HEADER_OUT	=> true,
	CURLOPT_HTTPAUTH	=> CURLAUTH_BASIC | CURLAUTH_DIGEST,
	CURLOPT_RETURNTRANSFER	=> true,
	CURLOPT_HEADERFUNCTION	=>	'writeHeader',
	CURLOPT_USERPWD	=>	'otp:GvyoE31nXdqrb2no0jaU',
	CURLOPT_FOLLOWLOCATION=>true,
));

$x = curl_exec($c);

if ($x === false) die(curl_error($c));

$sentHeader = curl_getinfo($c, CURLINFO_HEADER_OUT);

echo '================================= SENT HEADER', "\n";
echo $sentHeader;

echo '================================= RESPONSE HEADER', "\n";
echo $header;

$headers = explode("\r\n\r\n", $header);

echo '<pre>', print_r($headers, true), '</pre>';

echo '================================= RESPONSE', "\n";
echo $x;

var_dump($x);