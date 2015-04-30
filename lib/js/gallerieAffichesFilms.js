//Necessaire : id aux images et rel
//lorsque l'on cliquera sur une des petites images, l'image + la description du fil se chargera
$(document).ready(function(){
   //galerie_desc est la div contenant les grandes images
    $("#galerie_desc").hide();
    //galerie contient de petites affiches
    $('#galerie a').click(function(){
        
        if(
            $("#" + this.rel).is(":hidden")){
                
                $("#galerie_desc img").hide(); //cache l'image déjà affichée
                $("#" + this.rel).show();
            }
         
        
    });
});
