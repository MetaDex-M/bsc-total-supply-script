<?php

$url = "https://api.bscscan.com/api?module=account&action=tokenbalance&contractaddress=YOUR-COIN-CONTRACT-ADDRESS&address=YOUR-BURN-WALLET&tag=latest&apikey=YOUR-API-KEY;";


$curl = curl_init($url);

curl_setopt($curl, CURLOPT_URL, $url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);

$result = json_decode($resp, true);

$val = round($result["result"]/1000000000000000000,6);

echo $val;

?>
