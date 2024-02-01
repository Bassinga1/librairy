$('.add-favori').off().on('click', function(event){
    let livreId = $(this).data('livre-id');
    // On mémorise le bouton cliqué
    let button = $(this);
    // On analyser l'icone du bouton pour savoir si on ajoute le livre aux favoris ou si on
    // le supprime
    let action;
    if(button.find('i').hasClass('fa-regular')){
        action = "add";
    }else{
        action = "remove";
    }
    // On lance une requête Ajax vers le serveur
    $.ajax({
        url: '/favoris/add',
        method: 'POST',
        data: {
            idLivre: livreId,
            action: action
        }
    }).done(function(response){
        // On vérifie si le bouton est porteur de la classe from-user-profil auquel on supprime la carte parent 
        // sinon on change l'icone du bouton
        if(button.hasClass('from-user-profil')){
            button.closest('.parent-card').remove();
        }else{
            // Vérifie si l'icone de bouton est pleine ou vide et on l'inverse
            if(button.find('i').hasClass('fa-regular')){
                button.find('i').removeClass('fa-regular').addClass('fa-solid');
            }else{
                button.find('i').removeClass('fa-solid').addClass('fa-regular');
            }
        }
    });
});