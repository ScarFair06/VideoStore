$(document).ready(function(){
    
    $('#idChoisiLorsDuClick').click(function(){
        $('#idAffichage').load('page.html');
        
    });
    
});

//POUR SELECTIONNER UN SEUL ID D'UNE PAGE EXTERNE


$(document).ready(function(){
    
    $('#idChoisiLorsDuClick').click(function(){
        $('#idAffichage').load('page.html #idChoisiSurLaPage');
        
    });
    
});
