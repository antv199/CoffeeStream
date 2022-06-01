<?php 
include_once 'header.php';
include_once 'footer.php';

$conn = mysqli_connect('localhost', 'root', '', 'site');

if(!$conn){
		echo 'Connection error: ' . mysqli_connect_error();
}
else{
	$count=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM movies"));
	$rng = rand(1, $count);
	$sql="SELECT * FROM movies WHERE id=".$rng."";
	$result=mysqli_query($conn, $sql);
	$getStuff=mysqli_fetch_assoc($result);
}
?>

<style>
	.card{
		margin-top: 100px;
	}
</style>

<head>
<link rel="stylesheet" href="./icons/fonts">
</head>

<html lang="en">
<body>
	<center>

		<div class="card" style="width: 50rem;">
			<?php
				echo '<center><img src="./img/promo/'.$getStuff['picture'].'" class="card-img-top" style="width:50%; height:50%"></center>';
			?>
			
			<div class="card-body">
				<h5 class="card-title"><?php echo "".$getStuff['name']." (".$getStuff['year'].")";?></h5>
				<p class="card-text">The movie is available within the following services:</p>

				<?php
				if($getStuff['amazon']){
					echo '
					<a href="https://www.amazon.com/gp/video/detail/'.$getStuff["amazon"].'" class="btn btn-warning">
					<img src="https://icongr.am/simple/primevideo.svg?size=23&color=ffffff&colored=false">
						Amazon Prime
					</a>';
				}

				if($getStuff['apple']){
					echo '
					<a href="https://tv.apple.com/movie/'.$getStuff["apple"].'" class="btn btn-dark">
					<img src=https://icongr.am/simple/appletv.svg?size=23&color=ffffff&colored=true">
						Apple TV
					</a>';
				}

				if($getStuff['hulu']){
					echo '
					<a href="https://www.hulu.com/movie/'.$getStuff["hulu"].'" class="btn btn-success">
					<img src="https://icongr.am/simple/hulu.svg?size=23&color=ffffff&colored=false">
						Hulu
					</a>';
				}
				
				if($getStuff['netflix']){
					echo '
					<a href="https://www.netflix.com/title/'.$getStuff["netflix"].'" class="btn btn-danger">
					<img src="https://icongr.am/simple/netflix.svg?size=23&color=ffffff&colored=false">
						Netflix
					</a>';
				}
				
				if($getStuff['youtube']){
					echo '
					<a href="https://www.youtube.com/watch?v='.$getStuff["youtube"].'" class="btn btn-danger">
					<img src="https://icongr.am/simple/youtube.svg?size=23&color=ffffff&colored=false">
						YouTube
					</a>';
				}
				
				?>

			</div>
		</div>

	</center>
</body>
</html>