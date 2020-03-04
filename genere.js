var map = L.map('map').setView([46.603354, 1.8883335], 2);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

function generation(objet){
	$("#titre").append(objet.titre);
	$("#texte").append(objet.texte);
/*	L.marker([objet.latitude, objet.longitude]).addTo(map)
	.bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
	.openPopup();*/
}

$().ready(function(){
	$.getJSON('fic.json', function(data){
		console.log(data);
	});
});