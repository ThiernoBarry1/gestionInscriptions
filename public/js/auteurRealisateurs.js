 // gerer l'ajout d'un auteur ou/et d'un réalisateur lors qu'on clique sur le button
 $('#ajoutAuteur-realisateur').click(function(){
    // je recupère le numero des futurs champs!
    const index  = $('#widget-counter').val();
    // je remplace tous les __name__ par ce numero
    const templates = $('#auteurRealisateurs').data('prototype').replace(/__name__/g,index);
    // j'injecte ce code au sein de la div 
    $('#auteurRealisateurs').append(templates);
 });
 