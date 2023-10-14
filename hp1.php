<?php
date_default_timezone_set('Asia/Jakarta');
define('TOKEN_BOT', '6406839120:AAGTxZ1XkvFcJ13xPD0OmFPjy664_01U9ss');
function banner(){
  echo "
 ▄▄▄██▀▀▀▒█████    ██████   ██████  ██ ▄█▀ ██▓
   ▒██  ▒██▒  ██▒▒██    ▒ ▒██    ▒  ██▄█▒ ▓██▒
   ░██  ▒██░  ██▒░ ▓██▄   ░ ▓██▄   ▓███▄░ ▒██▒
▓██▄██▓ ▒██   ██░  ▒   ██▒  ▒   ██▒▓██ █▄ ░██░
 ▓███▒  ░ ████▓▒░▒██████▒▒▒██████▒▒▒██▒ █▄░██░
 ▒▓▒▒░  ░ ▒░▒░▒░ ▒ ▒▓▒ ▒ ░▒ ▒▓▒ ▒ ░▒ ▒▒ ▓▒░▓  
 ▒ ░▒░    ░ ▒ ▒░ ░ ░▒  ░ ░░ ░▒  ░ ░░ ░▒ ▒░ ▒ ░
 ░ ░ ░  ░ ░ ░ ▒  ░  ░  ░  ░  ░  ░  ░ ░░ ░  ▒ ░
 ░   ░      ░ ░        ░        ░  ░  ░    ░  
                                              
".PHP_EOL;
}
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
function decrypt($text,$key,$iv){
return openssl_decrypt(base64_decode($text), 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv);
}
function encrypt($text,$key,$iv){
return base64_encode(openssl_encrypt($text, 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv));
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
function random($i){
    $characters = "abcdefghijklmnopqrstuvwxyz0123456789";
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

$uuid = uuidv4();
$phone = "89609972692";
$token = $uuid;
#$token = "050d86ac-f09e-4edd-b97d-3ddfb1755269";
$akun = [
[
"a" => "bf1e1153-ffea-df10-96c1-9a20930b9e92",
"b" => "185dfff61b42c46b",
"uuid" => "c58252c1-e99a-bf60-358f-fcf04dd9efb6"
],
[
"a" => "65eab054-a7b0-711f-0706-8c1531d42ea9",
"b" => "31bb34137432be96",
"uuid" => "4024bb0a-cbff-e478-92ac-cc5fd5d1a2c1"
],
[
"a" => "f7be0719-7400-77b1-eb0d-45c9533cb430",
"b" => "1b50a0fc728b694d",
"uuid" => "122e81f5-d1bd-db2e-567a-c803aabe32e5"
],
[
"a" => "00be144d-1500-8050-1a8d-8104bd92b905",
"b" => "de529a6b45149111",
"uuid" => "d3eca3a9-cf73-a56c-a417-09711d3adc6d"
],
[
"a" => "92540ae3-7935-06f5-b606-f8b83c441a53",
"b" => "2a130df5795a56f8",
"uuid" => "0b1a7243-8745-7668-befd-8aae3054d512"
],
[
"a" => "133f455f-ce5c-a135-0f36-570e44f08020",
"b" => "ac3358c0e1d2bf4d",
"uuid" => "942f9a91-e0a6-aa83-f3f1-67684de58982"
],
[
"a" => "4c026dbb-65fa-adb7-8043-2bb965821ff3",
"b" => "aa2874c452dc7ea3",
"uuid" => "d97a0269-4649-9612-5b3c-33deaa025bd0"
],
[
"a" => "e3ba9468-8795-e533-26c8-c40935841549",
"b" => "1a8e06a0d2853629",
"uuid" => "b759e99b-b402-1598-0f01-20c7416d3f67"
],
[
"a" => "ce1a59aa-2f7b-0de3-1beb-499684fdf97e",
"b" => "f81fc66a22378994",
"uuid" => "244b1b12-f133-8913-5db5-4a6c3adb935b"
],
[
"a" => "a072355e-3093-87a1-1011-efc5aa091ce0",
"b" => "4520164c1107d75c",
"uuid" => "d3fd9adc-688c-28d5-8a45-f4913fe49f90"
],
[
"a" => "664ae970-01b6-c0b7-63bf-4a3745713f4d",
"b" => "46927b80c40c3638",
"uuid" => "0fd9e568-106a-bbdf-16f2-b6d43f210ebc"
],
[
"a" => "27eaa8ba-c9b0-4781-1d68-c53f6da82a35",
"b" => "0ee141e4c9c46104",
"uuid" => "357b2b52-2610-912c-7405-20effd1c42da"
],
[
"a" => "44f75757-ceb6-76c8-39ed-87a01d261d72",
"b" => "c3cc7b199c01ab7f",
"uuid" => "732790e4-0f1c-661c-d69a-f07b1cc68093"
],
[
"a" => "d87a2219-daa0-ace9-05ce-774cf814c44e",
"b" => "b8c580d8d22ce131",
"uuid" => "01e5a424-387c-7a5e-7558-531eca9e41cc"
],
[
"a" => "5cd01adb-2bdb-ffca-bae9-eee66364406d",
"b" => "55e008a733307063",
"uuid" => "0b186ea4-ec14-0a0f-b604-f021f8e8a76d"
],
[
"a" => "c2e26c7f-7a5d-b951-f33e-3ff02dee63fa",
"b" => "55f4778967e4c226",
"uuid" => "541afbad-5b39-2028-ff94-9b7c43fbaa84"
],
[
"a" => "96301926-b0ea-17ca-af9b-984d5a79b92c",
"b" => "4cdc5d76c5fa167e",
"uuid" => "77389035-6cb3-72a0-060e-456ff642c31e"
],
[
"a" => "a545f3b2-d0e6-234c-86a0-0d0db08caab0",
"b" => "524181fdc484a945",
"uuid" => "ad1bbd21-b1e9-6ef0-8367-973af95a2b1c"
],
[
"a" => "8c622445-ccbd-2a91-4aad-849552fd07c0",
"b" => "2c02c618dab48d1d",
"uuid" => "68b9a99e-4227-32d6-dd6f-64cdac290c00"
],
[
"a" => "3ef9dcb8-09ec-203c-02d9-507ba07e3c19",
"b" => "4812bac1846ecfee",
"uuid" => "48def234-b83f-e74c-b1a1-99832e2a7876"
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
$data = encrypt('{"location":"ID","macAddress":"","uuid":"'.$token.'","advertisingId":"'.$token.'","product":0,"app_version":"1.0.1","user_channel":"pin","distinct_id":"'.$token.'","deviceId":"'.$token.'","imei":"","anid":"'.$anid.'","oaid":"","idfa":"","idfv":"","status_code":0,"wxTime":0,"country":"ID","version":101,"channel":"pin","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$balance = json_decode(curl('https://game.firstwinner.org/api/app/fc/user/start?'.round(microtime(true) * 1000),$headers,'POST',$data));
$dec = decrypt($balance,$secretkey,$iv);
$json = json_decode($dec);
//var_dump($json);
if($json->code == 200){
$total = $json->data->total;
if($total == 0){
	}else{
echo "[$xx][$in] Balance: ".$total."\n";
}



if($total >= 1000){
$data = encrypt('{"phone":"'.$phone.'","country":"ID","version":101,"channel":"pin","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$paylist = json_decode(curl('https://game.firstwinner.org/api/app/fc/pay/coin/paylist?'.round(microtime(true) * 1000),$headers,'POST',$data));
$dec2 = decrypt($paylist,$secretkey,$iv);
$json = json_decode($dec2);
if($json->code == 200){
foreach($json->data as $payliss){
if($total >= $payliss->amount && $payliss->last > 0){
$data = encrypt('{"mail":"bagelgamming2003@gmail.com","phone":"'.$phone.'","name":"Asep","amount":'.$payliss->amount.',"country":"ID","currency":"IDR","payment":"DANA","version":101,"channel":"pin","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
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


$data = encrypt('{"pkgName":"com.pin.game.happy","imei":"","oaid":"","androidId":"'.$token.'","idfa":"","idfv":"","adKey":"'.random(14).'","adprice":0.999999,"adPlatform":66,"sign":"'.$token.round(microtime(true) * 1000).'","status_code":0,"from":1,"country":"ID","adType":'.rand(1,20).',"version":101,"channel":"pin","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3SinyalKuatHemat","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$reward = json_decode(curl('https://game.firstwinner.org/api/app/fc/credit/coin?'.round(microtime(true) * 1000),$headers,'POST',$data));
$decs = decrypt($reward,$secretkey,$iv);
$json = json_decode($decs);
//var_dump($json);
if($json->code == 200){
echo "[$xx][$in] Claim Reward: OK\n";
}else{
echo "[$xx][$in] Claim Reward: ".$decs."\n";
}

}
$xx++;
if($xx % 100 == 0){
	echo exec("clear");
//	banner();
}
}
