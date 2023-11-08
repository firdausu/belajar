<?php
// k778#5555jltm99 blm tau kegunaannya katanya sih aeskey
// https://merge.firstwinner.org/ad/network/kwai/cp sama juga blm tau kegunaannya
date_default_timezone_set('Asia/Jakarta');
define('TOKEN_BOT', '6406839120:AAGTxZ1XkvFcJ13xPD0OmFPjy664_01U9ss');
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
function random($i){
    $characters = "abcdefghijklmnopqrstuvwxyz0123456789";
    $length = strlen($characters);
    $randomString = "";

    for ($i2 = 0; $i2 < $i; $i2++) {
        $randomString .= $characters[rand(0, $length - 1)];
    }

    return $randomString;
}
function randoma($piro){
$txt = substr(str_shuffle("0123456789"),-$piro);
return $txt;
}
function randomb($piro){
$txt = substr(str_shuffle("abcdef0123456789"),-$piro);
return $txt;
}

function uuid() {
    // Generate a random UUID
    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Format the UUID
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
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

/*
$dd = readline("Ok: ");
echo decrypt($dd,$secretkey,$iv)."\n";
sleep(299);
*/
$ud = uuid();
$phone = "81212571925";
$akun = [
[
"a" => "9ffc14e4-5b5e-8e08-d217-6fb4241405ab",
"b" => "62793591e9102903",
"uuid" => "a9f46440-af85-db65-44d8-adf5cb1ad6da"
],
[
"a" => "a383c722-cc83-3d1f-3a4b-95ff18c6d9b9",
"b" => "357ff8073453bfcd",
"uuid" => "65899aad-11f6-c8b9-69e0-af185e4b21df"
],
[
"a" => "78378efd-d7ef-3f45-fe00-9252772fffc9",
"b" => "5e404e650e5de32d",
"uuid" => "3f9f9d55-ef2f-19e7-e0d0-7a9eaa0376ff"
],
[
"a" => "b07ed40e-6cf8-94c3-2e53-5fc99bcc3597",
"b" => "e8224cfbcdd4f7bc",
"uuid" => "378bad18-92a4-f731-dd5b-d75859b44bfe"
],
[
"a" => "28d105c7-ca08-46ee-5cca-03f14734dde9",
"b" => "959ab042c0a7e625",
"uuid" => "df44f339-89cf-fc73-a398-56e880dbfe60"
],
[
"a" => "e7d2cec9-6a96-b83e-266c-2cd58f2b1b39",
"b" => "27af9f3ec88ad12b",
"uuid" => "785f7d25-3606-4477-8deb-f7c268fe4ae5"
],
[
"a" => "894d6b3d-6cf8-4e2e-bd3c-7ecf1a704690",
"b" => "afc2dc48aa7136f5",
"uuid" => "dfce2833-f1f4-a674-5fc1-bccf627d6604"
],
[
"a" => "3eddce67-6b8f-10e7-0c1c-295c4c1813a9",
"b" => "03b3d5a7a51bf1a7",
"uuid" => "c66984db-0e74-ec33-46f7-e6fbf02a17dd"
],
[
"a" => "f2cf0fa3-b48d-b907-6d7e-e4193ac48ff3",
"b" => "fa2842847e48e237",
"uuid" => "7433f63c-2c2f-9dae-84f5-72e48f29fa44"
],
[
"a" => "c62d34e8-6aec-96e5-822c-18fea4c85189",
"b" => "6711aa79919b68c6",
"uuid" => "35a14917-dcf9-c82b-6877-c79eed96cff5"
],
[
"a" => "ef01fed7-9e46-f9e9-2a8c-2629260318d6",
"b" => "6c7720c8804666d1",
"uuid" => "4e74ba79-b08a-780f-a911-de8096730d7f"
],
[
"a" => "510181dd-2d9a-65bd-8e97-218bfb3df9ed",
"b" => "547722e83de33637",
"uuid" => "c9c8b4aa-9a33-42e2-86fd-4892015b7b34"
],
[
"a" => "9377e51f-5f8a-3129-b0f3-c94292b793f8",
"b" => "dd25204067baa112",
"uuid" => "ae7ed8c5-566b-b0ac-e191-e72465c85b20"
],
[
"a" => "094d889d-1df0-3afe-ae80-473050e59112",
"b" => "74a78baa301893a7",
"uuid" => "b82022f4-6794-af76-cfad-89419f3687ff"
],
[
"a" => "6477561a-28d3-ca89-5a57-f71b8412b6c7",
"b" => "fec47e14d328acf8",
"uuid" => "d34ff9e3-f722-7125-26ff-07a2aec6f798"
],
[
"a" => "4d24ac06-6c8b-eb60-ed88-2f41ddfd8f52",
"b" => "1a704b98d475e919",
"uuid" => "f78b3739-61bf-57f5-9548-a9d2fc0396aa"
],
[
"a" => "1d6c8b1c-c478-7881-f159-02c486d4b146",
"b" => "9bc609b9297bfa37",
"uuid" => "6b4d4de3-ae3d-af2c-2b39-f218a1cf8275"
],
[
"a" => "06c4e578-b851-3f79-7cc3-53cb7b458410",
"b" => "f3506bf14e5285aa",
"uuid" => "06373444-9233-f4d9-8828-6f0eb776f964"
],
[
"a" => "f496889f-e385-5f96-a253-86471c78f23a",
"b" => "d3a1d0dbc085e02a",
"uuid" => "8c0b34b0-0ef6-8e30-8240-2cb44f499190"
],
[
"a" => "b22ec614-8e72-edcd-8487-c3d45c5e65f2",
"b" => "54e59de152a51f87",
"uuid" => "ab700320-60f6-f525-d964-0335b69a38f3"
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


$sign = $token.round(microtime(true) * 1000);
$data = encrypt('{"location":"CN","macAddress":"","uuid":"'.$ud.'","advertisingId":"'.$token.'","product":0,"app_version":"1.1.0","user_channel":"default","distinct_id":"'.$token.'","deviceId":"'.$anid.'","imei":"","anid":"'.$anid.'","oaid":"","idfa":"","idfv":"","status_code":0,"wxTime":0,"country":"ID","version":110,"channel":"fruit","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3SinyalKuatHemat","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$balance = json_decode(curl('https://merge.firstwinner.org/api/app/fc/user/start?'.round(microtime(true) * 1000),$headers,'POST',$data));
$dec = decrypt($balance,$secretkey,$iv);
$json = json_decode($dec);
if($json->code == 200){
$total = $json->data->total;
if($total == 0){
	}else{
echo "[$xx][$in] Akun => $token | $total"."\n";
}

if($total >= 1000){
$data = encrypt('{"phone":"'.$phone.'","country":"ID","version":110,"channel":"fruit","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$paylist = json_decode(curl('https://merge.firstwinner.org/api/app/fc/pay/coin/paylist?'.round(microtime(true) * 1000),$headers,'POST',$data));
$dec2 = decrypt($paylist,$secretkey,$iv);
$json = json_decode($dec2);
if($json->code == 200){
foreach($json->data as $payliss){
if($total >= $payliss->amount && $payliss->last > 0){
$data = encrypt('{"mail":"ba'.rand(11111,99999).'@gmail.com","phone":"'.$phone.'","name":"Asep","amount":'.$payliss->amount.',"country":"ID","currency":"IDR","payment":"DANA","version":110,"channel":"fruit","sdkName":"10","sdkVersion":29,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$person = json_decode(curl('https://merge.firstwinner.org/api/app/fc/pay/coin/person?'.round(microtime(true) * 1000),$headers,'POST',$data));
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
//echo "$sign\n";
$data = encrypt('{"pkgName":"com.great.merge.lkfruit.gp","imei":"","oaid":"","androidId":"'.$token.'","idfa":"","idfv":"","adKey":"'.random(7).'","adprice":0.01,"adPlatform":2,"sign":"'.$sign.'","status_code":1,"from":1,"country":"ID","adType":0,"mediation":0,"version":110,"channel":"fruit","sdkName":"11","sdkVersion":30,"isEmulator":0,"isVirtual":0,"isDevelperMode":0,"isRoot":0,"carrierName":"3","carrierCode":"51089","isOpenVpn":0}',$secretkey,$iv);
$reward = json_decode(curl('https://merge.firstwinner.org/api/app/fc/credit/coin?'.round(microtime(true) * 1000),$headers,'POST',$data));
$decs = decrypt($reward,$secretkey,$iv);
$json = json_decode($decs);
//var_dump($json);
if($json->code == 200){
echo "[$xx][$in] Claim Reward: OK - ".$json->data->credit."\n";
}else{
echo "Claim Reward: ".$decs."\n";
}
}
$xx++;
if($xx % 2 == 0){
	echo exec("clear");
//	banner();
}
timer(rand(6,20));
}
