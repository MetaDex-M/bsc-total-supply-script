<?php
$totalurl = "https://api.bscscan.com/api?module=stats&action=tokenCsupply&contractaddress=YOUR-COIN-CONTRACT-ADDRESS-HERE&apikey=.....YOUR-API-KEY-HERE;";

$curl = curl_init($totalurl);

curl_setopt($curl, CURLOPT_URL, $totalurl);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);

$result = json_decode($resp, true);

$totalsupply = round($result["result"]/1000000000000000000,6);


$burnurl = "https://api.bscscan.com/api?module=account&action=tokenbalance&contractaddress=YOUR-COIN-CONTRACT-ADDRESS-HERE&address=YOUR-COIN-BURN-ADDRESS-HERE&tag=latest&apikey=YOUR-API-KEY-HERE;";


$curl = curl_init($burnurl);

curl_setopt($curl, CURLOPT_URL, $burnurl);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);

$result = json_decode($resp, true);


$burntotal = round($result["result"]/1000000000000000000,6);

$final = $totalsupply - $burntotal;

echo $final;

?>
