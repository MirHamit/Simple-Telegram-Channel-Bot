<?php
function processMessage($message) {
    $kanal = '@channel-name'; //channel id
    $admins = array(123456, 987654); // admins id
    // process incoming message
    $message_id = $message['message_id'];
    $chat_id = $message['chat']['id'];
    if (isset($message['text'])) {
        // incoming text message
        $text = $message['text'];

        if (strpos($text, "/start") === 0) {
            apiRequestJson("sendMessage", array('chat_id' => $chat_id, "text" => 'سلام
برای دریافت آی دی تلگرام /id را بفرستید'));
        } else if (strpos($text, "/id") === 0) {
            apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "HTML", "text" => 'شماره آی دی تلگرام شما : ' . $message['chat']['id']));
        } else if (strpos($text, "/kanal") === 0){
//            apiRequestWebhook("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "HTML", "reply_to_message_id" => $message_id, "text" => $text));
            if (in_array($message['chat']['id'], $admins)) {
                apiRequestWebhook("sendMessage",
                    array('chat_id' => $kanal,
                        "parse_mode" => "HTML",
                        "disable_web_page_preview" => 0,
                        "text" => str_replace("/kanal", "", $text),
                        'reply_markup' => json_encode([
                            'inline_keyboard' => [
                                [
                                    ['text' => "کانال تلگرام", 'url' => 'https://t.me/channel-link'], ['text' => "اینستاگرام", 'url' => 'https://instagram.com/instagram_link']
                                ],
                                [
                                    ['text' => "وبسایت", 'url' => 'http://tabriz.li']
                                ]
                            ]
                        ])
                    ));
                apiRequest("sendMessage", array('chat_id' => $chat_id, "reply_to_message_id" => $message_id, "text" => ' پیغام به کانال ' . $kanal . ' فرستاده شد '));
            } else {
                apiRequest("sendMessage", array('chat_id' => $chat_id, "reply_to_message_id" => $message_id, "text" => 'شما قادر به ارسال پیام در کانال نیستید '));
            }
        } else {
            apiRequest("sendMessage", array('chat_id' => $chat_id, "parse_mode" => "HTML", "text" =>  'در حال حاظر دستورات خاصی برای استفاده از من تعریف شده که دستور دریافتی از طرف شما جزو دستورات نیست'));
        }
    } else {
        apiRequest("sendMessage", array('chat_id' => $chat_id, "reply_to_message_id" => $message_id, "text" => 'در حال حاظر دستورات خاصی برای استفاده از من تعریف شده که دستور دریافتی از طرف شما جزو دستورات نیست'));
    }

}
