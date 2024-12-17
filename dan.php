<?php
error_reporting(0);

function http_request($url, $method = 'GET', $data = null, $headers = []) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    
    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    if (strtoupper($method) === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        return "cURL Error: $error_msg";
    }
    curl_close($ch);
    return $response;
}

$headers = array(              
        "User-Agent: Mozilla/5.0 (Linux; Android 14) AppleWebKit/537.36 (KHTML, like Gecko) Brave/128.0.6613.99 Mobile Safari/537.36-411",
        "Accept: application/json",
        "origin: chrome-extension://fpdkjdnhkakefebpekbdhillbhonfjjp",
        "authorization: Berear 2056b72d0eb33beb2a6d2d39c67296afa677fc1f271efaf0d84b5d50cd08aee410c07f2f8a6510b58ab067551517964a9b712a207a15ea4f311b2b0364b0fd4b984611c71f23b507f5849dda3bc3833e8402a2ca63bb1db2f59e40362f1aa8b2872666a4406f4c4ceb90424cd68e6032df12e8615129a6d4af62533293e2b16b48d4f3be7b28dc57f11937083008eb063d308b65b7334abd42da159ce8b026b52715e2dd77ac1750796632c1d6f802341672bb55fd215c3494a86b3980219c9a60c7d6b4463bd8294b5e4b9a474f7e871f6b08aafd1ea4907825bbb63337260fc55e7894eccc0dd949580682a696779f",
        "Accept-Language: en-US,en;q=0.5"
    );

while(true):
$url = 'https://www.aeropres.in/chromeapi/dawn/v1/userreward/keepalive?appid=6760b39d3c36601a0576b269';
$data = '{"username":"yamete.kuda.884@gmail.com","extensionid":"fpdkjdnhkakefebpekbdhillbhonfjjp","numberoftabs":0,"_v":"1.1.1"}';
$response = http_request($url, 'POST', $data, $headers);

$res = json_decode($response, true);
//{"success":true,"data":null,"message":"Keep alive recorded"}
// Mengakses nilai POINT
$point = $res['success'];
$st = $res['message'];
if (strpos($st, "alive") !== false) {
echo " success: ".$point." | message: ".$st." \n";
sleep(5);}else{sleep(1);}
endwhile;

?>
