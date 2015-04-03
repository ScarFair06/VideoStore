<?php
	require_once ("user.php");
	$test = new User(1,"VerrillDuplessis@jourrapide.com", "Duplessis", "Verrill","90, Rue Frédéric Chopin",27200,"VERNON","02.33.88.84.19","test","test",NULL);
	/*$myToken = $test->connexion("test", "test");*/
	/*echo $myToken;*/
	
	$afficheTableau = $test->displayEmployee("VideoStore" ,"VerrillDuplessis@jourrapide.com" ,'Duplessis' ,'Verrill' ,'90, Rue Frédéric Chopin' ,27200 ,'VERNON' ,'02.33.88.84.19');
	var_dump($afficheTableau);
	
	$testClient = new User(1,"admin@videostore.fr",	"Dupéré","Robert","27, Rue de Strasbourg",63100,"CLERMONT-FERRAND","04.06.05.23.12","admin", "admin", null);
	
	$afficheTableauBis = $testClient->displayClient("VerrillDuplessis@jourrapide.com", "Duplessis", "Verrill", "90, Rue Frédéric Chopin", 27200, "VERNON", "02.33.88.84.19" );
	var_dump($afficheTableauBis);
?>