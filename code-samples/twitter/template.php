<html>
	<head>
		<title>Twitter...for Cats!</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="stylesheet" href="http://bootswatch.com/amelia/bootstrap.min.css" />
		<link rel="stylesheet" href="./twitter.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script src="./twitter.js"></script>
	<head>
	<body>
		<div class="container">
			<div class="row span12">
				<h1 class="span3"><a href="./twitter.php">Twitter...for Cats!</a></h1>
				<form class="span7 offset1" id="search" action="twittergeo.php" method="POST">
					<label style="margin-top 2px;">Search your neighborhood for Cats!</label>
					<input style="margin: 2px 10px 0px 10px;" name="catsearch" type="text" placeholder="Cats!" />
					<input style="margin-top: 8px;" type="submit" value="Cats!" />
				</form>
			</div>
			<?php if(isset($search)) { ?>
				<div style="margin-left: 38px;" class="row span12">
					<h1>Cats near <?=$search?></h1>
				</div>
			<?php } ?>			
			<div id="results" style="margin-top: 10px;">
				<?php for($i=0; $i<$length/2; $i++): ?>
				<div class="row span12">
					<?php for($k=$i*2; $k<($i*2+2) && $k<$length; $k++): ?>
						<?php $cat=$cats->results[$k]; ?>
						<div class="span5 well">
							<div class="row">
								<img class="span1" src="<?= $cat->profile_image_url ?>"/>
								<h2 class="span4"><a href="./twitteruser.php?username=<?= $cat->from_user ?>"><?= $cat->from_user ?></a></h2>
							</div>
							<div class="row">
								<p class="span5"><?= $cat->text ?></p>
							</div>
						</div>
					<?php endfor; ?>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</body>
</html>