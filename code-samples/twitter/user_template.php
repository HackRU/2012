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
			<div class="row span12">
				<div class="span6">
					<h2>Presenting to you...</h2>
					<div class="well">
						<div class="row">
							<img class="span1" src="<?= $user_tweets[0]->user->profile_image_url ?>"/>
							<h2 class="span4"><a target="_blank" href="https://twitter.com/#!/<?= $username ?>"><?= $username ?></a></h2>
						</div>
						<div class="row">
							<p class="span5"><?= $user_tweets[0]->user->description ?></p>
						</div>
					</div>
				</div>
				<div class="span5">
					<h2>How cat crazy?</h2>
					<div class="well">
						<p>Out of <?= $username ?>'s last 100 tweets <?= $count ?> were about cats!<p>
						<?php for($i=0; $i<$count; $i++): ?>
							<img class="cute" src="http://www.delawaregirlsinitiative.org/wp-content/uploads/2012/01/kitten-50x50.jpg" />
						<?php endfor; ?>
					</div>
				</div>
			</div>
			<div id="results" style="margin-top: 10px;">
				<h2 style="margin-left: 38px;">Their tweets about cats!</h2>
				<div class="row span12">
					<?php if($count!=0) { ?>
						<?php for($i=0; $i<($count/2)+1; $i++): ?>
							<?php for($k=$i*2; $k<($i*2+2) && $k<$count; $k++): ?>
								<?php $cat=$cat_tweets[$k]; ?>
								<div class="span5 well">
									<div class="row">
										<p class="span5"><?= $cat->text ?></p>
									</div>
								</div>
							<?php endfor; ?>
						<?php endfor; ?>
					<?php } else { ?>
						<img src="http://media.photobucket.com/image/recent/rick_gilbert/wallpaper.jpg" />
					<?php } ?>
				</div>
			</div>
		</div>
	</body>
</html>