$(document).ready(function(){
 $("#idDansInputRecherche").keyup(function(){
     
     var recherche = $(this).val();
     var data = 'motclef=' + recherche;
     if(recherche.length>3){
         
         $.ajax({
            type: "GET",
            url: "result.php",
            data: data,
            success: function(server_response){            //permet de savoir si le serveur renvoie une erreur ou non
             
             $("#resultat").html(server_response).show();
             
             
            }
        });
     }
     
 });   
    
});

