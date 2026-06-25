<?php

$token = getenv("8967247131:AAEPtKhGLNvJdrAZ9RhDASf7VjVRm3Zkppc");

$update = json_decode(file_get_contents("php://input"), true);

if (isset($update["message"]["text"])) {

    $chat_id = $update["message"]["chat"]["id"];
    $text = $update["message"]["text"];

    if ($text == "/start") {

        $url = "https://api.telegram.org/bot".$token."/sendMessage";

        $data = [
            "chat_id" => $chat_id,
            "text" => "سلام خوش آمدید."
        ];

        $options = [
            "http" => [
                "header"  => "Content-type: application/x-www-form-urlencoded\r\n",
                "method"  => "POST",
                "content" => http_build_query($data)
            ]
        ];

        file_get_contents($url, false, stream_context_create($options));
    }
}
