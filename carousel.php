<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
<style>
	#carouselExampleIndicators{
		margin-top: 40px;
		width: 70%;
		height: 15%;
	}

	#CarouselText{
		color: white;
	}
</style>
<center>
	<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">

			<div class="carousel-item active card">
				<div class="card-img-overlay">
					<h2 id="CarouselText">House on Haunted Hill (1959)</h2>
					<p class="UnderText" id="CarouselText"> Only on CoffeStream</p>
				</div>
				<img src="./img/promo/HouseOnHauntedHill.jpg" class="d-block w-100" style="width:50%; height: 578px;">
			</div>

			<div class="carousel-item">
			<div class="card-img-overlay">
				<h2 id="CarouselText">Night of the Living Dead (1968)</h2>
			</div>
				<img src="./img/promo/NightOfTheLivingDead.jpg" class="d-block w-100" style="width:50%; height: 578px;">
			</div>

			<div class="carousel-item">
			<div class="card-img-overlay">
				<h2 id="CarouselText">The Little Shop of Horrors (1960)</h2>
			</div>
				<img src="./img/promo/TheLittleShopofHorrors.jpg" class="d-block w-100" style="width:50%; height: 578px;">
			</div>

		</div>

		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>

		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
</center>
</body>
</html>
