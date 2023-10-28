<?php
$botToken = '6514439505:AAGlizLFEB7epyXoPN8Z0zld3ATtirYYqt4'; // Ganti dengan token bot Anda
$data = file_get_contents('php://input');
$update = json_decode($data, true);

if (isset($update["message"])) {
    $chatID = $update["message"]["chat"]["id"];
    $messageText = $update["message"]["text"];

    // Lakukan sesuatu dengan pesan yang diterima, misalnya membalas
    $response = "Anda mengirim pesan: " . $messageText;

    // Kirim balasan ke pengguna
    $apiURL = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatID&text=" . urlencode($response);
    file_get_contents($apiURL);
}

// Set status HTTP 200 OK
http_response_code(200);
?>