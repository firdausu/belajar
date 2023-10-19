<?php


function curl($url, $header, $mode="get", $data=0)
	{
	if ($mode == "get" || $mode == "Get" || $mode == "GET")
		{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$result = curl_exec($ch);
		}
		elseif ($mode == "geth" || $mode == "Geth" || $mode == "GETH")
		{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_HEADER,true);
		curl_setopt($ch, CURLOPT_COOKIEJAR, "cooki.txt"); // Simpan cookie ke file
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cooki.txt"); // Gunakan cookie dari file
		$result = curl_exec($ch);
		}
elseif ($mode == "del" || $mode == "Del" || $mode == "DEL")
		{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_HEADER,true);
		$result = curl_exec($ch);
		}
	elseif ($mode == "getcf" || $mode == "Getcf" || $mode == "GETCF")
		{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_COOKIEJAR, '');
curl_setopt($ch, CURLOPT_HEADER, true);
		$result = curl_exec($ch);
		}
	elseif ($mode == "poss" || $mode == "Poss" || $mode == "POSS")
		{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_HEADER, true);
		$result = curl_exec($ch);
		}
    elseif ($mode == "put" || $mode == "PUT" || $mode == "Put")
	   {
		$ch = curl_init($url);
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
         $result = curl_exec($ch);
		}
	elseif ($mode == "post" || $mode == "Post" || $mode == "POST")
		{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$result = curl_exec($ch);
		}
	elseif ($mode == "postc" || $mode == "Postc" || $mode == "POSTC")
		{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_COOKIEJAR, "cooki.txt"); // Simpan cookie ke file
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cooki.txt"); // Gunakan cookie dari file
		$result = curl_exec($ch);
		}
	elseif ($mode == "patch" || $mode == "PATCH" || $mode == "Patch")
	   {
		$ch = curl_init($url);
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
         $result = curl_exec($ch);
		}
	elseif ($mode == "options" || $mode == "Options" || $mode == "OPTIONS")
		{
		$ch = curl_init($url);
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'OPTIONS');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
         $result = curl_exec($ch);
		}
	else
		{
		$result = "Not define";
		}
	return $result;
	}
function IP() {
    $ip_blocks = array("103", "36", "49", "58", "114", "115", "125", "150", "161", "175", "202", "222");
    $ip_prefix = $ip_blocks[array_rand($ip_blocks)];
    $ip_part_2 = rand(0, 255);
    $ip_part_3 = rand(0, 255);
    $ip_part_4 = rand(0, 255);
    $random_ip = "{$ip_prefix}.{$ip_part_2}.{$ip_part_3}.{$ip_part_4}";
    return $random_ip;
    }
function gnum($length) {
    $min = pow(10, $length - 1);
    $max = pow(10, $length) - 1;
    return rand($min, $max);
}
function namax() {
    $jsonData = file_get_contents("https://randomuser.me/api/");
    $data = json_decode($jsonData, true);
    $firstName = $data['results'][0]['name']['first'];
    $lastName = $data['results'][0]['name']['last'];
    $fullName = $firstName . ' ' . $lastName;
    return $fullName;
}


$reff = "LdNPf1697672116";
#$reff = "1Kojh1696890629";
while(true){
//for($i=1;$i<=20;$i++){
$ipk = IP();
$headers = [
"Authorization: INGHHJEGHJEUDFGHYSBW7583546837NUDD75465546",
"Content-Type: application/x-www-form-urlencoded",
"Host: smartjob.amandroidapps.com",
"Connection: Keep-Alive",
"User-Agent: okhttp/5.0.0-alpha.2",
'X-Forwarded-For: '.$ipk,
'X-Forwarded-Host: '.$ipk,
'X-Client-IP: '.$ipk,
'X-Remote-IP: '.$ipk,
'X-Remote-Addr: '.$ipk,
'X-Host: '.$ipk,
];


$dom = [
    "gmail.com",
    "yahoo.com",
    "outlook.com",
    "icloud.com",
    "aol.com",
];
$sign = "https://smartjob.amandroidapps.com/api/user/new/signup";

$pw = gnum(rand(7,9));
$name = namax();
$email = str_replace(" ","",$name).rand(111,999)."@".$dom[array_rand($dom)];
$naw = ["0811", "0812", "0813", "0821", "0822", "0823", "0851", "0852", "0853", "0817", "0818", "0819", "0859", "0877", "0878", "0814", "0815", "0816", "0855", "0856", "0857", "0858", "0881", "0882", "0883", "0884", "0885", "0886", "0887", "0888", "0889", "0895", "0896", "0897", "0898", "0899", "0831", "0832", "0833"];
$no = $naw[array_rand($naw)].gnum(rand(7,9));
$ds = "name=$name&email=$email&contact=$no&password=$pw&country=Indonesia&ref_refferal_code=$reff";
$rs = curl($sign,$headers,"post",$ds);
$js = json_decode($rs);
echo "Email: $email\nPass: $pw\n";
if($js->message == "Successfully Registered"){
echo $js->message."\n";
$id = $js->data->id;
$name = $js->data->name;
    $email = $js->data->email;
    $contact = $js->data->contact;
    $refferal_code = $js->data->refferal_code;
    $balance = $js->data->balance;
    $country = $js->data->country;
    $package_name = $js->data->package_name;
    $package_points_per_day = $js->data->package_ponts_per_day;

}else{
var_dump($js);
}

$url = "https://smartjob.amandroidapps.com/api/user/profile/info";
$data = "user_id=$id";
$res = curl($url,$headers,"post",$data);
$js = json_decode($res);
if ($js->message == "Data Found") {
    $name = $js->data->name;
    $email = $js->data->email;
    $contact = $js->data->contact;
    $balance = $js->data->balance;
    $refferal_balance = $js->data->refferal_balance;
}

//spin
$url = "https://smartjob.amandroidapps.com/api/user/extra/earning/submit";
$data = "user_id=$id&earning_from=3&title=Spin+The+Wheel&points=0.2&website_id=0";
$res = curl($url,$headers,"post",$data);
$js = json_decode($res);
echo $js->message."\n";
$endpoint = 'https://api.chaingateway.io/v2/tron/addresses';

$headers = [
    'Accept: application/json',
    'Authorization: ghl2ckd080gck0oo8g48cgwk84k8kggsckscg4kwgo8848oggw80k8kc8ckswgg4',
];

$ch = curl_init($endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
}

curl_close($ch);


$data = json_decode($response, true);

if ($data['status'] === 200) {
    $privateKey = $data['data']['privateKey'];
    $address = $data['data']['address'];
    $hexAddress = $data['data']['hexAddress'];

    echo "Private Key: $privateKey\n";
    echo "Address: $address\n";
    echo "Hex Address: $hexAddress\n";
} else {
    echo "Error: {$data['message']}\n";
}
$cukuru = "$id|$email|$name|$address|$privateKey";
file_put_contents('akunclickpower.txt', $cukuru . PHP_EOL, FILE_APPEND);
//website get

$endpoint = 'https://smartjob.amandroidapps.com/api/get/website/link';

$data = array(
    'user_id' => $id
);

$headers = array(
    'Authorization: INGHHJEGHJEUDFGHYSBW7583546837NUDD75465546',
    'Content-Type: application/x-www-form-urlencoded',
    'Content-Length: ' . strlen(http_build_query($data)),
    'Host: smartjob.amandroidapps.com',
    'Connection: Keep-Alive',
    'User-Agent: okhttp/5.0.0-alpha.2'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Kesalahan cURL: ' . curl_error($ch);
}

curl_close($ch);

$js = json_decode($response,true);
//var_dump($js);
foreach($js["data"] as $ucu){
	$idi = $ucu["id"];
$url = "https://smartjob.amandroidapps.com/api/user/extra/earning/submit";
$data = "user_id=$id&earning_from=5&title=Web+Surfing&points=0.4&website_id=$idi";
$res = curl($url,$headers,"post",$data);
$js = json_decode($res);
    }
$url = "https://smartjob.amandroidapps.com/api/user/profile/info";
$data = "user_id=$id";
$res = curl($url,$headers,"post",$data);
$js = json_decode($res);
if ($js->message == "Data Found") {
    $name = $js->data->name;
    $email = $js->data->email;
    $contact = $js->data->contact;
    $balance = $js->data->balance;
    $refferal_balance = $js->data->refferal_balance;
    $spin_count = $js->data->spin_count;
}

echo "Balance: $balance\n";

}

