<?php

include("myhost.php");

/** show all errors! */
ini_set('display_errors', 1);
error_reporting(E_ALL);

 $username="CLIENT_ID11";
 $password="CLIENT_SECRET11";
 $data="grant_type=client_credentials&client_id=".$username."&client_secret=".$password;
 $ch = curl_init();
 curl_setopt ($ch, CURLOPT_URL,"$host/api/token");
 curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
 curl_setopt ($ch, CURLOPT_TIMEOUT, 60);
 curl_setopt ($ch, CURLOPT_USERPWD, "CLIENT_ID11:CLIENT_SECRET11"); 
 curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
 curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);                                                                  
 curl_setopt ($ch, CURLOPT_POST, 1);
 $curlResponse = curl_exec ($ch);
 curl_close($ch);
 $curlResponse = json_decode($curlResponse, TRUE);
 $data = 'access_token='.$curlResponse['access_token'].'&test=test';
// var_dump($curlResponse);
 $ch = curl_init();
 curl_setopt ($ch, CURLOPT_URL,"$host/api/devices?".$data);
 curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
 curl_setopt ($ch, CURLOPT_TIMEOUT, 60);
 curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
 curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);                                                                                                              
 
$result = curl_exec($ch);
 curl_close($ch);
 echo "\n\nclient: ".$result."\n\n";
$i = json_decode($result, TRUE);
//echo  $i->result->dev->device;
var_dump($i);
echo "\n\ndev: ";
echo  $i["result"]["dev"][0]["device"];
echo " \n\n";
