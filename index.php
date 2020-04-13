<!DOCTYPE html>
<html>

	<?php
		include("head.php");
	?>

	<body>

		<?php
			include("header.php");
		?>

		<div class='container-fluid' >
			<div class='row pt-1' >
				<div class='mx-auto mb-0 col-md-9 px-3'>
					<div id='map' style='width: 100%; height: 600px;'></div>
				</div>

				<div class='col-md-3 px-3 bg-secondary text-light overflow-auto'style='max-height: 600px'>
					<div>
						<a id='img' href='https://www.cartograf.fr/images/map/monde-satellites/carte_monde_satellite_topographie.jpg' target='_blank'>
							<img class='pt-2 mb-3' style='width: 100%; height: auto;' src='https://www.cartograf.fr/images/map/monde-satellites/carte_monde_satellite_topographie.jpg'>
						</a>
					</div>
					<div id='title'>
						<h5><u>Titre du post Reddit :</u></h5>
						<p id='t'></p>
					</div>
					<div id='afterClean'>
						<h5><u>Résultat du nettoyage du titre :</u></h5>
						<p id='a'></p>
					</div>
					<div  id='location'>
						<h5><u>Combinaison trouvant une solution dans Geoname :</u></h5>
						<p id='l'></p>
					</div>
					
				</div>
			</div>
		</div>


		<?php
		include ('footer.php');
		include ('script.php');
		?>
	</body>

	<script type='text/javascript'>
		var map = L.map('map').setView([35.505, -0.09], 2);
		map.options.minZoom = 2;

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

	    $().ready(function(){
	    	var markers = L.markerClusterGroup(); //on crée le cluster

	    	$.getJSON("fusion.json",function(data){
	    		$.each(data,function(index,objet){
	    			var m = L.marker([objet.latitude, objet.longitude])
	    			.bindPopup(objet.afterClean)
	    			.on('click', function(){
	    				$('#img').replaceWith("<a id='img' href='"+objet.url+"' target='_blank'><img class='pt-2 mb-3' style='width: 100%; height: 200px;' src='"+objet.url+"'></a>");
	    				$('#t').replaceWith("<p id='t'>"+objet.title+"</p>");
    					$('#a').replaceWith("<p id='a'>"+objet.afterClean+"</p>");
    					$('#l').replaceWith("<p id='l'>"+objet.location+"</p>");
	    			});
	    				markers.addLayer(m); //on ajoute chaque marqueur au cluster 
	    		});
	    		map.addLayer(markers); //on ajoute tout ça à la map
	    	});
	    });

	    console.log(document.getElementById('title').value);
	</script>

</html>