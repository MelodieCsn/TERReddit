<!DOCTYPE html>
<html>

	<?php
		include("head.php");
	?>

	<body>

		<?php
			include("header.php");
		?>

		<div class="compteur" style="text-align: center;"> <h5>Posts en attente de verification : </h5> <span style="color: green">(nombre d'elt dans la table(?) verif)</span></div>

<br>
		<div class='container mx-auto px-auto'>
				<div class='row'>
										
						<div class='col-sm-4 col-md-3 p-3 mx-0'>
							<a class='averif'>

								<div class='w-100' style='height:30%'>
									<img src="https://i.redd.it/mgtjwbb219s41.jpg" style='width: 100%; object-fit:fill; height:100%'>
								</div>

								<div class='w-100 p-2'>
									<p>Titre : Patagonian Sunrise</p>
									<p>Localisation : </p>
									
									<div class='row'>
										<div class="col">
											<button type="submit" class="btn btn-success" name="accepter"> <i class="material-icons">check</i> </button>
										</div>
										<div class="col">
											<button type="submit" class="btn btn-danger" name="reviser"> <i class="material-icons">report</i></button>
										</div>
									</div>

								</div>
							</a>
						</div>

						<div class='col-sm-4 col-md-3 p-3 mx-0'>
							<a class='averif'>

								<div class='w-100' style='height:30%'>
									<img src="https://i.redd.it/lda8x7qwxks41.jpg" style='width: 100%; object-fit:fill; height:100%'>
								</div>

								<div class='w-100 p-2'>
									<p>Titre : Breathing thin air at Cordillera Blanca, Peru More mountains from all over the world on</p>
									<p>Localisation : Cordillera+Blanca+Peru</p>
									
									<div class='row'>
										<div class="col">
											<button type="submit" class="btn btn-success" name="accepter"> <i class="material-icons">check</i> </button>
										</div>
										<div class="col">
											<button type="submit" class="btn btn-danger" name="reviser"> <i class="material-icons">report</i></button>
										</div>
									</div>

								</div>
							</a>
						</div>
				</div>

				
		</div>;
		


		<?php
		include ('footer.php');
		include ('script.php');
		?>
	</body>

</html>