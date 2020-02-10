<?php
	
	$botToken = "700987806:AAF5NVz_G8KrF6WWoFe9gvLcAkm6N39bePI"; // Api TOKEN to our bot
	$website = "https://api.telegram.org/bot".$botToken;

	$FilejSon = file_get_contents("php://input"); // Take the url input, in this case will be executed method getUpdates that return Update.
	$FilejSon = json_decode($FilejSon, TRUE); // Decode the variable before because now we can search with key (because it's a dictionary)

	$FirstName = $FilejSon["message"]["chat"]["first_name"]; // Get the name that user set
	$ChatID = $FilejSon["message"]["chat"]["id"]; // get the User ID, this is unique
	$Message = $FilejSon["message"]["text"]; // Get the message sent from user
    $messageId = $FilejSon["message"]["message_id"]; // get the User ID, this is unique
	
	switch ($Message)
	{
		case '/start':
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Glenda.jpg"; 
			$photoDesc ="Ciao $FirstName io Sono Glenda. \nCome Posso Esserti Utile? \nI Miei Comandi Sono: Links, Tools, Infos, Help, Menu \nPuoi Aprire una Chat Privata con me se Vuoi. \nSe ti Danno Fastidio i Tasti del Menu puoi Chiuderli cliccando sulla X, Oppure sulla Freccia che Punta Verso il Basso.";
			sendStartImage($ChatID, $photoUrl, $photoDesc);
			break;
			
		case 'Menu':
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Glenda.jpg"; 
			$photoDesc ="Ciao $FirstName io Sono Glenda. \nCome Posso Esserti Utile? \nI Miei Comandi Sono: Links, Tools, Infos, Help, Menu \nPuoi Aprire una Chat Privata con me se Vuoi. \nSe ti Danno Fastidio i Tasti del Menu puoi Chiuderli cliccando sulla X, Oppure sulla Freccia che Punta Verso il Basso.";
			sendStartImage($ChatID, $photoUrl, $photoDesc);
			break;
			
		case 'Glenda':
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Glenda.jpg"; 
			$photoDesc ="<b>Ciao $FirstName io Sono Glenda. \nCome Posso Esserti Utile? \nI Miei Comandi Sono: Links, Tools, Infos, Help, Menu \nPuoi Aprire una Chat Privata con me se Vuoi.</b>";
			sendMessageImageAndLinks($ChatID, $photoUrl, $photoDesc);
			break;
			
		case 'Links':
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Logo.png"; 
			$photoDesc ="<b>Eccoti i Nostri Links</b> \n<a href='http://insane3dPrinting-forum.ooxygen.tech/'>Insane3dPrinting Forum</a> \n<a href='http://insane3d.ooxygen.tech/'>Insane3dPrinting Downloads</a>";
			sendMessageImageAndLinks($ChatID, $photoUrl, $photoDesc);
			break;

		case 'Tools': // Command to show normal Keyboard
			$photoUrl ="http://ooxygen.tech/Glenda_Bot/Insane3dStepCalculator.jpg"; 
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
		$jSonCodeKeyboard = '&reply_markup={"keyboard":[["Links"],["Nascondi%20Tastiera","Rimuovi%20Tastiera"],["Invia%20Immagine"]],"resize_keyboard":true}';
		$url = $GLOBALS[website]."/sendMessage?chat_id=".$chat_id."&text=".urlencode($text).$jSonCodeKeyboard;
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
