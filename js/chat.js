$(document).ready(function (){
    
    // Permettre d'envoyer son message avec la touche Entrée
    
    $("#chatcontent").on("keydown", function(e){
        if(e.which == 13){         
            $('#sendMess').focus().click();
            return false;
        }
    });
    
    // Fonction qui actualise la messagerie
    
    function recupMessages(){
        
    $("#affichage").load(window.location.href + " #affichage" );
    }
    
    // Actualisation toutes les secondes 
    
    setInterval(recupMessages, 1000);
});
