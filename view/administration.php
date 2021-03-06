<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<title>VideoStore</title>

	<!-- CSS  -->
	<link href="lib/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="lib/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
	<nav>
		<div class="nav-wrapper">
			<a href="#!" class="brand-logo">VideoStore</a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="sass.html">Utilisateurs</a></li>
				<li><a href="sass.html">Réservations</a></li>
				<li><a href="sass.html">Stock</a></li>
				<li><a href="sass.html">Mon compte</a></li>
				<li><a href="components.html">Déconnxion</a></li>
			</ul>
			<ul class="side-nav" id="mobile-demo">				
				<li><a href="sass.html">Utilisateurs</a></li>
				<li><a href="sass.html">Réservations</a></li>
				<li><a href="sass.html">Stock</a></li>
				<li><a href="sass.html">Mon compte</a></li>
				<li><a href="components.html">Déconnexion</a></li>
			</ul>
		</div>
	</nav>


	<!--  Scripts-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="lib/js/materialize.js"></script>
	<script src="lib/js/init.js"></script>
</body>
</html>