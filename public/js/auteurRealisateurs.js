 // gerer l'ajout d'un auteur ou/et d'un réalisateur lors qu'on clique sur le button
 $('#ajoutAuteur-realisateur').click(function(){
    // je recupère le numero des form !
    const index  = +$('#widget-counter').val();

    // je remplace tous les __name__ par ce numero
    const templates = $('#auteurRealisateurs').data('prototype').replace(/__name__/g,index);

    // j'injecte ce code au sein de la div 
    $('#auteurRealisateurs').append(templates);

    // compter le nombre de form  auteur réalisateur
    $('#widget-counter').val(index+1);

    // j'effectue la suppressesion du formulaire auteur réalisateur 
    supFormAuteurRealisateur();
    counterForm();
 });

 // je positionne la méthode dès le prémier lancement de la page
 
 /**
  * supprime le formulaire auteur réalisateur
  */
 function supFormAuteurRealisateur() {
    $('button[data-action="delete"]').click(function(){
    const target = this.dataset.target;
    $(target).remove();
    });
 }

 /**
  * compte le nombre de fois qu'on a ajouté le formulaire auteur réalisateur
  */
 function counterForm(){
   const count = +$('#auteurRealisateurs div.form-group').length;
   console.log(count);
   $('#widget-counter').val(count);
 }
 counterForm();
 supFormAuteurRealisateur();
