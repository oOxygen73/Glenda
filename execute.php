<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);
header("Content-Type: application/json");
$response = '';
if(strpos($text, "/start") === 0 || $text=="ciao")
{
	$response = "Ciao $firstname, benvenuto!";
}

elseif($text=="ciao" or $text=="Ciao")
{
	$response = "Ciao, benvenuto $firstname";
}

elseif($text=="oxy" or $text=="Oxy")
{
	$response = "oOxygen è il mio Creatore";
}

elseif($text=="sunlu" or $text=="Sunlu")
{
	$response = "Hey, $firstname sai cosa ne Pensa oOxygen del Sunlu? Meglio se non te lo dico!";
}

elseif($text=="tianse" or $text=="Tianse")
{
	$response = "Attento, $firstname sai cosa ne Pensa oOxygen del Tianse? Meglio se non te lo dico!";
}

elseif($text=="giada" or $text=="Giada")
{
	$response = "Ciao, $firstname Tratta Bene Giada o te la Vedrai con oOxygen!";
}

elseif($text=="giadina" or $text=="Giadina")
{
	$response = "Hey che confidenza!, $firstname Soltanto oOxygen e Daniele possono Chiamarla in Questo Modo!";
}

elseif($text=="ender" or $text=="Ender")
{
	$response = "Carissimo, $firstname NON Sopporto piu Questo Modello di Stampante.";
}

elseif($text=="glenda" or $text=="Glenda")
{
	$response = "Ciao, i Miei Comandi Sono \nTools\nLinks";
}

elseif($text=="links" or $text=="Links")
{
	$response = "http://insane3dPrinting-forum.ooxygen.tech/ \nhttp://insane3d.ooxygen.tech";
}

elseif($text=="grazie glenda" or $text=="Grazie Glenda")
{
	$response = "Prego, quando vuoi sono qui per aiutarti :kissing_heart:";
}

elseif($text=="tools" or $text=="Tools")
{
	$response = "http://insane3d.ooxygen.tech/AppTools/Insane_Step_Calculator.rar \nhttp://insane3d.ooxygen.tech/AppTools/Cubo_di_Calibrazione_30x30.rar \nhttp://insane3d.ooxygen.tech/AppTools/Cubo_di_Calibrazione_40x40.rar \nhttp://insane3d.ooxygen.tech/AppTools/Temp_Tower_Pla.rar \nhttp://insane3d.ooxygen.tech/AppTools/Test_Retraction_a_2_Torri.rar \nhttp://insane3d.ooxygen.tech/AppTools/Test_Retraction_a_4_Torri.rar \nhttp://insane3d.ooxygen.tech/AppTools/Portachiavi_insane3d.rar";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
