<?php
error_reporting(0);
const
title = "monmonland",
versi ="1.0",
status ="online",
n = "\n";
/* WARNA */
if( PHP_OS_FAMILY == "Linux" || PHP_OS_FAMILY == "Windows"){
	define("b","\033[1;34m");
	define("c","\033[1;36m");
	define("d","\033[0m");
	define("h","\033[1;32m");
	define("k","\033[1;33m");
	define("m","\033[1;31m"); 
	define("p","\033[1;37m");
	define("u","\033[1;35m");
	define("mp","\033[101m\033[1;37m");
	define("pm","\033[107m\033[1;31m");
}else{define("b","");define("c","");define("d","");define("h","");define("k","");define("m","");define("p","");define("u","");define("mp","");define("pm","");}


function Simpan($namadata){
    if(file_exists($namadata)){
        $data = file_get_contents($namadata);
    }else{
        
        $data = readline(p." Input ".$namadata." : ".h);
        file_put_contents($namadata,$data);
    }
    return $data;
}




function curl($url, $post = 0, $httpheader = 0, $proxy = 0){
    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_COOKIE,TRUE);
        #curl_setopt($ch, CURLOPT_COOKIEFILE,"cookie.txt");
        #curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
        if($post){
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        if($httpheader){
            $httpheader[] = 'Host: '.parse_url($url)['host'];
            curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        }
        if($proxy){
            curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
        }
        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch);
        if(!$httpcode) return "Curl Error : ".curl_error($ch); else{
            $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            curl_close($ch);
            return array($header, $body);
        }
    }

function line(){return p.str_repeat('-',50).n;}
function Slow($msg){$slow = str_split($msg);foreach( $slow as $slowmo ){print $slowmo; usleep(70000);}}
function Tmr2($tmr){date_default_timezone_set("UTC");$timr = time()+$tmr;$len = 19;while(true){$ran = rand(1,4);$str = c.str_repeat('•',$ran);print "\r                                                  \r";$res=$timr-time();if($res < 1) {break;}print str_repeat(" ",$len-$ran).c.$str.p.date('H:i:s',$res).c.$str;sleep(1);}}
function Bn(){system("clear");$zone = TimeZone();$tanggal = Date("d-M-Y");$waktu = Date("H:i:s");$panjang = 50-strlen($zone.$tanggal.$waktu);$spasi = floor($panjang/2);$lokasi = c.$zone.str_repeat(" ",$spasi).$tanggal.str_repeat(" ",$spasi).$waktu;if($panjang % 2 == 1){$lokasi .= " ";}print $lokasi.n;print Line();Acssi_calvin(title);print mp.str_pad("SCRIPT BY BINTANG CATUR",50," ",STR_PAD_BOTH).d."\n";print pm.str_pad("THANKS TO IEWIL OFFICIAL",49," ",STR_PAD_BOTH)." ".d."\n";print Line();}function Acssi_calvin($string){$acssi = ["a" => ["┌─┐","├─┤","┴ ┴"],"b" => ["┌┐ ","├┴┐","└─┘"],"c" => ["┌─┐","│  ","└─┘"],"d" => ["┌┬┐"," ││","─┴┘"],"e" => ["┌─┐","├┤ ","└─┘"],"f" => ["┌─┐","├┤ ","└  "],"g" => ["┌─┐","│ ┬","└─┘"],"h" => ["┬ ┬","├─┤","┴ ┴"],"i" => ["┬","│","┴"],"j" => [" ┬"," │","└┘"],"k" => ["┬┌─","├┴┐","┴ ┴"],"l" => ["┬  ","│  ","┴─┘"],"m" => ["┌┬┐","│││","┴ ┴"],"n" => ["┌┐┌","│││","┘└┘"],"o" => ["┌─┐","│ │","└─┘"],"p" => ["┌─┐","├─┘","┴  "],"q" => ["┌─┐ ","│─┼┐","└─┘└"],"r" => ["┬─┐","├┬┘","┴└─"],"s" => ["┌─┐","└─┐","└─┘"],"t" => ["┌┬┐"," │ "," ┴ "],"u" => ["┬ ┬","│ │","└─┘"],"v" => ["┬  ┬","└┐┌┘"," └┘ "],"w" => ["┬ ┬","│││","└┴┘"],"x" => ["─┐ ┬","┌┴┬┘","┴ └─"],"y" => ["┬ ┬","└┬┘"," ┴ "],"z" => ["┌─┐","┌─┘","└─┘"]," "=>[" "," "," "],"1" => ["┬","│","┴"],  "2" => ["┌─┐","┌─┘","└─┘"],  "3" => ["┌─┐"," ├┤","└─┘"],"4" => ["┬ ┬","└─┤","  ┘"],"5" => ["┌─┐","└─┐","└─┘"],"6" => ["┌─┐","├─┐","└─┘"],"7" => ["┌─┐","  │","  ┘"],"8" => ["┌─┐","├─┤","└─┘"],"9" => ["┌─┐","└─┤","└─┘"],"0" => ["┌─┐","│ │","└─┘"]];$x = str_split($string);print " ";foreach($x as $data){print b.$acssi[$data][0];}print b." versi ".m.": ".p.versi.n." ";foreach($x as $data){print c.$acssi[$data][1];}print c." status".m.": ".p.status.n." ";foreach($x as $data){print p.$acssi[$data][2];}print n;}function TimeZone(){$api = json_decode(file_get_contents("http://ip-api.com/json"),1);if($api){$tz = $api["timezone"];date_default_timezone_set($tz);return $api["country"];}else{date_default_timezone_set("UTC");return "UTC";}}
function h($data){
    return [
        'Content-Type: application/json',
        'User-Agent: Dalvik/2.1.0 (Linux; U; Android 10; Infinix X680B Build/QP1A.190711.020)',
        'Host: 92446.playfabapi.com',
        'Connection: Keep-Alive',
        'Content-Length: '.strlen($data)
    ];
}

function post($base, $data = []){
    if(file_exists('auth')){
        $h[] = "X-Authorization: ".file_get_contents('auth');
    }
    $d = json_encode($data);
    $h[] = 'Content-Type: application/json';
    $h[] = 'User-Agent: Dalvik/2.1.0 (Linux; U; Android 10; Infinix X680B Build/QP1A.190711.020)';
    $h[] = 'Host: 92446.playfabapi.com';
    $h[] = 'Connection: Keep-Alive';
    $h[] = 'Content-Length: '.strlen($d);
    return json_decode(curl("https://92446.playfabapi.com/Client/".$base, $d, $h)[1], 1);
}
function luid() {
    $timestamp = date('YmdHis');   
    $randomNumber .= rand((int)100000, 9999999);
    $no = $timestamp . $randomNumber;
    $luid = base64_encode(file_get_contents('auth').$no);
    if(!file_exists('luid')){
        $data = [
            'FunctionName' => 'Login',
            'FunctionParameter' => 
                [
                    'luid' => $luid,
                    'version' => '1.0.5'
                ]
        ];
        post('ExecuteCloudScript', $data);
        file_put_contents('luid.txt', $luid);
    }
    return file_get_contents('luid.txt');
}
function login(){
    $username = Simpan("username");
    $pass = Simpan("password");
    $loginData = [
        "Password" => $pass,
        "TitleId" => 92446,
        "UserName" => $username
    ];
    $r = post("LoginWithPlayFab", $loginData);
    if($r['code'] == 200){
        
        
        file_put_contents('auth', $r['data']['SessionTicket']);
        print h."Login Succes";
        sleep(1);
        print "\r                      \r";
        sleep(1);
    }
}

function get($params){
    $data = [
        'FunctionName' => $params,
        'FunctionParameter' => 
            [
                'luid' => luid()
            ]
    ];
    $r = json_decode(post('ExecuteCloudScript', $data)['data']['FunctionResult'], 1);
    return $r;
}
function game($params){
    $data = [
        'FunctionName' => $params,
        'FunctionParameter' => 
            [
                'luid' => luid(),
                'gameName' => 'woodcutting'
            ]
    ];
    $r = json_decode(post('ExecuteCloudScript', $data)['data']['FunctionResult'], 1);
    return $r;
}
unlink("auth");
if(!file_exists('auth')){
    bn();
    login();
}
$r = json_decode(get('GetProfile')['data']['wallets']['Value'], 1);
print p."balance : ".h.$r['monsterCoin']." monsterCoin".n;

while(true){
    $play = json_decode(game('PlayGame')['data'], 1);
    $time = $play['woodcutting']['unixtime'] - $play['dateNow']['unixtime'];
    print p."Game Name : ".h."Woodcutting".n;
    print p."Status : ".h.$play['woodcutting']['status'].n;
    tmr2($time);
    $claim = game('ClaimRewardsGame');
    print p."Succes Claim Reward ".n;
    $bal = json_decode(get('GetProfile')['data']['wallets']['Value'], 1);
    print p."balance : ".h.$bal['monsterCoin']." monsterCoin".n.n;
    print line();
}
    




