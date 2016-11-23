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
        
        <?php
            $fitx = '../xml/iruzkinak.xml';
            $xml = simplexml_load_file($fitx);
        ?>

		<table>
			<thead>
				<tr>
					<th>Data</th>
					<th>Izena</th>
					<th>Iruzkina</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
			<?php 
                $xml = array_reverse($xml->xpath('bisita'));
                foreach ($xml as $elem) :
            ?>
				<tr>
					<td><?php echo $elem->data; ?></td>
					<td><?php echo $elem->izena; ?></td>
					<td><?php echo $elem->iruzkina; ?></td>
					<td><?php 
						if ($elem->eposta['erakutsi'] == "Bai"){
							echo $elem->eposta; 
						}
						else{
							echo '';
						}
					?></td>

				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
				
		<a href="../oinarria.html"><p>Atzera</p></a> 
		<br />
		<img id="irudi1" src="../irudiak/business/frame_0_delay-0.06s.gif"/>
		
	</body>

</html>
