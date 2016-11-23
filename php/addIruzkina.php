 
<?php
	
	date_default_timezone_set('Europe/Madrid');
	$fitx = "../xml/iruzkinak.xml";

	$xml = simplexml_load_file($fitx);

	$elem = $xml->addChild('bisita');

	$count = $xml->count()+1;


	$id = "A".(string)$count;

	$elem->addAttribute('id', $id);

	$date = date('Y-m-d H:i:s');
	$elem->addChild('data', $date);
	$elem->addChild('izena', $_POST['izena']);
	$elem->addChild('iruzkina', $_POST['testua']);
	

	if (isset($_POST['emaila'])){
		$emaila = $elem->addChild('emaila', $_POST['email']);
		$emaila->addAttribute('erakutsi', $_POST['emailPubliko']);
	}

	$xml->asXML($fitx);

    $domxml = new DOMDocument('1.0');
    $domxml->preserveWhiteSpace = false;
    $domxml->formatOutput = true;
    $domxml->loadXML($xml->asXML());
    $domxml->save($fitx);

	
	echo 'Iruzkina Gehitu da';

	/*
	sleep(3);

	header("Location: ../xml/iruzkinak.xml");
	die();
	*/
?>