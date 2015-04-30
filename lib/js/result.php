<?php
//connexion à la bdd
if(isset($_GET['motclef'])){
    
    $motclef = $_GET['motclef'];
    $q = array('motclef'=>$motclef. '%');
    $sql = 'SELECT title, etc FROM bdd WEHRE title like :motclef or etc like:motclef';
    $req = $bdd/*variable de la connexion à pdo */ ->prepare($sql);
    $req->execute($q);
    $count = $req->rowCount($sql);
    
    if($count == 1){
        while($result = $req->fetch(PDO::FETCH_OBJ)){
            
            echo " Titre :".$result->title."<br/>Autre:".$result->etc;
        }
    }else{
         echo "Aucun resultat";
         
     }
    }
?>
