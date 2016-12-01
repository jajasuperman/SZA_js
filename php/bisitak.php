<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Bisitak</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		
		<script type="text/javascript" src="../js/egiaztatuEmail.js"></script>
		<script type="text/javascript" src="../js/irudiaAldatu.js"></script>
		<link rel="stylesheet" href="../css/estiloa.css" />

		<script type="text/javascript" language="javascript">
			
			xhr = new XMLHttpRequest();
			var elem = null;

			xhr.onreadystatechange = function(){
				if((xhr.readyState == 4)&&(xhr.status==200)){
					document.getElementById('iruzkina'+elem).innerHTML = xhr.responseText;
					document.getElementById('iruzkinLink'+elem).innerHTML = "";
				}
			}

			function erakutsiGehiago(elementID){
				elem = elementID;
				var doc = document.getElementById('iruzkina'+elementID).innerHTML;
				document.getElementById('iruzkina'+elementID).innerHTML="";
				xhr.open("GET", "zabalduIruzkina.php?iruzkin="+doc, true);
				xhr.send();
			}
		</script>
		
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
			<?php $aux = 1; foreach ($xml->children() as $elem) :?>
				<tr>
					<td><?php echo $elem->data; ?></td>
					<td><?php echo $elem->izena; ?></td>
						<?php 
							if (strlen($elem->iruzkina) > 50){
								$aux += 1;
								$iruzkin = substr($elem->iruzkina, 0, 50).'...';

								echo "<td style='table-layout:fixed;word-wrap: break-word;display: inline-block;'><p id='iruzkina".(string)$aux."'>".$iruzkin."</p>";
								echo "</br>";
								echo "<a id='iruzkinLink".(string)$aux."' title='Egin klik gehiago ikusteko' href='javascript:void(0);' onclick='erakutsiGehiago(".$aux.");return false;'>Egin klik gehiago ikusteko</a></td>";
							}
							else{
								echo "<td>".$elem->iruzkina."</td>";
							}
						?>
						
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
