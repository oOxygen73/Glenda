<?php

	$botToken = "959465967:AAGL96nATh_YOb6E6mVXigx24PMr4iNan04"; // Api TOKEN to our bot
	$website = "https://api.telegram.org/bot".$botToken;
    $FilejSon = file_get_contents(php://input);
    $FilejSon = json_decode($FilejSon, TRUE);
    $FirstName = $FilejSon[message][chat][first_name];
    $UserChatId = $FilejSon[message][chat][id];
    $Message = $FilejSon[message][text];
    $a = ['Buongiorno', 'Buongiorno Cavaliere!', 'Bentrovato compagno!'];

    switch ($Message)
    {
        case '/vai':
            $msg = Ciao $GLOBALS[FirstName]!;
            showKeyboard($UserChatId, $msg);
            break;

        case 'Buongiorno':
            $msg = $a[mt_rand(0, count($a) - 1)];
            sendMessage($UserChatId, $msg);
            break;

        case  Conigli : // This is the same text inside a Keyboard
            $msg = La difficoltà EX dei conigli è disponibile nei seguenti orari: 00:00/05:00/13:00/16:00;
            showKeyboard($UserChatId, $msg);
            break;

        case Inline Keyboard:
            $msg = Abracadabra and inline keyboard will appear!;
            inlineKeyboard($UserChatId, $msg);
            break;

        case Remove Keyboard:
            $msg = Abracadabra and keyboard will disappear!;
            removeKeyboard($UserChatId, $msg);
            break;

        default:
            $msg = Unknown Command! So sorry ;(;
            sendMessage($ChatId, $msg);
            break;
    } 


    function sendMessage($chat_id, $text)
    {
        $url = $GLOBALS[website]./sendMessage?chat_id=.$chat_id.&text=.urlencode($text);
        file_get_contents($url);
    }

    function showKeyboard($chat_id, $text)
    {
        $jSonCodeKeyboard = '&reply_markup={keyboard:[[%20Conigli%20]],resize_keyboard:true,one_time_keyboard:false}';
        $url = $GLOBALS[website]./sendMessage?chat_id=.$chat_id.&text=.urlencode($text).$jSonCodeKeyboard;
        file_get_contents($url);
    }

?>
