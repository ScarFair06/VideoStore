<?php
	require_once ("user.php");
	$test = new User(1,"VerrillDuplessis@jourrapide.com", "Duplessis", "Verrill","90, Rue Frédéric Chopin",27200,"VERNON","02.33.88.84.19","test","test",NULL);
	/*$myToken = $test->connexion("test", "test");*/
	/*echo $myToken;*/
	
	$test->displayEmployee("VideoStore" ,"VerrillDuplessis@jourrapide.com" ,'Duplessis' ,'Verrill' ,'90, Rue Frédéric Chopin' ,27200 ,'VERNON' ,'02.33.88.84.19');


?>