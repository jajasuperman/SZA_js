function balioztatuBalioak(){
    var izena = document.getElementById("izena").value;
    var email = document.getElementById("email").value;
    //var publiko = document.getElementById("emailPubliko").value;
    var testua = document.getElementById("testua").value;              

    if (izena == '' || izena.length == 0){
        alert("Ez duzu izena sartu!");
        return false;
    }
    else if (testua == '' || testua.length == 0) {
	    alert("Ez duzu testua sartu!");
        return false;
    }
    else if(email.length != 0) {
        var arrobaAgertzea = email.split("@");
        if(arrobaAgertzea.length == 2) {
            var puntuaAgertzea = arrobaAgertzea[1].split(".");
            if(puntuaAgertzea.length == 2 && puntuaAgertzea[1].length > 2) {
                //alert("Dena ondo eta emaila");
                return true;
            }
            else {
            	alert("Emaila gaizki dago!");
                return false;
            }
        }
        else {
          	alert("Emaila gaizki dago!");
            return false;
        }	    
    }
    else {
        //alert("Dena ondo");
        return true;
    }
}

function checkboxGaitu() {    
    var email = document.getElementById("email").value;
    var publiko = document.getElementById("emailPubliko");
    if(email.length > 0) {			        
       	publiko.disabled = false;        
    }
    else {
        	publiko.disabled = true;
        	publiko.checked = false;
    }
}
