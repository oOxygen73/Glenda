<?php
	
	$botToken = "959465967:AAGL96nATh_YOb6E6mVXigx24PMr4iNan04"; // Api TOKEN to our bot
	$website = "https://api.telegram.org/bot".$botToken;

	$content = file_get_contents("php://input");
	$update = json_decode($content, true);
if(!$update)
{
  exit;
}

$Message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$ChatID = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$FirstName = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

$text = trim($text);
$text = strtolower($text);
header("Content-Type: application/json");
	$a = $Message;

if (strpos($a, 'oOxygen_Tech') !== false) {
    //echo 'true';
	$Message = 'Nothing';
}

if (strpos($a, 'oxy') !== false) {
    //echo 'true';
	$Message = 'NothingHere';
}

	switch ($Message)
	{
		case '/start':
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Glenda.jpg"; 
			$photoDesc ="Ciao $FirstName io Sono Glenda. \nCome Posso Esserti Utile? \nPuoi Usare il Menu qui Sotto.";
			sendStartImage($ChatID, $photoUrl, $photoDesc);
			break;
			
		case 'Menu':
			$msg = "<b>Menu Attivato!</b>";
			showKeyboard($ChatID, $msg);
			break;
			
		case 'Nothing':
			$message_body = "<b>oOxygen non c'è! Non taggatelo, Grazie.</b>";
			sendMessageParseHtml($ChatID, $message_body);
			break;
			
		case 'NothingHere':
			$message_body = "<b>oOxy non c'è mi dispiace, non so piu come dirvelo</b>";
			sendMessageParseHtml($ChatID, $message_body);
			break;
			
		case 'Glenda':
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Glenda2.0.jpg"; 
			$photoDesc ="<b>Ciao $FirstName io Sono Glenda. \nCome Posso Esserti Utile? \nPuoi Aprire una Chat Privata con me se Vuoi.</b>";
			sendMessageImageAndLinks($ChatID, $photoUrl, $photoDesc);
			break;
			
		case 'test':
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Glenda2.0.jpg"; 
			$photoDesc ="<b>Ciao $GLOBALS[FirstName]! io Sono Glenda.</b>";
			sendMessageImageAndLinks($ChatID, $photoUrl, $photoDesc);
			break;
			
		case 'Links':
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Logo2.png"; 
			$photoDesc ="<b>Eccoti i Nostri Links</b> \n<a href='http://insane3dPrinting-forum.ooxygen.tech/'>Insane3dPrinting Forum</a> \n<a href='http://insane3d.ooxygen.tech/'>Insane3dPrinting Downloads</a>";
			sendMessageImageAndLinks($ChatID, $photoUrl, $photoDesc);
			break;

		case 'Tools': // Command to show normal Keyboard
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/InsaneStepCalculator2.jpg"; 
			$photoDesc ="<b>Scarica il Nostro Programma e i Nostri Tools</b> \n<a href='http://insane3d.ooxygen.tech/AppTools/Insane_Step_Calculator.rar'>Insane_Step_Calculator v1.0.x</a> \n<a href='http://insane3d.ooxygen.tech/AppTools/Cubo_di_Calibrazione_30x30.rar'>Cubo_di_Calibrazione_30x30</a> \n<a href='http://insane3d.ooxygen.tech/AppTools/Cubo_di_Calibrazione_40x40.rar'>Cubo_di_Calibrazione_40x40</a>\n<a href='http://insane3d.ooxygen.tech/AppTools/Temp_Tower_Pla.rar'>Temp_Tower_Pla</a>\n<a href='http://insane3d.ooxygen.tech/AppTools/Test_Retraction_a_2_Torri.rar'>Test_Retraction_a_2_Torri</a>\n<a href='http://insane3d.ooxygen.tech/AppTools/Test_Retraction_a_4_Torri.rar'>Test_Retraction_a_4_Torri</a>\n<a href='http://insane3d.ooxygen.tech/AppTools/Portachiavi_insane3d.rar'>Portachiavi_insane3d</a>";
			sendMessageImageAndLinks($ChatID, $photoUrl, $photoDesc);
			break;

		case "Infos":
			$message_body = "<b>Sono Glenda un Utility Bot Creato per Questo Gruppo. \nApri una Chat con Me in Privato.</b>";
			sendMessageParseHtml($ChatID, $message_body);
			break;

		case "Help": // This is the same text inside a Keyboard
			$message_body = "<b>Se ti Serve Aiuto puoi Consultare il Nostro Sito. \nOppure Chiedere ai Membri del Nostro Staff.</b>";
			sendMessageParseHtml($ChatID, $message_body);
			break;
			
		case "test": // This is the same text inside a Keyboard
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Logo.png"; 
			$photoDesc ="<b>Eccoti i Nostri Links</b> \n<a href='http://insane3dPrinting-forum.ooxygen.tech/'>Insane3dPrinting Forum</a> \n<a href='http://insane3d.ooxygen.tech/'>Insane3dPrinting Downloads</a>";
			sendMessageImageAndLinks($ChatID, $photoUrl, $photoDesc);
			break;

		case 'Buongiorno':
			$message_body = "<b>Buongiorno io Sono Glenda. \nPuoi Attivarmi Digitando il mio Nome.</b>";
			sendMessageParseHtml($ChatID, $message_body);
			break;

		case "Inline Keyboard": // This is the same text inside a Keyboard
			$msg = "Abracadabra and inline keyboard will appear!";
			inlineKeyboard($ChatID, $msg);
			break;

		default:
			//$msg = "Unknown Command!";
			//sendMessage($ChatID, $msg);
			break;
	} 
	

	function sendMessage($chat_id, $text)
	{
		$url = $GLOBALS[website]."/sendMessage?chat_id=".$chat_id."&text=".urlencode($text);
		file_get_contents($url);
	}

	function sendMessageParseHtml($chat_id, $text)
	{
		$url = $GLOBALS[website]."/sendMessage?chat_id=$chat_id&parse_mode=HTML&text=".urlencode($text);
		file_get_contents($url);
	}

	function sendMessageParseHtmlTest($chat_id, $text)
	{
		$url = $GLOBALS[website]."/sendMessage?chat_id=$chat_id&parse_mode=HTML&text=".urlencode($text);
		file_get_contents($url);
	}

	function sendMessageImageAndLinks($chat_id, $photoUrl, $photoDesc) // This is an useless type of this keyboard, in a specific Tutorial I show an useful usage of this keyboard.
	{
	    $url = $GLOBALS[website]."/sendPhoto?chat_id=".$chat_id."&photo=".$photoUrl."&parse_mode=HTML&caption=".urlencode($photoDesc);
	    file_get_contents($url);
	}

	function showKeyboard($chat_id, $text)
	{
		$jSonCodeKeyboard = '&reply_markup={"keyboard":[["Links", "Tools"],["Infos","Help"]],"resize_keyboard":true}';
		$url = $GLOBALS[website]."/sendMessage?chat_id=".$chat_id."&parse_mode=HTML&text=".urlencode($text).$jSonCodeKeyboard;
		file_get_contents($url);
	}
	
	function sendMessageImage($chat_id, $photoUrl, $photoDesc) // This is an useless type of this keyboard, in a specific Tutorial I show an useful usage of this keyboard.
	{
	    $url = $GLOBALS[website]."/sendPhoto?chat_id=".$chat_id."&photo=".$photoUrl."&caption=".urlencode($photoDesc);
	    file_get_contents($url);
	}
	
	function sendStartImage($chat_id, $photoUrl, $photoDesc) // This is an useless type of this keyboard, in a specific Tutorial I show an useful usage of this keyboard.
	{
		$jSonCodeKeyboard = '&reply_markup={"keyboard":[["Links", "Tools"],["Infos","Help"]],"resize_keyboard":true}';
	    $url = $GLOBALS[website]."/sendPhoto?chat_id=".$chat_id."&photo=".$photoUrl."&caption=".urlencode($photoDesc).$jSonCodeKeyboard;
	    file_get_contents($url);
	}
