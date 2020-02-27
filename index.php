<?php
	include("head.php");
	include("header.php");
?>

	<body>
		<div class="container-fluid">
			<div class="row pt-2">
				<div class='mx-auto mb-5 col-md-9 px-3'>
					<div id='map' style='width: 100%; height: 600px;'></div>
				</div>

				<div class="col-md-3 px-3 bg-secondary text-light">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet dui ipsum. Nunc mollis ante ut tincidunt tincidunt. Maecenas tristique lectus sem. In egestas aliquet efficitur. Suspendisse at justo sollicitudin, suscipit elit sit amet, convallis leo. Aenean aliquet sapien eu ullamcorper lobortis. Donec sem massa, semper vel dolor rhoncus, bibendum porttitor ipsum. Sed quis dolor et felis maximus scelerisque sit amet ac urna. Quisque metus nulla, luctus et vestibulum sed, dapibus in enim. Nam congue nisl sed lobortis consequat. Duis convallis sagittis erat a tempor. Integer sollicitudin posuere lectus, at pharetra massa luctus vel.<br/><br/>

					Phasellus quam risus, vehicula at dignissim sed, vulputate pharetra metus. Nulla ac leo ullamcorper, ultricies augue nec, dictum mauris. Nullam gravida justo felis, at consectetur lectus efficitur pellentesque. Maecenas quis vulputate elit, ac tincidunt purus. Integer consequat lacus et varius malesuada. Pellentesque sed urna metus. Etiam molestie cursus orci ac congue. Pellentesque mollis in velit a imperdiet. Ut malesuada erat turpis, at faucibus nisi vestibulum lacinia. Maecenas mollis placerat feugiat.<br/><br/>

					Duis quis neque aliquet, vestibulum velit ac, elementum lacus. Integer tristique suscipit urna, quis lacinia nulla mollis sit amet. Nunc purus felis, semper et placerat a, pharetra at purus. Pellentesque condimentum euismod velit, eget posuere tellus pellentesque quis. Suspendisse viverra nunc dui, quis eleifend velit varius vel. Quisque eget posuere dolor. Donec eget elementum magna. Aliquam erat volutpat.<br/><br/>

					Aenean dignissim lacus sit amet massa viverra, eget fermentum nisi efficitur. Fusce dolor ante, fermentum a orci et, mollis faucibus nisl. Mauris porta felis turpis, in ullamcorper ligula dapibus ut. Mauris tincidunt mi ante, id dictum lorem vulputate nec. Praesent eu sapien in metus tincidunt cursus vitae a risus. Donec placerat non eros et pulvinar. Aliquam congue consectetur mi varius tincidunt. Nam in nunc facilisis, ornare ante quis, molestie eros.<br/><br/>

					Cras id purus ipsum. Vestibulum eget placerat nulla. Aliquam erat volutpat. Etiam cursus dictum lacinia. Aenean eget eleifend ipsum. Duis efficitur, mauris et porta pretium, ligula ligula aliquam erat, ac euismod nibh lacus non odio. Sed erat ligula, consectetur sit amet pretium id, lobortis ac leo. Morbi felis urna, pretium non consequat sit amet, convallis sed enim. Morbi malesuada interdum consectetur. Curabitur a purus tristique, auctor nunc id, condimentum metus. Cras arcu sapien, consequat quis erat id, volutpat congue sem. Ut fringilla ante id tincidunt commodo. Vestibulum accumsan mollis neque non viverra. Curabitur egestas turpis nec commodo tincidunt. Pellentesque vel porta ex, sit amet feugiat metus. Mauris lobortis pharetra suscipit<br><br/></p>
				</div>
			</div>
		</div>


		<?php
include ('footer.php');
include ('script.php');

?>
	</body>

	<script type='text/javascript'>
		var map = L.map('map').setView([51.505, -0.09], 2);

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);


    function affiche(objet)
    {
      console.log(objet);
    }


    $().ready(function(){

       $.getJSON("fic.json",function(data)
        {
          $.each(data,function(i,objet)
          {
            	L.marker([objet.latitude, objet.longitude]).addTo(map)
				.bindPopup(objet.afterClean)
				.openPopup();


          })
        })
    })


	</script>

