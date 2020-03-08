<?
	$apiGEO = json_decode(file_get_contents('https://api.ipgeolocation.io/ipgeo?apiKey=31c35a9779e645c281c5c665b388c0f8'));
	$lat = $apiGEO->latitude;
	$lon = $apiGEO->longitude;
	$apiPOGG = 'https://samples.openweathermap.org/data/2.5/weather?lat=$lat&lon=.$lon&appid=b6907d289e10d714a6e88b30761fae22';
	$apiPOG = json_decode(file_get_contents($apiPOGG)); 
	$temp = $apiPOG->main->temp;
	$temp = $temp - '273,15';
	echo $apiPOG->weather[0]->main;
	$api1 = json_decode(file_get_contents('https://airapi.airly.eu/v2/measurements/nearest?indexType=AIRLY_CAQI&lat=$lat&lng=$lng&maxDistanceKM=100&apikey=9Cm0KHMEwWafDLs0SQiPxlOljd6REENE&Accept-Language=pl'));
	$pm1 = $api1->current->values[0]->value;
	$pm25 = $api1->current->values[1]->value;
	$pm10 = $api1->current->values[2]->value;
	$temte = $api1->current->values[5]->value;
	$level = $api1->current->indexes[0]->level;
	$opiss = $api1->current->indexes[0]->description;
	$dopiss = $api1->current->indexes[0]->advice;
	$img = "s";
	if($level == "LOW"){ $img = "t"; };
	if($level == "VERY_LOW"){ $img = "t"; };

	//Koniel 1 Api o Pogodzie i smogu//
	//Początek 2 api o BitCoin//
	$api2 = json_decode(file_get_contents('https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH,LTC,XMR,XRP&tsyms=USD'));
	$BTC = $api2->BTC->USD;
	$ETH = $api2->ETH->USD;
	$XMR = $api2->XMR->USD;
	$XRP = $api2->XRP->USD;
	$LTC = $api2->LTC->USD;
	$api3USD = json_decode(file_get_contents("http://api.nbp.pl/api/exchangerates/rates/A/USD/?format=json"));$api3EUR = json_decode(file_get_contents("http://api.nbp.pl/api/exchangerates/rates/A/EUR/?format=json"));
	$USD = $api3USD->rates[0]->mid;
	$EUR = $api3EUR->rates[0]->mid;

	$api3 = json_decode(file_get_contents('https://api.spacexdata.com/v3/launches/next'));
	$api3T = $api3->launch_date_utc;
	$api3N = $api3->mission_name;
	$api3R = $api3->rocket->rocket_name;
	$api3M = $api3->launch_site->site_name;

$api3 = json_decode(file_get_contents('https://spacelaunchnow.me/api/3.3.0/launch/upcoming/'));
$api3T = $api3->results[0]->net;
$api3N = $api3->results[0]->rocket->spacecraft_stage->spacecraft->name;
$api3R = $api3->results[0]->rocket->configuration->name;
$api3M = $api3->results[0]->pad->name;

	?>
<head>
<link rel="stylesheet" href="http://cisztube.cba.pl/css/wszystko.css" type="text/css">
<link rel="stylesheet" href="style.css" type="text/css">
<link rel="stylesheet" href="c.css" type="text/css">
<script src="jquery-1.11.3.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141358521-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-141358521-1');
</script>

</head>
<body>
<!--Nawigacja-->
		<div class="nav">
			<ol>
				<li><a href="#">Strona główna</a></li>
				<li><a href="#Pogoda">Pogoda</a>
					<!--<ul>
						<li><a href="#">Contra</a></li>
						<li><a href="#">Mario Bros</a></li>
						<li><a href="#">Duck Tales</a></li>
						<li><a href="#">Legend of Zelda</a></li>
					</ul>-->
				</li>
				<li><a href="#Waluty">Waluty</a>
					<ul>
						<!--<li><a href="#Waluty">Waluty</a></li>
						<li><a href="#">Wrypto Waluty</a></li>
						<li><a href="#">The Simpsons</a></li>
						<li><a href="#">Top Gun</a></li>
					--></ul>
				</li>
				<!--<li><a href="#">Bijatyki</a>
					<ul>
						<li><a href="#">Mortal Kombat</a></li>
						<li><a href="#">Nekketsu K.D.</a></li>
						<li><a href="#">Double Dragon</a></li>
						<li><a href="#">Turtles T.</a></li>
					</ul>
				</li>
				<li><a href="#">Gry sportowe</a>
					<ul>
						<li><a href="#">Goal 3</a></li>
						<li><a href="#">Excitebike</a></li>
						<li><a href="#">Ike Ike Hockey</a></li>
						<li><a href="#">Tennis</a></li>
					</ul>
				</li>-->
				<li><a href="#">O autorach</a></li>
			</ol>
		
		</div>
		<!--Koniec nawigacji-->






<center>
<div id="Pogoda">
<div class="n">Pogoda</div><div class="news">
<h1><? Echo $opiss; ?></h1>
<img src="img/<? Echo $img; ?>.png" />
<h3>PM1 = <? Echo $pm1; ?> | PM2.5 = <? Echo $pm25; ?> | PM10 = <? Echo $pm10; ?> | Temperatura = <? Echo $temp; ?><br /></h3><? Echo $dopiss ?><br /><br />
</div>
<div id="Waluty">
<div class="n">Waluty</div><div class="news">
	<h1>Dolar amerykański (USD): <? Echo $USD; ?>zł</h1>
	<h1>Euro (EUR): <? Echo $EUR; ?>zł</h1>
	<!--<h1>Kurs Monero (XMR): <? Echo $XMR; ?>zł</h1>
	<h1>Kurs Ripple (XRP): <? Echo $XRP; ?>zł</h1>
	<h1>Kurs Litecoin (LTC): <? Echo $LTC; ?>zł</h1>-->
	
</div>
<div class="n">Krypto Waluty</div><div class="news">
	<h1>Kurs Bitcoin (BTC): <? Echo $BTC; ?>$</h1>
	<h1>Kurs Ethereum (ETH): <? Echo $ETH; ?>$</h1>
	<h1>Kurs Monero (XMR): <? Echo $XMR; ?>$</h1>
	<h1>Kurs Ripple (XRP): <? Echo $XRP; ?>$</h1>
	<h1>Kurs Litecoin (LTC): <? Echo $LTC; ?>$</h1>
	
</div>
<div class="n">Start rakiet</div><div class="news">
	<h1>Start za: <div id="is"></div></h1>
	<h1>Nazwa Misj: <? Echo $api3N; ?></h1>
	<h1>Rakieta: <? Echo $api3R; ?></h1>
	<h1>Miejsce Startu: <? Echo $api3M; ?></h1>
	<!--<h1>Kurs Litecoin (LTC): <? Echo $LTC; ?>$</h1>-->
	
</div>

















































<!--Skrypty JS-->





	<script>
	document.getElementById("is").innerHTML = "-- : -- : -- : --";
	// Set the date we're counting down to
	var countDownDate = new Date("<? Echo $api3T; ?>").getTime();

	// Update the count down every 1 second
	var x = setInterval(function() {

	  // Get today's date and time
	  var now = new Date().getTime();
	    
	  // Find the distance between now and the count down date
	  var distance = countDownDate - now;
	    
	  // Time calculations for days, hours, minutes and seconds
	  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
	    
	  // Output the result in an element with id="demo"
	  document.getElementById("is").innerHTML = "" + days + " : " + hours + " : "
	  + minutes + " : " + seconds + " ";
	    
	  // If the count down is over, write some text 
	  if (distance < 0) {
	    clearInterval(x);
	    document.getElementById("is").innerHTML = "Start!!!";
	  }
	}, 1000);
	</script>



	<script src="jquery-1.11.3.min.js"></script>
	
	<script>

	$(document).ready(function() {
	var NavY = $('.nav').offset().top;
	 
	var stickyNav = function(){
	var ScrollY = $(window).scrollTop();
		  
	if (ScrollY > NavY) { 
		$('.nav').addClass('sticky');
	} else {
		$('.nav').removeClass('sticky'); 
	}
	};
	 
	stickyNav();
	 
	$(window).scroll(function() {
		stickyNav();
	});
	});
	
</script>
</body>