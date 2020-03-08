function loc(){
	navigator.geolocation.getCurrentPosition(dane);
}

async function dane(position){
	const lat = position.coords.latitude;
	const lng = position.coords.longitude;



	//const smog = 'http://ckan2.multimediagdansk.pl/gpsPositions'; const smog = await fetch(api_aut);
	//const pogoda = 'http://ckan2.multimediagdansk.pl/gpsPositions'; const pogoda = await fetch(api_aut);
	//const smog = 'http://ckan2.multimediagdansk.pl/gpsPositions'; const smog = await fetch(api_aut);

	document.getElementById("1").innerHTML = lat;
}