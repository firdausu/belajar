<?php
date_default_timezone_set('Asia/Jakarta');
define('TOKEN_BOT', '6406839120:AAGTxZ1XkvFcJ13xPD0OmFPjy664_01U9ss');
function uuidv4() {
    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
function curl($url, $headers, $mode="get", $data=0)
        {
        if ($mode == "get" || $mode == "Get" || $mode == "GET")
                {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $result = curl_exec($ch);
                }
        elseif ($mode == "post" || $mode == "Post" || $mode == "POST")
                {
                $headers[] = "Content-Length: ".strlen($data);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $result = curl_exec($ch);
                }
        else
                {
                $result = "Not define";
                }
        return $result;
}
function sendTelegramMessage($chatId, $message) {
    $url = "https://api.telegram.org/bot" . TOKEN_BOT . "/sendMessage";
    $postData = http_build_query(array(
        'chat_id' => $chatId,
        'text' => $message
    ));

    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $postData
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    return $result;
}
function decrypt($text,$key,$iv){
return openssl_decrypt(base64_decode($text), 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv);
}
function encrypt($text,$key,$iv){
return base64_encode(openssl_encrypt($text, 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv));
}
function random($i){
    $characters = "abcdef0123456789";
    $length = strlen($characters);
    $randomString = "";

    for ($i2 = 0; $i2 < $i; $i2++) {
        $randomString .= $characters[rand(0, $length - 1)];
    }

    return $randomString;
}
function timer($waktu){
for ($x=$waktu;$x>0;$x--){
echo "\r                                             \r";
echo "Please wait ".$x." second ";
sleep(1);
echo "\r                                             \r";
}
}
$secretkey = md5(chr(104) . chr(51) . chr(94) . chr(37) . chr(52) . chr(126) . chr(115) . chr(120) . chr(106) . chr(108) . chr(115) . chr(100) . chr(57) . chr(49), true);
$iv = chr(0) . chr(1) . chr(2) . chr(3) . chr(4) . chr(5) . chr(6) . chr(7) . chr(8) . chr(9) . chr(10) . chr(11) . chr(12) . chr(13) . chr(14) . chr(15);

$phone = "89609972692";
$akun = [
[
"a" => "050dd79b-1faf-a1e7-ab5e-9e8ca6897c6a",
"b" => "6425ce43e6f2940e",
"uuid" => "d0f46825-c09e-7319-27ca-9c7a039e4249"
],
[
"a" => "a59949aa-0e46-31c7-6641-ab2b9df5388e",
"b" => "361759abedaf734b",
"uuid" => "825fd432-3974-0fb7-fa8c-e2afa38b30b9"
],
[
"a" => "09f15e40-441d-2954-e56f-c3e2a1396d07",
"b" => "9ea3c8c5eba41bdb",
"uuid" => "3984aab5-dc49-4e38-d5c9-53102339c77b"
],
[
"a" => "4fe7f1d6-6134-eb34-d260-adc6743ec549",
"b" => "d268920d58b8592c",
"uuid" => "9fa210be-071b-1df5-795d-19ac7a0c1a7a"
],
[
"a" => "6919e837-2476-0972-96da-40812ec9561a",
"b" => "98cd7277710f5dba",
"uuid" => "3d642d65-1f28-8436-37d6-2b6965a29da8"
],
[
"a" => "7eafcedd-d6d7-8c4a-d24d-72307b40ac81",
"b" => "ffd85a9d609a529d",
"uuid" => "7eb6b22d-9300-6ff6-5bc4-3946f577e3e2"
],
[
"a" => "306225ac-8613-1056-50e7-9c8d1382c9ea",
"b" => "6640f9cc2a335c4a",
"uuid" => "ac962502-e2d7-80ff-ece5-96ae952192b5"
],
[
"a" => "4d53d23e-9d57-c717-76c0-17ca450ae28f",
"b" => "f34a72aabb3983a9",
"uuid" => "56170542-6d8f-ced7-f9f8-45aa29901529"
],
[
"a" => "05026ab5-24f6-cdb2-0a16-d7df5b436563",
"b" => "15661c64bcbfb9d3",
"uuid" => "bfb9547f-c833-c11e-2e9c-c48ff345bec6"
],
[
"a" => "a8b19cc4-961e-b78a-37dc-d8cc28bd14c2",
"b" => "e5a05e5a0c0e3dca",
"uuid" => "dfc9d541-8eaa-4607-4ccb-948813ddc734"
],
[
"a" => "614b2081-842d-57ca-4202-7b480676d7da",
"b" => "661afbe9749f7678",
"uuid" => "5c04da8a-579c-70df-605b-5735f71599a7"
],
[
"a" => "9628f474-c71a-eb5c-ae91-c40f28d825f6",
"b" => "849d0810d9d9d742",
"uuid" => "f8932765-a0a8-3e52-d3a9-989d312fadf4"
],
[
"a" => "6b6a6617-72a4-c31c-95de-5cdfbe8b314a",
"b" => "24d3d0e8deaee873",
"uuid" => "75ecdd4a-32b5-db67-c631-e6c9b8cdeda2"
],
[
"a" => "9bff0efc-a23a-26a3-e3a3-04f1302790d4",
"b" => "0bb40dedf4408582",
"uuid" => "dcb8d457-83a5-b3c4-f1b8-d8a8a7e705a6"
],
[
"a" => "ce236fa5-2348-8678-9f3e-73cd3fd82529",
"b" => "40c944537285b5e3",
"uuid" => "c6f77e57-2cc5-fdf6-4990-9ac3e413cb9f"
],
[
"a" => "e919c146-d26d-4d49-a69b-a325a4c80c3f",
"b" => "c2baedef9efc02e9",
"uuid" => "31da4a8f-550c-02fb-1969-4af7bc95226c"
],
[
"a" => "75aa268e-6372-b0d5-8d82-185dc7801fe1",
"b" => "4e52f798c8cadff7",
"uuid" => "b9482b11-2f22-745e-c357-7a46b2701a1a"
],
[
"a" => "9c3dbcf8-7cf3-920e-197d-c0b5a8936316",
"b" => "836900277cf3d641",
"uuid" => "b0d37c36-6572-bfd6-4d3f-d291b18ad9b6"
],
[
"a" => "e0c56a40-f880-c4d3-16db-83f023c3a810",
"b" => "1810a74c69d8e267",
"uuid" => "655e55f7-86dc-fcb3-12e9-08bc03691c04"
],
[
"a" => "3af8e4ce-2777-0231-1b85-a4e30e277d3d",
"b" => "7c62aaf16b6c9828",
"uuid" => "91c8d1f4-8e09-4e64-edde-741d7243ca74"
],

];
$xx = 1;
while(true){

foreach($akun as $in => $aa){
$uuid = $aa["uuid"];
$anid = $aa["b"];
$token = $aa["a"];

$headers = [
'User-Agent: Android Client',
'Content-Type: application/json;charset=utf-8',
'token: '.$token,
'X-Unity-Version: 2021.3.18f1c1'
];
//echo "[$in] Akun => $token\n";
$data = encrypt('{"location":"ID","macAddress":"","uuid":"'.$token.'","advertisingId":"'.$token.'","product":0,"app_version":"1.1.8","user_channel":"knife","distinct_id":"'.$token.'","deviceId":"'.$token.'","imei":"","anid":"'.$anid.'","oaid":"","idfa":"","idfv":"","status_code":0,"wxTime":0,"country":"ID","version":118,"channel":"knife","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$balance = json_decode(curl('https://game.firstwinner.org/api/app/fc/user/start?'.round(microtime(true) * 1000),$headers,'POST',$data));
$dec = decrypt($balance,$secretkey,$iv);
$json = json_decode($dec);
//var_dump($json);
if($json->code == 200){
$total = $json->data->total;
if($total == 0){
	}else{
echo "[$xx][$in] Akun => $token | $total"."\n";
}


if($total >= 1000){
$data = encrypt('{"phone":"'.$phone.'","country":"ID","version":118,"channel":"knife","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$paylist = json_decode(curl('https://game.firstwinner.org/api/app/fc/pay/coin/paylist?'.round(microtime(true) * 1000),$headers,'POST',$data));
$dec2 = decrypt($paylist,$secretkey,$iv);
$json = json_decode($dec2);
if($json->code == 200){
foreach($json->data as $payliss){
if($total >= $payliss->amount && $payliss->last > 0){
$data = encrypt('{"mail":"bagelgaxxng2003@gmail.com","phone":"'.$phone.'","name":"Asep","amount":'.$payliss->amount.',"country":"ID","currency":"IDR","payment":"DANA","version":118,"channel":"knife","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$person = json_decode(curl('https://game.firstwinner.org/api/app/fc/pay/coin/person?'.round(microtime(true) * 1000),$headers,'POST',$data));
$dec3 = decrypt($person,$secretkey,$iv);
$json = json_decode($dec3);
if($json->code == 200){
$chatId = "1397941074";
$message = "===================\nAndroid ID: $anid\nToken: $token\n"."WD: ".$json->data->credit."\n===================\n";
$response = sendTelegramMessage($chatId, $message);
if ($response === false) {
    echo "Pesan tidak terkirim.\n";
} else {
    echo "Pesan berhasil terkirim.\n";
}
echo "[$in] Credit: ".$json->data->credit." | Status: ".$json->data->status." | Text: ".$json->data->text." | Sisa Balance: ".$json->data->total."\n";
}else{
echo "Withdraw: ".$dec3."\n";
}//person
}//kondisi
}//foreach
}else{
echo "Pay List: ".$dec2."\n";
}
}


}else{
echo "Check Balance: ".$dec."\n";
}


$data = encrypt('{"pkgName":"com.knife.game.happy","imei":"","oaid":"","androidId":"'.$token.'","idfa":"","idfv":"","adKey":"'.random(14).'","adprice":0.999999,"adPlatform":66,"sign":"'.$token.round(microtime(true) * 1000).'","status_code":0,"from":1,"country":"ID","adType":4,"version":118,"channel":"knife","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3SinyalKuatHemat","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$reward = json_decode(curl('https://game.firstwinner.org/api/app/fc/credit/coin?'.round(microtime(true) * 1000),$headers,'POST',$data));
$decs = decrypt($reward,$secretkey,$iv);
$json = json_decode($decs);
//var_dump($json);
if($json->code == 200){
echo "[$xx][$in] Claim Reward: OK - ".$json->data->credit."\n";
}else{
echo "Claim Reward: ".$decs."\n";
}

//timer(1);



}
$xx++;
if($xx % 100 == 0){
	echo exec("clear");
//	banner();
}
}

