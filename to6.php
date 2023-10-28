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

#$uuid = uuidv4();
$phone = "81212571925";
#$token = $uuid;
#$token = "5c5b104e-9ea5-4e8f-ae2d-d4ed978bb4db";
#$token = "9d741257-e2b0-4648-a17c-1349368ae2a1";
#$token = uuidv4();
#$anid = random(16);
#echo "Token: $token\n";
$akun = [
[
"a" => "9b3d6f11-f911-bffb-c573-80370b37fc62",
"b" => "0fccdbd8cd6a398b",
"uuid" => "3d437bd8-13ee-6087-1d08-75bbd94c7e2d"
],
[
"a" => "55096db1-f49b-98cd-fa4f-527bba78c35e",
"b" => "afd3a6395a74ca8a",
"uuid" => "3ef81a3a-49e1-792b-a28a-7e084ab42dd2"
],
[
"a" => "f19774d3-30c4-0151-5ccf-fd2eb7cb1b69",
"b" => "6b0d938249002a10",
"uuid" => "c8a1a01d-7d70-bdca-c39d-d84825b82a96"
],
[
"a" => "842826de-a958-f676-5a39-ae71ddcaf771",
"b" => "88a0892d01993757",
"uuid" => "d561f97f-4303-1805-2c90-88238e6310d1"
],
[
"a" => "b84db6b5-d76a-e9be-d8aa-d3405dab32d8",
"b" => "3cea3b6fc327323c",
"uuid" => "bb9582e5-5d50-4c91-47c1-d815171e8f2f"
],
[
"a" => "0e77ae3c-0d52-a61c-a376-d62b354816d6",
"b" => "8b058228a10bfd4d",
"uuid" => "b3ef28e8-fa39-e6f8-eac2-de581ed02877"
],
[
"a" => "55a66bb6-69f7-7c05-a6f2-cfd35071cb83",
"b" => "ad366fd05b220707",
"uuid" => "5dcd02e1-bf38-1a41-7cd3-bdbc4528248a"
],
[
"a" => "8cefff78-3bdb-a75d-97d7-59aae74400a9",
"b" => "a2367c6ea623daf3",
"uuid" => "aa8d3882-b11f-a5e0-b60b-45a75a34c703"
],
[
"a" => "c9fb52d3-3fdb-44a9-fb66-3122be200842",
"b" => "f11280694a5eae14",
"uuid" => "0e2a085a-724a-1657-67ee-78a8401a04d6"
],
[
"a" => "5f273bb7-6faf-a514-f531-eb617a3d1001",
"b" => "d7c04921e2b9458c",
"uuid" => "69e1baea-b6b5-1018-892e-9bd64764f7cb"
],
[
"a" => "eaf8baff-a260-ff04-dddc-7e1851e7e0e1",
"b" => "313a1c05fe2769b5",
"uuid" => "1d1d3cca-57cf-9a5e-d045-45a8c60a16f3"
],
[
"a" => "ebe6bc89-70d6-7876-62ff-1328ef830e95",
"b" => "c5a1406a20dfd733",
"uuid" => "c1e0f405-60fc-d6d2-5503-7799b56bdfd0"
],
[
"a" => "3e0482d3-8048-5f30-08ad-f0cdc95c1bfa",
"b" => "d5a593bc865303c7",
"uuid" => "27a02b94-ae5b-bdf0-4283-3ab754000d35"
],
[
"a" => "516c3fc6-5ee7-920b-afa3-42fc92c0c8a8",
"b" => "9c0c4a657869c559",
"uuid" => "06ffade3-ce99-5d12-5ee6-306a352d2ba8"
],
[
"a" => "f9d6ad76-9e68-9252-6f4e-6d7c32f03600",
"b" => "6e73529945997a3c",
"uuid" => "eca42cb7-6344-95be-e634-5b418abd6dd8"
],
[
"a" => "ca929146-6aaf-6616-9617-5918666be695",
"b" => "a0b506a2455dfbcb",
"uuid" => "cb853463-971c-7d64-b533-71bbdc69750c"
],
[
"a" => "21e9b6db-3b8a-267f-7574-233552b6c08c",
"b" => "4c96652ffa4eebb5",
"uuid" => "9efbd586-6f65-8525-473a-1a8c97a14f07"
],
[
"a" => "7ef32fdf-080d-68f0-4fc5-dece43ed8a72",
"b" => "c166a57b66c6bfcc",
"uuid" => "4fc818e7-a62b-d68d-89b7-306bc64523c6"
],
[
"a" => "a7741427-136f-a87a-b18b-8b7711fa6a72",
"b" => "842924dc8b581593",
"uuid" => "0548ba39-0593-6b10-65ae-348cf052c774"
],
[
"a" => "67b36135-ce5b-9954-b72d-69815d8451dc",
"b" => "fc21df584b102a9e",
"uuid" => "1e72c570-26b2-0cfe-28a7-7430debcf5f7"
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

