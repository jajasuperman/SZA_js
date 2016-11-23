<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Bisitak</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		
		<script type="text/javascript" src="../js/egiaztatuEmail.js"></script>
		<script type="text/javascript" src="../js/irudiaAldatu.js"></script>
		<link rel="stylesheet" href="../css/estiloa.css" />
		
	</head>

	<body onload="irudiaAldatu();" style="text-align: center;">		
        
		<img id="irudi2" src="../irudiak/peter/frame_0_delay-0.13s.gif"/>
		<br />
		<br />
        
        <form id="erregistro" method="post" enctype="multipart/form-data" name="login" action="erabiltzaileBisitak.php">
			<label for="izena">Izena:</label><br>
			<input type="text" id="izena" name="izena"><br>
			     
			<input type="submit" value="Bidali">   			
		</form>
        
        <?php
            if(isset($_POST['izena'])) {
                $fitx = '../xml/iruzkinak.xml';
                $xml = simplexml_load_file($fitx);

                $taula = "<table>
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Izena</th>
                                    <th>Iruzkina</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>";
                foreach ($xml->children() as $elem) :
                    if($elem->izena == $_POST["izena"]) {
                        $taula = $taula . "<tr><td>".$elem->data . "</td>";
                        $taula = $taula . "<td>".$elem->izena . "</td>";
                        $taula = $taula . "<td>".$elem->iruzkina . "</td><td>";
                        if ($elem->eposta['erakutsi'] == "Bai"){
                            $taula = $taula . $elem->eposta; 
                        }
                        $taula = $taula . "</td></tr>";
                    }
                endforeach; 
                $taula = $taula . "</td></tr></tbody></table>";
                echo $taula;
            }
        ?>

		<a href="../oinarria.html"><p>Atzera</p></a> 
		<br />
		<img id="irudi1" src="../irudiak/business/frame_0_delay-0.06s.gif"/>
		
	</body>

</html>
