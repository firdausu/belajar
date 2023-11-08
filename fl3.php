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
"a" => "c7678aaf-cf30-1aad-cde9-0ba109198e49",                                                            "b" => "f77c1b9e795d0afa",
"uuid" => "70387ef7-6e95-33a5-2afb-f7cbc85fa432"
],
[
"a" => "6c9baeb6-7510-86a5-9d0a-632933e694d3",
"b" => "3a8fdf5018279137",
"uuid" => "0baaac8a-4e98-93cb-6002-66e5dee0e7dd"
],
[
"a" => "b755d5db-b1ad-c19f-4907-05ce4ddf6f59",
"b" => "d6b2e5c57a86b809",
"uuid" => "29aa9307-e48b-edbd-dbd8-934dc44a8744"
],
[
"a" => "c9654629-d1a0-4d51-da13-1198e2a1336b",
"b" => "096304211d2a3bef",
"uuid" => "a5047bf4-56b6-2649-7ef2-02049ce2100f"
],
[
"a" => "63103916-ccb5-fefd-115f-382df84e7376",
"b" => "cb1cf017eb01d15b",
"uuid" => "cf065af8-e406-32e7-28bd-d2b8cdecdcbc"
],
[
"a" => "b89d634e-07f0-b53f-fe75-6c04847e8a65",
"b" => "90693822ef7c939d",
"uuid" => "6a7801be-06ef-0c96-630c-4873316f906e"
],
[
"a" => "ec3bbdd1-8553-50a5-6586-50b29ecf536d",
"b" => "fa1f4979ac3707f6",
"uuid" => "3b2a3a35-d4a1-cfcb-5236-8b26ffb7dfb4"
],
[
"a" => "4b2f53ac-465f-3110-ee7f-f8b3def3c98b",
"b" => "39e02a475610dc8d",
"uuid" => "fe95bfa7-b2c5-5c9f-5c3e-8e36a9f4606f"
],
[
"a" => "6fcacb1c-5cad-349a-fc92-7513c49f84dc",
"b" => "5527a442e685f184",
"uuid" => "8ad24909-fd2e-0b5d-b8e4-d18434b95745"
],
[
"a" => "ae88873b-b9d7-f9ca-e586-b4d51e7b372e",
"b" => "fc4cbef22ba00ded",
"uuid" => "c0775f4c-3482-3c56-3861-c915929e0414"
],
[
"a" => "964cda5d-9156-77b6-2b1d-86ae027936ed",
"b" => "218cd41627a149eb",
"uuid" => "56ba771a-2f9d-d473-d600-a721520811e6"
],
[
"a" => "c286c583-f409-8527-f9d1-f6af7f8bff69",
"b" => "28c186e4837835fe",
"uuid" => "893af1b6-c6fc-d197-ef3c-74cfb703dfab"
],
[
"a" => "f6fd26ed-626d-c305-8acb-1702e142eef6",
"b" => "d68c9359bdc95961",
"uuid" => "edc12ca8-6061-a62d-5ed1-bc508f272523"
],
[
"a" => "519daeb5-e4ea-f066-e800-dc9d560dca14",
"b" => "7e304e5e282e4506",
"uuid" => "7a5ade75-6123-631b-0b89-97fb9ca43183"
],
[
"a" => "56ed3923-2ec0-0963-dd80-5b8ff1944510",
"b" => "eb6f60144bdca5ff",
"uuid" => "8cde2fd0-d70a-d95f-0bf1-c64456e75500"
],
[
"a" => "20c05e9e-8924-59fa-2bc8-7d75c601694d",
"b" => "35fa4c147abab28f",
"uuid" => "31e5b7c6-7863-2867-d7a2-e3e1404ecec2"
],
[
"a" => "d66b4258-f6ef-0084-affe-d4d3ce8e779c",
"b" => "ef36d665632032fa",
"uuid" => "4662eb66-731c-0f8f-be31-c69711700ee0"
],
[
"a" => "b3c2efd5-4f10-27ee-fdf2-8f470458b697",
"b" => "4933a9d822dc3b2d",
"uuid" => "770bdd20-8c7e-4783-a094-e481dfd43177"
],
[
"a" => "1e5ce150-cff3-8026-2bf4-fc263c035bea",
"b" => "3c3088a7e073d592",
"uuid" => "d93c3c5e-d9ba-5acc-4e11-3f1756a314d4"
],
[
"a" => "2d79faee-461c-0178-945b-121df55e35e7",
"b" => "af74ab06f66d3573",
"uuid" => "efa9a35a-13ea-feca-e4ea-9b7374a359bb"
],
[
"a" => "866fa50f-026f-0ebb-61ff-d0f3761c8621",
"b" => "3f2c3be68a96faf8",
"uuid" => "dbe77f9d-9244-832c-77be-a64183284b07"
],
[
"a" => "d1f07c4e-7e97-ea9a-8a50-f4e76276b95a",
"b" => "88a86a8820a193f9",
"uuid" => "eb9d3317-e8a6-e1f7-f851-52622ec593da"
],
[
"a" => "0b3f5878-f855-25b7-dbdf-4cc946772d50",
"b" => "d32f28fa49d5398b",
"uuid" => "f641e818-2e41-7aa2-4572-c8569c8b397b"
],
[
"a" => "35667aa3-22f9-ec60-0811-23cdaed41fb9",
"b" => "43e73568a7c20ba4",
"uuid" => "f3257bfa-f71c-2336-b3d9-11434a0fba76"
],
[
"a" => "7de97d1e-014c-0105-68d3-3a0da43e3f17",
"b" => "6e743196f9d0778b",
"uuid" => "1050191d-90b6-983f-704a-6ce58aa2c703"
],
[
"a" => "d114ab0c-e554-39de-b26d-c86ae7561372",
"b" => "1372447c77a43139",
"uuid" => "b039d937-ab7d-8cb3-b9e3-764208200550"
],
[
"a" => "b2d36f7b-7f3b-0eb7-c28d-760cc08e1c2f",
"b" => "4e0909cd3158d978",
"uuid" => "506313a2-90f9-e96c-300b-bb4d2cc6ca4f"
],
[
"a" => "689cbf57-792a-d74a-5cda-a04bd52a6435",
"b" => "de5c3728851290a8",
"uuid" => "a95edb34-9192-bed3-e570-6f146936ca32"
],
[
"a" => "f6dca2fb-557d-58ab-6a90-228d0099758b",
"b" => "bce8e308c6241bba",
"uuid" => "d93fa7be-4e1b-5924-0991-93f9a8cc797c"
],
[
"a" => "fff806dc-0393-5981-ed30-8c81fbeae23f",
"b" => "af812d94a17e6c80",
"uuid" => "f8c4b7a2-ff02-05e7-83d7-c16da606061d"
],
[
"a" => "e3e4e027-47fc-4e1d-f22e-73d546ee2ed2",
"b" => "33c35fa41df4fbe7",
"uuid" => "127ccf58-5c79-4220-9762-635e8bfba4f8"
],
[
"a" => "be242fde-2f6a-82a5-a0ab-7d26a16df5a2",
"b" => "048331adc8a6bff3",
"uuid" => "a23d70f7-9e2f-c540-e208-6d389fd7b221"
],
[
"a" => "adace997-4e8e-df54-7d75-93ec09ef040d",
"b" => "9db4a2b8b97d1e0b",
"uuid" => "a4506866-7d60-7af5-8f8c-620f86abe4e8"
],
[
"a" => "37531dfd-9392-4a83-e8d0-d59953d3e92a",
"b" => "5b0192ce0c05e92c",
"uuid" => "a01eeb5c-5deb-634e-9d77-fb422c88b912"
],
[
"a" => "88ba0936-bc75-2262-4a98-da5d37a6cc56",
"b" => "69fb28b0e0aa1468",
"uuid" => "28be5e85-1491-9855-0006-d1661d320511"
],
[
"a" => "2d040631-5ac6-1ff7-082b-85bb535ad3ba",
"b" => "175f0070df8a482c",
"uuid" => "6e05c7b1-3626-9a51-ffad-4115136f904f"
],
[
"a" => "5875327f-9331-de63-d283-18902d93c2fa",
"b" => "874a9b8583b10e3c",
"uuid" => "44d1d29e-7e8e-b0b5-5845-24e26749e21b"
],
[
"a" => "7f4201f7-27d5-d52c-df3b-32569fe3ebea",
"b" => "f2c2977835192238",
"uuid" => "9dc72344-ed2b-6fc3-f176-d89eb402e14b"
],
[
"a" => "1fa8a173-73f2-9a4f-4e92-5f46c790d095",
"b" => "67c5b27ca549fc23",
"uuid" => "5237fed3-0607-5823-f7d0-cfeba1852ba8"
],
[
"a" => "cba9cd2e-4944-b182-432f-c73b558a6655",
"b" => "979cb851e1adf86f",
"uuid" => "cf36ed49-6910-3ce3-e5c2-d42960562f9a"
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
