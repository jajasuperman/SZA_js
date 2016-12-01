 <?php
	
	date_default_timezone_set('Europe/Madrid');
	$fitx = "../xml/iruzkinak.xml";
	$xml = simplexml_load_file($fitx);
	$elem = $xml->addChild('bisita');
	$count = $xml->count()+1;
	$id = "A".(string)$count;
	$elem->addAttribute('id', $id);
	echo($id."\n");
	$date = date('Y-m-d H:i:s');
	echo($date."\n");
	$elem->addChild('data', $date);
	$elem->addChild('izena', $_POST['izena']);
	echo($_POST['izena']."\n");
	$elem->addChild('iruzkina', $_POST['testua']);
	echo($_POST['testua']."\n");
	if (isset($_POST['email'])){
		$emaila = $elem->addChild('eposta', $_POST['email']);
        if(isset($_POST['emailPubliko'])) {
		  $emaila->addAttribute('erakutsi', "Bai");
        }
        else {
            $emaila->addAttribute('erakutsi', "Ez");
        }
	}
	$xml->asXML($fitx);
    $domxml = new DOMDocument('1.0');
    $domxml->preserveWhiteSpace = false;
    $domxml->formatOutput = true;
    $domxml->loadXML($xml->asXML());
    $domxml->save($fitx);
	
	echo 'Iruzkina Gehitu da';    
    echo '<a href="bisitak.php"><p>Iruzkinak ikusi</p></a>';
?>