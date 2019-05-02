 // gerer l'ajout d'un auteur ou/et d'un réalisateur lors qu'on clique sur le button
 $('#ajoutAuteur-realisateur').click(function(){
     console.log('test');
    // je recupère le numero des futurs champs!
    const index  = $('#widget-counter').val();

    const tmpl = $('#registration_auteurRealisateurs').data('prototype');
    console.log(tmpl);
    
 });
 