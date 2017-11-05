<?php

function send($url,$params)
{
    $postData = '';
    //create name value pairs seperated by &
    foreach($params as $k => $v) 
    { 
       $postData .= $k . '='.$v.'&'; 
    }
    $postData = rtrim($postData, '&');
   
    $ch = curl_init();
    
    $token = 'ciao';
    
    $auth = 'Authorization: Bearer ' . $token;
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $auth )); 
    curl_setopt($ch, CURLOPT_POST, count($postData));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
 
}

$res = send('http://dev.services.flatyou.it/test', ['testA'=>'1','testB'=>'2','token'=>'asdasdasd']);
echo $res;

?>
