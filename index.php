<!DOCTYPE html>
<html class="no-js" lang="en-CA">
	<head>
		<meta charset="utf-8">
		
		<?php
			$titles = array (
				"about" => "About the Play",
				"bios" => "Bios of the Artists Involved",
				"contact" => "How to Contact Us",
				"dates-times" => "When and Where We're Performing"
			);
			
			
			if (isset($_GET['f'])) {
				$f = $_GET['f'];
			} else {
				$f = 'home';
			}
			
			if ( isset($f) && isset($titles[$f])) {
				$title = " - " . $titles[$f];
			} else {
				$title = "";
			}
		?>
		
		<title>
			Hiroic Products Presents: Mentor Me Through This Wonderland <?php echo $title ?>
		</title>
		<meta name="description" content="Mentor Me Through This Wonderland (Part 1) is proud to be having its World Premiere at the Windsor-Walkerville Fringe Festival!">
		<meta name="author" content="zoltan">

		<meta property="og:title" content="Hiroic Products Presents: Mentor Me Through This Wonderland <?php echo $title ?>" />
		<meta property="og:description" content="Mentor Me Through This Wonderland (Part 1) is proud to be having its World Premiere at the Windsor-Walkerville Fringe Festival!" />
		<meta property="og:image" content="previews/index.jpg" />

		<meta name="twitter:card" content="photo">
		<meta name="twitter:title" content="Hiroic Products Presents: Mentor Me Through This Wonderland <?php echo $title ?>">
		<meta name="twitter:image" content="previews/index.jpg">
		<meta name="author" content="Lorne Hiro and Zoltan Hawryluk">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<link rel="stylesheet" href="css/index.css" type="text/css" />
		<script>document.getElementsByTagName('html')[0].classList.remove('no-js')</script>
	</head>
	
	<?php
		/* Preload cache list grabbed by
		for i in "`find . -name "*.html"` index.php"; do  grep src $i; done | awk -F'src="' '{print $2}' | awk -F'"' '{print $1}'| grep images | sed "s/images\///g" | sort -u
	*/?>

	<body
		data-href="<?php
			if (isset($f)) {
				echo $f;
			} else {
				echo 'home';
			}?>"
		data-preload-images="bios/mobile/Chris-Zamat.jpg,bios/mobile/Erin-Eldershaw.jpg,bios/mobile/Fiona-Haque.jpg,bios/mobile/Francesco-Galle.jpg,bios/mobile/Gabe-Cameron.jpg,bios/mobile/Lorne-Hiro.jpg,bios/mobile/Sally-Jones.jpg,bios/mobile/Tracy-Rankin.jpg,bios/mobile/Zoltan-Hawryluk.jpg,bios/mobile/janet-banks.jpg,charles-arm-down-800.svgz,charles-arm-up-800.svgz,hiroic.svg,janet-800.svgz,social/email.svg,social/facebook.svg,social/instagram.svg,social/phone.svg,social/twitter.svg,swirl-1225.svgz,victoria-fringe.svg,windsor-fringe.svg"
		data-image-dir="images"	
	>
		<header>
		<h1><a class="pp-link" href="?f=home"><?php include "images/banner-fill.svg"; ?></a></h1>
			<nav>
				<ul class="desktop-nav">
					<li><a class="pp-link" href="?f=about">About</a></li>
					<li><a class="pp-link" href="?f=dates-times">Dates and Times</a></li>
					<li><a class="pp-link" href="?f=bios">Bios</a></li>
					<li><a class="pp-link" href="?f=contact">Press &amp; Contact</a></li>
					<li class="social"><a target="_blank" href="https://www.facebook.com/Hiroic-Productions-113065348728921/"><img class="nav-logo" src="images/social/facebook.svg" alt="Hiroic Productions' Facebook page" /></a></li>
					<li class="social"><a target="_blank" href="https://twitter.com/HiroicActors"><img class="nav-logo" src="images/social/twitter.svg" alt="Hiroic Productions' Twitter page" /></a></li>
					<li class="social"><a target="_blank" href="https://www.instagram.com/hiroic_artist/"><img class="nav-logo" src="images/social/instagram.svg" alt="Hiroic Productions' Instagram page" /></a></li>
				</ul>
				<form class="pp-form mobile-nav" data-pp-events="change">
					<select name="f">
						<option value="home" selected>Home</option>
						<option value="about">About</option>
						<option value="dates-times">Dates and Times</option>
						<option value="bios">Bios</option>
						<option value="contact">Press &amp; Contact</option>
					</select>
					
				</form>
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
			
		</main>
		
		
		
		
		<div id="screen-reader-alert"
				class="visually-hidden"
				role="alert"
				aria-relevant="all"
				aria-live="assertive"
			>Now displaying the <strong class="page-name"><?php echo $f; ?></strong> page.</div>
			
		<progress id="preloader" max="21" value="0">
			<strong>Loaded 0%.</strong>
		</progress>
		
		<script type='text/javascript' src='js/bug/bug-min.js'></script>
		<script type='text/javascript'>
			// default spiders:
			
		</script>
		<script src="js/progressive-pushstate.js"></script>
		<script src="js/index.js"></script>
	</body>
</html>
