<?php

//Le as mensagens e seleciona uma aleatoriamente
$url = 'https://api.namefake.com/portuguese-brazil/random/';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$mensagens = curl_exec($curl);
$mensagens = json_decode($mensagens, true);

//Le as mensagens e seleciona uma aleatoriamente
$rand = rand(1, 70);
$url2 = 'https://i.pravatar.cc/'.$rand;

//Le as mensagens e seleciona uma aleatoriamente
$url3 = 'https://positive-vibes-api.herokuapp.com/quotes/random';
$curl3 = curl_init($url3);
curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
$mensagens3 = curl_exec($curl3);
$mensagens3 = json_decode($mensagens3, true);
//Usa o webhook para mandar uma mensagem para o discord
$mensagem = array(
    'content' => $mensagens3["data"],
    'username' => $mensagens["username"],
    'avatar_url' => $url2,
    

    'embeds'=> [[
          'image'=> [
            'url' =>"https://pbs.twimg.com/profile_images/1391846958206226434/DnSna5Fr.jpg"
          
        ]
        ]
    ]
             
);

$url = 'Token do discord Aqui';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($mensagem));
$erro = curl_exec($curl);

var_dump($erro);

?>