function irudiaAldatu() {

	var irudiak1 = 'irudiak/business/frame_*_delay-0.06s.gif';
	var i = 1;
	var irudi1 = document.getElementById("irudi1");
	
		setInterval(function() {
   	var path = irudiak1.replace('*', i);    
   	irudi1.src=path;
   	i = i + 1;
   	if (i == 123) i = 1;
	}, 90);
	
	var irudiak2 = 'irudiak/peter/frame_*_delay-0.13s.gif';
	var j = 1;
	var irudi2 = document.getElementById("irudi2");
	
		setInterval(function() {
   	var path = irudiak2.replace('*', j);    
   	irudi2.src=path;
   	j = j + 1;
   	if (j == 40) j = 1;
	}, 100);

}