<?php
	
	$botToken = "700987806:AAF5NVz_G8KrF6WWoFe9gvLcAkm6N39bePI"; // Api TOKEN to our bot
	$website = "https://api.telegram.org/bot".$botToken;

	$FilejSon = file_get_contents("php://input"); // Take the url input, in this case will be executed method getUpdates that return Update.
	$FilejSon = json_decode($FilejSon, TRUE); // Decode the variable before because now we can search with key (because it's a dictionary)

	$FirstName = $FilejSon["message"]["chat"]["first_name"]; // Get the name that user set
	$ChatID = $FilejSon["message"]["chat"]["id"]; // get the User ID, this is unique
	$Message = $FilejSon["message"]["text"]; // Get the message sent from user
    $messageId = $FilejSon["message"]["message_id"]; // get the User ID, this is unique
	
	$a = $Message;

if (strpos($a, '@oOxygen_Tech') !== false) {
    //echo 'true';
	$Message = 'Nothing';
}

if (strpos($a, 'oxy') !== false) {
    //echo 'true';
	$Message = 'NothingHere';
}

if (strpos($a, 'Giada') !== false) {
    //echo 'true';
	$Message = 'NothingHereGiada';
}
	switch ($Message)
	{
		case '/start':
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Giada.jpg"; 
			$photoDesc ="<b>Ciao io Glenda. Non Posso Esserti Utile Attualmente.</b>";
			sendMessageImageAndLinks($ChatID, $photoUrl, $photoDesc);
			break;
			
		case 'Menu':
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Giada.jpg"; 
			$photoDesc ="<a href='http://ooxygen.tech/Song.mp3'>Only_4You</a>";
			sendMessageImageAndLinks($ChatID, $photoUrl, $photoDesc);
			break;
			
		case 'Nothing':
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Giada.jpg"; 
			$photoDesc ="<b>oOxygen non è qui mi dispiace.</b>\n<a href='http://ooxygen.tech/Song.mp3'>Only_4You</a>";
			sendMessageImageAndLinks($ChatID, $photoUrl, $photoDesc);
			break;
			
		case 'NothingHere':
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Giada.jpg"; 
			$photoDesc ="<b>oOxy non c'è!</b> \n<a href='http://ooxygen.tech/Song.mp3'>Only_4You</a>";
			sendMessageImageAndLinks($ChatID, $photoUrl, $photoDesc);
			break;
		case 'NothingHereGiada':
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Giada.jpg"; 
			$photoDesc ="<b>Ti Vogliamo Bene Giada</b> \n<a href='http://ooxygen.tech/Song.mp3'>Only_4You</a>";
			sendMessageImageAndLinks($ChatID, $photoUrl, $photoDesc);
			break;
			
			
		case 'Glenda':
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Giada.jpg"; 
			$photoDesc ="<a href='http://ooxygen.tech/Song.mp3'>Only_4You</a>";
			sendMessageImageAndLinks($ChatID, $photoUrl, $photoDesc);
			break;
			
		case 'Links':
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Giada.jpg"; 
			$photoDesc ="<a href='http://ooxygen.tech/Song.mp3'>Only_4You</a>";
			sendMessageImageAndLinks($ChatID, $photoUrl, $photoDesc);
			break;

		case 'Tools': // Command to show normal Keyboard
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Giada.jpg"; 
			$photoDesc ="<a href='http://ooxygen.tech/Song.mp3'>Only_4You</a>";
			sendMessageImageAndLinks($ChatID, $photoUrl, $photoDesc);
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
