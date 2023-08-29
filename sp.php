<?php
date_default_timezone_set('Asia/Jakarta');
include "allfunc.php";

function countdownToNoon($targetTime) {
  while (true) {
    $now = microtime(true);
    $noon = strtotime('today ' . $targetTime);
    if ($now <= $noon) {
      $diff_sec = $noon - $now;
      $diff_ms = ($diff_sec - floor($diff_sec)) * 1000;
      $diff_sec = floor($diff_sec);
      $diff_hour = floor($diff_sec / 3600);
      $diff_min = floor(($diff_sec % 3600) / 60);
      $diff_sec = $diff_sec % 60;
      echo "\rWaktu tersisa: " . sprintf("%02d:%02d:%02d.%03d", $diff_hour, $diff_min, $diff_sec, $diff_ms);
    } else {
      echo "\rSedang EKSEKUSI\n";
      echo "Eksekusi\n";
      echo "\n";
      break;
    }
  }
}

function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
    return $hasil_rupiah;
}

function banner($username, $nomor, $email){
  if(isset($username)){
  echo "
 ▄▄▄██▀▀▀▒█████    ██████   ██████  ██ ▄█▀ ██▓ ".$username."
   ▒██  ▒██▒  ██▒▒██    ▒ ▒██    ▒  ██▄█▒ ▓██▒ ".$nomor."
   ░██  ▒██░  ██▒░ ▓██▄   ░ ▓██▄   ▓███▄░ ▒██▒ ".$email."
▓██▄██▓ ▒██   ██░  ▒   ██▒  ▒   ██▒▓██ █▄ ░██░
 ▓███▒  ░ ████▓▒░▒██████▒▒▒██████▒▒▒██▒ █▄░██░
 ▒▓▒▒░  ░ ▒░▒░▒░ ▒ ▒▓▒ ▒ ░▒ ▒▓▒ ▒ ░▒ ▒▒ ▓▒░▓  
 ▒ ░▒░    ░ ▒ ▒░ ░ ░▒  ░ ░░ ░▒  ░ ░░ ░▒ ▒░ ▒ ░
 ░ ░ ░  ░ ░ ░ ▒  ░  ░  ░  ░  ░  ░  ░ ░░ ░  ▒ ░
 ░   ░      ░ ░        ░        ░  ░  ░    ░  
                                              
".PHP_EOL;
}else{
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
}

function cekAkun($coo){
  $url = "https://mall.shopee.co.id/api/v4/account/basic/get_account_info";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $headers = array(
      "Host: mall.shopee.co.id",
      "referer: https://mall.shopee.co.id",
      "x-api-source: rn",
      "if-none-match: 55b03-f817549187b84ec122f04bd59e22e1f2",
      "x-shopee-client-timezone: Asia/Jakarta",
      "cookie: $coo",
      "user-agent: Android app Shopee appver=30405 app_type=1",
      "af-ac-enc-dat:",
      "af-ac-enc-id:",
      "af-ac-enc-sz-token:"
  );
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $response = curl_exec($ch);
  curl_close($ch);
  $js = json_decode($response);
  $info = array();
  if ($js->error == 0) {
      $info['username'] = $js->data->username;
      $info['nomor'] = $js->data->phone;
      $info['email'] = $js->data->email;
      $info['status'] = "Akun Ditemukan...";
  } else {
      $info['status'] = "Akun Tidak Ditemukan...";
  }
  return $info;
}


function cekUrl($coo,$itemid,$shopid){
	$uvue = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 32);
  $url = "https://shopee.co.id/api/v4/item/get?itemid=" . $itemid . "&shopid=" . $shopid;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $headers = array(
    "Host: shopee.co.id",
    "X-Shopee-Language: id",
    "If-None-Match-: 8001",
    'Sec-Ch-Ua: \"; Not A Brand\";v=\"99\", \"Chromium\";v=\"94\"',
    "Sec-Ch-Ua-Mobile: ?0",
    "X-API-SOURCE: pc",
    "Accept: application/json",
    "Origin: https://shopee.co.id",
    "Sec-Fetch-Site: same-origin",
    "Sec-Fetch-Mode: cors",
    "Sec-Fetch-Dest: empty",
    "Referer: https://shopee.co.id",
    "user-agent: Android app Shopee appver=29313 app_type=1",
    "Accept-Language: en-GB,en-US;q=0.9,en;q=0.8",
    "X-CSRFToken: ",
    "Cookie: $coo"
  );
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
  $response = curl_exec($ch);
  curl_close($ch);
  $js = json_decode($response);
  $info = array();
  if ($js->error == null) {
    $info['noba'] = $js->data->models;
    $info['data'] = $js->data;
  }else{
    $info['noba'] = "erorr";
  }
  return $info;
}


function cekJalan($coo){
  $url = "https://mall.shopee.co.id/api/v4/account/address/get_user_address_list";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $headers = array(
      "Host: mall.shopee.co.id",
      "referer: https://mall.shopee.co.id",
      "x-api-source: rn",
      "if-none-match: 55b03-f817549187b84ec122f04bd59e22e1f2",
      "x-shopee-client-timezone: Asia/Jakarta",
      "cookie: $coo",
      "user-agent: Android app Shopee appver=30405 app_type=1",
      "af-ac-enc-dat:",
      "af-ac-enc-id:",
      "af-ac-enc-sz-token:"
  );
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $response = curl_exec($ch);
  curl_close($ch);
  $js = json_decode($response);
  return $js->data->addresses;
}

a:
echo exec("clear");
$username = "";
$nomor = "";
$email = "";
banner($username, $nomor, $email);
$cookie = readline("Cookie -> ");
$acc = cekAkun($cookie);
if($acc['status'] == "Akun Ditemukan..."){
  echo exec("clear");
  $username = $acc['username'];
  $nomor = $acc['nomor'];
  $email = "";
  if($acc['email'] == ""){
    //echo "Email -> Tidak Ada\n";
  }else{
    //echo "Email -> ".$acc['email']."\n"; 
  }  
  banner($username, $nomor, $email);
}else{
  echo "Status -> ".$acc['status']."\n";
  goto a;
}
$home = cekJalan($cookie);

$badd = [];
foreach ($home as $index => $address) {
    $id = $address->id;
    $userid = $address->userid;
    $name = $address->name;
    $phone = $address->phone;
    $state = $address->state;
    $city = $address->city;
    $addressStr = $address->address;
    $zipcode = $address->zipcode;
    $district = $address->district;
    $badd[$index] = $address;
    
    echo "$index | $id - $name\n";
    echo "$addressStr\n";
    echo "$zipcode\n";
    
}
d:
$selectAlamat = readline("\rSelect item index (0 to " . (count($badd) - 1) . "): ");
if (isset($badd[$selectAlamat])) {
    $address = $badd[$selectAlamat];
    $aaid = $address->id;
    $userid = $address->userid;
    $nalamat = $address->name;
    $phone = $address->phone;
    $state = $address->state;
    $city = $address->city;
    $addressStr = $address->address;
    $zipcode = $address->zipcode;
    $district = $address->district;
    echo "Alamat -> $addressStr\n\n";
} else {
    echo "\rAlamat Not Found\n";
    goto d;
}

b:
$url = readline("\rUrl Barang -> ");
if (strpos($url, "shope.ee") !== false) {
  $command = 'curl '.$url.' -s';
  $output = shell_exec($command);
  preg_match('/<a href="([^"]+)">Moved Permanently<\/a>/', $output, $matches);
  if (isset($matches[1])) {
    $href = htmlspecialchars($matches[1]);
    $aaa = explode("product/",$href)[1];
    $aab = explode("/",$aaa);
    $aac = explode("?",$aab[1])[0];
    $aab = explode("/",$aaa)[0];
    $itemid = $aac;
    $shopid = $aab;
  } else {
    echo "Tautan tidak ditemukan" . PHP_EOL;
    goto b;
  }
  
} else {
  $parts = explode('.', $url);
  $shopid = isset($parts[3]) ? $parts[3] : "";
  $itemid = isset($parts[4]) ? $parts[4] : "";
}
// echo $shopid."\n";
// echo $itemid."\n";
$ireng = [];
$cekbarang = cekUrl($cookie, $itemid, $shopid);

foreach ($cekbarang["noba"] as $index => $item) {
    $ireng[$index] = $item;
    $iid = $item->itemid;
    $mid = $item->modelid;
    
    $name = $item->name;
    $price = $item->price;
    echo "$index | $iid - $mid\n";
    echo "Name: $name\n";
    echo "Price: ".rupiah($price/100000)."\n";
}
$img = $cekbarang["data"]->image;
$shopid = $cekbarang["data"]->shopid;
$uidd = $cekbarang["data"]->userid;
c:
$selectedIndex = readline("\rSelect item index (0 to " . (count($ireng) - 1) . "): ");
if (isset($ireng[$selectedIndex])) {
    $bire = $ireng[$selectedIndex];
    $iid = $bire->itemid;
    $mid = $bire->modelid;
    $name = $bire->name;
    $price = $bire->price;
    echo "Barang -> $name\n\n";
} else {
    echo "\rItem Not Found\n";
    goto c;
}


$ch = curl_init();
$headers = array(
    "Host: shopee.co.id",
    "x-shopee-language: id",
    "x-requested-with: XMLHttpRequest",
    "if-none-match-: 55b03-4c4d52b19209c9a2b9e6331e068bb819",
    "user-agent: Mozilla/5.0 (Linux; Android) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/55.0.2883.91 Mobile Safari/537.36",
    "x-api-source: rweb",
    "accept: */*",
    "sec-fetch-site: same-origin",
    "sec-fetch-mode: cors",
    "sec-fetch-dest: empty",
    "referer: https://shopee.co.id/",
    "accept-language: en-US,en;q=0.9,id-ID;q=0.8,id;q=0.7",
    "cookie: $cookie"
);
$ura = "https://shopee.co.id/api/v4/pdp/get_shipping?buyer_zipcode=&city=".urlencode(trim($city))."&district=$district&itemid=$iid&shopid=$shopid&state=$state&town=";
curl_setopt($ch, CURLOPT_URL, $ura);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}
curl_close($ch);
$js = json_decode($response);
$hargao = $js->data->ungrouped_channel_infos;
$ongk = [];
foreach($hargao as $index => $hago){
	
	$ongk[$index] = $hago;
	$cio = $hago->channel_id;
	$nao = $hago->name;
	$hoa = $hago->price_before_discount;
	if($hoa == ""){
		
		}else{
	echo "$index | $nao\n";
	echo "Name -> $nao\n";
	echo "Harga -> $hoa\n";
	}
}

$selectKurir = readline("\rSelect item index (0 to " . (count($ongk) - 1) . "): ");
if (isset($ongk[$selectKurir])) {
    $oang = $ongk[$selectKurir];
    $cio = $oang->channel_id;
	$nao = $oang->name;
	$hoa = $oang->price_before_discount;
    echo "Kurir -> $nao\n\n";
} else {
    echo "\rItem Not Found\n";
    goto c;
}
$pricm = readline("Price FS: ");
$prica = $pricm * 10000;
$targetTime = readline("Jam FS(format: HH:mm:ss.uuu): ");
if($targetTime == ""){
	goto bb;
}
countdownToNoon($targetTime);
bb:
$headers = [
    'Host: mall.shopee.co.id',
    'x-api-source: rn',
    'x-shopee-language: id',
    'referer: https://mall.shopee.co.id',
    'accept: application/json',
    'shopee_http_dns_mode: 1',
    'content-type: application/json',
    'if-none-match-: 55b03-9bfdeee627b0d7ee3e5d45f614f77a8d',
    'cookie: $cookie',
    'user-agent: Android app Shopee appver=30405 app_type=1',
    'af-ac-enc-dat:',

];
$url = "https://mall.shopee.co.id/api/v4/pdp/cart_panel/get";
$data = '{"item_id":'.$iid.',"shop_id":'.$shopid.',"model_id":null,"selected_tiers":null,"quantity":1,"method":2,"use_group_buy":false,"is_group_buy_new_group":false,"selected_spl":null,"has_voucher":true,"state":"'.$state.'","city":"'.$city.'","district":"'.$district.'","town":"","buyer_zipcode":'.$zipcode.'}';
$res = curl($url,$headers,"post",$data);
//echo $res."\n";
$url = "https://mall.shopee.co.id/api/v4/pdp/cart_panel/select_variation";
$data = '{"item_id":'.$iid.',"shop_id":'.$shopid.',"model_id":'.$mid.',"quantity":1,"use_group_buy":false,"method":2,"selected_spl":null,"has_voucher":true,"state":"'.$state.'","city":"'.$city.'","district":"'.$district.'","town":"","buyer_zipcode":'.$zipcode.'}';
$res = curl($url,$headers,"post",$data);
//echo $res."\n";


aa:
$ch = curl_init();

$headers = array(
    "Host: mall.shopee.co.id",
    "x-api-source: rn",
    "x-shopee-language: id",
    "referer: https://mall.shopee.co.id",
    "accept: application/json",
    "x-csrftoken: ",
    "if-none-match-: 55b03-d34ca615d24bc1d9667e2d00ef1553c2",
    "shopee_http_dns_mode: 1",
    "content-type: application/json",
    "cookie: $cookie",
    "user-agent: Android app Shopee appver=30405 app_type=1"
);

$data = '{"promotion_data":{"auto_apply_shop_voucher":true,"use_coins":false,"free_shipping_voucher_info":{},"platform_vouchers":[],"shop_vouchers":[],"check_shop_voucher_entrances":true},"shoporders":[{"shop":{"shopid":'.$shopid.'},"items":[{"itemid":'.$iid.',"modelid":'.$mid.',"quantity":1,"insurances":[]}]}],"cart_type":1,"client_id":5}';
curl_setopt($ch, CURLOPT_URL, "https://mall.shopee.co.id/api/v4/checkout/get_quick");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}
curl_close($ch);
$js = json_decode($response);
$sname = $js->shoporders[0]->shop->shop_name;

$url = "https://mall.shopee.co.id/api/v4/checkout/get";
$data = '{"shoporders":[{"shop":{"shopid":'.$shopid.'},"items":[{"itemid":'.$iid.',"modelid":'.$mid.',"quantity":1,"insurances":[]}]}],"selected_payment_channel_data":{},"promotion_data":{"use_coins":false,"free_shipping_voucher_info":{},"platform_vouchers":[],"shop_vouchers":[],"check_shop_voucher_entrances":true,"auto_apply_shop_voucher":false},"fsv_selection_infos":[],"device_info":{"device_id":"","device_fingerprint":"","device_sz_fingerprint":"","tongdun_blackbox":"td_disable_for_ID","buyer_payment_info":{"is_jko_app_installed":false}},"cart_type":1,"client_id":5,"tax_info":{"tax_id":""},"client_event_info":{"is_fsv_changed":false,"is_platform_voucher_changed":false},"_cft":[40042367]}';
$res = curl($url,$headers,"post",$data);
$js = json_decode($res);
$mcut = $js->checkout_price_data->merchandise_subtotal;
$tis = $js->timestamp;
$tpay = $js->checkout_price_data->total_payable;
$sst = $js->checkout_price_data->shipping_subtotal;
$sota = $js->shoporders[0]->shop->shop_tag;
$sona = $js->shoporders[0]->shop->shop_name;
$soid = $js->shoporders[0]->shop->seller_user_id;
$shopid = $js->shoporders[0]->shop->shopid;
$monam = $js->shoporders[0]->items[0]->model_name;
$logip = $js->shipping_orders[0]->selected_logistic_channelid;
$timezone = new DateTimeZone('Europe/London');
$datetime = new DateTime('now', $timezone);
//$tis = $datetime->getTimestamp();
$daid = "";
if($mcut < $prica){
	echo "\rNow: $mcut\n\n";
$headers = array(
   "Host: mall.shopee.co.id",
   "x-api-source: rn",
   "referer: https://mall.shopee.co.id",
   "accept: application/json",
   "x-csrftoken: ",
   "if-none-match-: 55b03-3f42f4cfce0cbe98c4b77b3c5725a3b8",
   "x-shopee-client-timezone: Asia/Jakarta",
   "Content-Type: application/json",
   "cookie: $cookie",
   "user-agent: Android app Shopee appver=30405 app_type=1",
   "af-ac-enc-dat: ",
   "af-ac-enc-id: ",
   "af-ac-enc-sz-token: ",
   "x-sap-access-t: ",
   "x-sap-access-s: ",
   "x-sap-access-f: ",
);

$url = "https://mall.shopee.co.id/api/v4/checkout/place_order";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"client_id":8,"cart_type":1,"timestamp":'.$tis.',"checkout_price_data":{"merchandise_subtotal":'.$mcut.',"shipping_subtotal_before_discount":'.$sst.',"shipping_discount_subtotal":0,"shipping_subtotal":'.$sst.',"tax_payable":0,"tax_exemption":0,"iof_amount":0,"custom_tax_subtotal":0,"promocode_applied":null,"credit_card_promotion":null,"shopee_coins_redeemed":null,"group_buy_discount":0,"bundle_deals_discount":null,"price_adjustment":null,"buyer_txn_fee":0,"buyer_service_fee":0,"insurance_subtotal":0,"insurance_before_discount_subtotal":0,"insurance_discount_subtotal":0,"vat_subtotal":0,"total_payable":'.$tpay.'},"order_update_info":{},"dropshipping_info":{"enabled":false,"name":"","phone_number":""},"promotion_data":{"can_use_coins":false,"use_coins":false,"platform_vouchers":[],"free_shipping_voucher_info":{"free_shipping_voucher_id":0,"free_shipping_voucher_code":"","disabled_reason":null,"disabled_reason_code":0,"banner_info":{"msg":"","learn_more_msg":""},"required_be_channel_ids":[],"required_spm_channels":[]},"highlighted_platform_voucher_type":2,"platform_voucher_entrance_msg":"Klik untuk gunakan Voucher","shop_voucher_entrances":[{"shopid":'.$shopid.',"status":true}],"applied_voucher_code":null,"voucher_code":null,"voucher_info":{"coin_earned":0,"voucher_code":null,"coin_percentage":0,"discount_percentage":0,"discount_value":0,"promotionid":0,"reward_type":0,"used_price":0},"invalid_message":"","price_discount":0,"coin_info":{"coin_offset":0,"con_used":0,"coin_earn_by_voucher":0,"coin_earn":0},"card_promotion_id":null,"card_promotion_enabled":false,"promotion_msg":""},"selected_payment_channel_data":{"version":2,"option_info":"","channel_id":8005200,"channel_item_option_info":{"option_info":"89052007"},"text_info":{}},"shoporders":[{"shop":{"shopid":'.$shopid.',"shop_name":"","cb_option":false,"is_official_shop":false,"remark_type":0,"support_ereceipt":false,"shop_ereceipt_type":0,"seller_user_id":'.$soid.',"shop_tag":'.$sota.'},"items":[{"itemid":'.$iid.',"modelid":'.$mid.',"quantity":1,"item_group_id":null,"insurances":[],"shopid":'.$shopid.',"shippable":true,"non_shippable_err":"","none_shippable_reason":"","none_shippable_full_reason":"","price":'.$mcut.',"name":"","model_name":"'.$monam.'","add_on_deal_id":0,"is_add_on_sub_item":false,"is_pre_order":false,"is_streaming_price":false,"image":"","checkout":true,"categories":[{"catids":[]}],"is_spl_zero_interest":false,"is_prescription":false,"channel_exclusive_info":{"source_id":0,"token":"","is_live_stream":false,"is_short_video":false},"offerid":0,"supports_free_returns":false}],"tax_info":{"use_new_custom_tax_msg":false,"custom_tax_msg":"","custom_tax_msg_short":"","remove_custom_tax_hint":false,"help_center_url":""},"tax_payable":0,"iof_amount":0,"shipping_id":1,"shipping_fee_discount":0,"shipping_fee":'.$sst.',"order_total_without_shipping":'.$mcut.',"order_total":'.$tpay.',"buyer_remark":null,"ext_ad_info_mappings":[]}],"shipping_orders":[{"shipping_id":1,"shoporder_indexes":[0],"selected_logistic_channelid":'.$logip.',"buyer_address_data":{"addressid":'.$aaid.',"address_type":0,"tax_address":"","is_buyer_address_changed":false},"fulfillment_info":{"fulfillment_flag":64,"fulfillment_source":"","managed_by_sbs":false,"order_fulfillment_type":2,"warehouse_address_id":0,"is_from_overseas":false},"order_total":'.$tpay.',"order_total_without_shipping":'.$mcut.',"selected_logistic_channelid_with_warning":null,"shipping_fee":'.$sst.',"shipping_fee_discount":0,"shipping_group_description":"","shipping_group_icon":"","tax_payable":0,"is_fsv_applied":false,"shipping_discount_type":0,"prescription_info":{"images":[],"required":false,"max_allowed_images":5},"iof_amount":0,"selected_preferred_delivery_time_option_id":0,"sync":true}],"fsv_selection_infos":[],"buyer_info":{"kyc_info":null,"checkout_email":""},"client_event_info":{"is_platform_voucher_changed":false,"is_fsv_changed":false},"buyer_txn_fee_info":{"title":"Biaya Penanganan","description":"Biaya penanganan untuk transaksi ini adalah Rp0. Dapatkan bebas biaya penanganan dengan menggunakan metode pembayaran ShopeePay & SeaBank.","learn_more_url":"https://shopee.co.id/events3/code/634289435/"},"disabled_checkout_info":{"description":"","auto_popup":false,"error_infos":[]},"can_checkout":true,"buyer_service_fee_info":{"learn_more_url":"https://shopee.co.id/m/biaya-layanan"},"iof_info":{"iof_msg":"In International purchases, IOF will be applied as a mandatory collection required by the Federal Government","learn_more_url":""},"add_to_cart_info":{},"ignored_errors":[0],"ignore_warnings":false,"captcha_version":1,"captcha_signature":"","captcha_id":"","device_info":{"device_id":"e5d2f8e8-3be8-40f7-b39d-0f73e8afea4b","device_fingerprint":"","device_sz_fingerprint":"GK/QaHFI7MEWO0mdO1niVQ==|p3s8GfgnhoYw1tDvJkzZyUCBoMREsx332yC3cJUB4Gk8q8ZdFMADS9JMGUuunAJsINumbmlpcEVGzjwPlaelJw==|gPjHQlIFDQ1/Mesw|08|1","tongdun_blackbox":"","buyer_payment_info":{"is_jko_app_installed":false},"gps_location_info":{"status":0,"latitude":null,"longitude":null}},"device_type":"mobile","_cft":[67043199]}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

}else{
	echo "\rBELOM FS";
	goto aa;
	
	}



function input($text) {
    echo $text;
    $a = trim(fgets(STDIN));
    return $a;
}

function color($text, $color = "default")
{
    $arrayColor = array(
        'blu' => '36',
        'redd' => '31',
        'yel' => '33',
        'grey'      => '1;30',
        'red'       => '1;31',
        'green'     => '1;32',
        'yellow'    => '1;33',
        'blue'      => '1;34',
        'purple'    => '1;35',
        'nevy'      => '1;36',
        'white'     => '1;0',
    );
    return "\033[".$arrayColor[$color]."m".$text."\033[0m";
}

function randoma($piro){
$txt = substr(str_shuffle("0123456789"),-$piro);
return $txt;
}
function randomb($piro){
$txt = substr(str_shuffle("abcdef0123456789"),-$piro);
return $txt;
}
function randomc($piro){
$txt = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"),-$piro);
return $txt;
}
function randomd($piro){
$txt = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"),-$piro);
return $txt;
}
function randome($piro){
$txt = substr(str_shuffle("#$@&"),-$piro);
return $txt;
}
function randomf($piro){
$txt = substr(str_shuffle("ABCDEF0123456789"),-$piro);
return $txt;
}
function randomg($piro){
$txt = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"),-$piro);
return $txt;
}
function randomh($piro){
$txt = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+-_"),-$piro);
return $txt;
}
function randomi($piro){
$txt = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"),-$piro);
return $txt;
}
function nama()
	{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://ninjaname.horseridersupply.com/indonesian_name.php");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$ex = curl_exec($ch);
	// $rand = json_decode($rnd_get, true);
	preg_match_all('~(&bull; (.*?)<br/>&bull; )~', $ex, $name);
	return $name[2][mt_rand(0, 14) ];
	}
function getUserAgent()
{
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/604.3.5 (KHTML, like Gecko) Version/11.0.1 Safari/604.3.5";
	$userAgentArray[] = "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.89 Safari/537.36 OPR/49.0.2725.47";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/604.4.7 (KHTML, like Gecko) Version/11.0.2 Safari/604.4.7";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.13; rv:57.0) Gecko/20100101 Firefox/57.0";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (X11; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:57.0) Gecko/20100101 Firefox/57.0";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 Edge/16.16299";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/604.4.7 (KHTML, like Gecko) Version/11.0.2 Safari/604.4.7";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/604.3.5 (KHTML, like Gecko) Version/11.0.1 Safari/604.3.5";
	$userAgentArray[] = "Mozilla/5.0 (X11; Linux x86_64; rv:52.0) Gecko/20100101 Firefox/52.0";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:52.0) Gecko/20100101 Firefox/52.0";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36 OPR/49.0.2725.64";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.1; rv:57.0) Gecko/20100101 Firefox/57.0";
	$userAgentArray[] = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.4.7 (KHTML, like Gecko) Version/11.0.2 Safari/604.4.7";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:57.0) Gecko/20100101 Firefox/57.0";
	$userAgentArray[] = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/62.0.3202.94 Chrome/62.0.3202.94 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.1; Trident/7.0; rv:11.0) like Gecko";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0";
	$userAgentArray[] = "Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0;  Trident/5.0)";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.1; rv:52.0) Gecko/20100101 Firefox/52.0";
	$userAgentArray[] = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/63.0.3239.84 Chrome/63.0.3239.84 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (X11; Fedora; Linux x86_64; rv:57.0) Gecko/20100101 Firefox/57.0";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0";
	$userAgentArray[] = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.89 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0;  Trident/5.0)";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:57.0) Gecko/20100101 Firefox/57.0";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.3.5 (KHTML, like Gecko) Version/11.0.1 Safari/604.3.5";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; WOW64; rv:57.0) Gecko/20100101 Firefox/57.0";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36 Edge/14.14393";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0";
	$userAgentArray[] = "Mozilla/5.0 (iPad; CPU OS 11_1_2 like Mac OS X) AppleWebKit/604.3.5 (KHTML, like Gecko) Version/11.0 Mobile/15B202 Safari/604.1";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; Touch; rv:11.0) like Gecko";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.13; rv:58.0) Gecko/20100101 Firefox/58.0";
	$userAgentArray[] = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38";
	$userAgentArray[] = "Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";
	$userAgentArray[] = "Mozilla/5.0 (X11; CrOS x86_64 9901.77.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.97 Safari/537.36";
	$getArrayKey = array_rand($userAgentArray);
	return $userAgentArray[$getArrayKey];
 
}
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







?>

