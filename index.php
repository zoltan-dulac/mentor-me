<!DOCTYPE html>
<html lang="en-CA">
	<head>
		<meta charset="utf-8">

		<title>Hiroic Products Presents: Mentor Me Through This Wonderland</title>
		<meta name="description" content="#DESC#">
		<meta name="author" content="zoltan">

		<meta property="og:title" content="Hiroic Products Presents: Mentor Me Through This Wonderland" />
		<meta property="og:description" content="Mentor Me Through This Wonderland (Part 1) is proud to be having its World Premiere at the Windsor-Walkerville Fringe Festival!" />
		<meta property="og:image" content="previews/index.jpg" />

		<meta name="twitter:card" content="photo">
		<meta name="twitter:title" content="Hiroic Products Presents: Mentor Me Through This Wonderland">
		<meta name="twitter:image" content="previews/index.jpg">
		<meta name="author" content="Lorne Hiro and Zoltan Hawryluk">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<link rel="stylesheet" href="css/index.css" type="text/css" />

	</head>

	<body data-href="<?php
				if (isset($_GET['f'])) {
					echo $_GET['f'];
				} else {
					echo 'home';
				}
			?>">
		<header>
		<h1><a class="pp-link" href="?f=home"><?php include "images/banner-fill.svg"; ?></a></h1>
			<nav>
				<ul>
					<li><a class="pp-link" href="?f=about">About</a></li>
					<li><a class="pp-link" href="?f=dates-times">Dates and Times</a></li>
					<li><a class="pp-link" href="?f=bios">Bios</a></li>
					<li><a class="pp-link" href="?f=contact">Contact</a></li>
					<li><a class="pp-link" href="?f=press">Press</a></li>
				</ul>
			</nav>
		</header>
		<main id="content">
			<?php
				if (isset($_GET["f"])) {
					$fragment = $_GET["f"];
				} else {
					$fragment = "home";
				}
				include "includes/" . $fragment . ".html";
			?>
			
		</div>
		
		
		
		
		<div id="screen-reader-alert"
				class="visually-hidden"
				role="alert"
				aria-relevant="all"
				aria-live="assertive"
			>Now displaying the <strong class="page-name"><?php echo $_GET["f"]; ?></strong> page.</div>
		<script type='text/javascript' src='js/bug/bug-min.js'></script>
		<script type='text/javascript'>
			// default spiders:
			
		</script>
		<script src="js/progressive-pushstate.js"></script>
		<script src="js/index.js"></script>
	</body>
</html>
