<?php

$location = $_GET['location'];

$ch = curl_init('http://api.weatherstack.com/current?access_key=3bb5e9edfff5caa1626e58a6613ff113&query=' . $location);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$json = curl_exec($ch);
curl_close($ch);
header('Content-Type: application/json');
echo $json;


