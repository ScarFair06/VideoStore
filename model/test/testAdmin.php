<?php
	require_once ("user.php");
	require_once ("video.php");
	$test = new User(1,"VerrillDuplessis@jourrapide.com", "Duplessis", "Verrill","90, Rue Frédéric Chopin",27200,"VERNON","02.33.88.84.19","test","test",NULL);
	/*$myToken = $test->connexion("test", "test");*/
	/*echo $myToken;*/
	
	echo "<h2>user.php</h2>
			<h3>Test afficheEmployee</h3>";
	$afficheTableau = $test->displayEmployee("VideoStore" ,"VerrillDuplessis@jourrapide.com" ,'Duplessis' ,'Verrill' ,'90, Rue Frédéric Chopin' ,27200 ,'VERNON' ,'02.33.88.84.19');
	var_dump($afficheTableau);

	echo "<h3>Test afficheClient</h3>";
	$testClient = new User(1,"admin@videostore.fr",	"Dupéré","Robert","27, Rue de Strasbourg",63100,"CLERMONT-FERRAND","04.06.05.23.12","admin", "admin", null);
	$afficheTableauBis = $testClient->displayClient("VerrillDuplessis@jourrapide.com", "Duplessis", "Verrill", "90, Rue Frédéric Chopin", 27200, "VERNON", "02.33.88.84.19" );
	var_dump($afficheTableauBis);
	
	echo "<h2>video.php</h2>
			<h3>Test afficheVideo</h3>";
	$maVideo = new Video(1, "Interstellar","Christopher Nolan", "Warner Bros", "2014-11-05", "Science fiction", 5, 12 ,"J_interstellar.jpg" ,"Le film raconte les aventures d’un groupe d’explor...");
	$afficheVideo = $maVideo->displayVideo("Interstellar","Christopher Nolan", "Warner Bros", "2014-11-05", "Science fiction", 5, 12 ,"J_interstellar.jpg" ,"Le film raconte les aventures d’un groupe d’explor...");
	var_dump($afficheVideo);
	
	echo "<h3>Ajout video</h3>";
	$newVideo = new Video(2, "Taken 3", "Olivier Megaton", "EuropaCorp Distribution", "2015-01-15", "Action", 20, 20, "J_taken3.jpg", "L’ex-agent spécial Bryan Mills voit son retour à une vie tranquille bouleversé lorsqu’il est accusé à tort du meurtre de son ex-femme, chez lui, à Los Angeles. En fuite et traqué par l’inspecteur Dotzler, Mills va devoir employer ses compétences particulières une dernière fois pour trouver le véritable coupable, prouver son innocence et protéger la seule personne qui compte désormais pour lui – sa fille.");
	$ajoutVideo = $newVideo->addVideo("Taken 3", "Olivier Megaton", "EuropaCorp Distribution", "2015-01-15", "Action", 20, 20, "J_taken3.jpg", "L’ex-agent spécial Bryan Mills voit son retour à une vie tranquille bouleversé lorsqu’il est accusé à tort du meurtre de son ex-femme, chez lui, à Los Angeles. En fuite et traqué par l’inspecteur Dotzler, Mills va devoir employer ses compétences particulières une dernière fois pour trouver le véritable coupable, prouver son innocence et protéger la seule personne qui compte désormais pour lui – sa fille.");
?>