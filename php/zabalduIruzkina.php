<?php 
	$fitx = '../xml/iruzkinak.xml';
    $xml = simplexml_load_file($fitx);

	$doc = $_GET['iruzkin'];
	$doc = substr($doc, 0, -3);
	foreach ($xml->children() as $elem){
		if (strlen($elem->iruzkina) > 50){
			$pos = strpos($elem->iruzkina, $doc);
			if ($pos !== false){
				$iruzkin = $elem->iruzkina;
				break;
			}
		}
	}

	echo($iruzkin);
?>