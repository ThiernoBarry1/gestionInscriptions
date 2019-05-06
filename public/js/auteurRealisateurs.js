$(document).ready(function(){
   // gerer l'ajout d'un auteur ou/et d'un réalisateur lors qu'on clique sur le button
   $('#ajoutAuteur-realisateur').click(function(){
      
      traitementEvenClicks('#auteurRealisateurs','#widget-counter');
      // j'effectue la suppressesion du formulaire auteur réalisateur 
      supFormAuteurRealisateur('button[data-action="delete"]');
      counterForm('#auteurRealisateurs div.form-group','#widget-counter');
   });
   $('#ajoutDocumentAudioVisuels').click(function(){
      traitementEvenClicks('#documentAudioVisuels','#widget-counter-documentAudioVisuels');
      // j'effectue la suppressesion du formulaire auteur réalisateur 
      supFormAuteurRealisateur('button[data-action="delete-documentAudioVisuels"]');
      counterForm('#documentAudioVisuels div.form-group','#widget-counter-documentsAudioVisuels');
   });
   /**
    * supprime le formulaire auteur réalisateur
    */
   function supFormAuteurRealisateur(button) {
      $(button).click(function(){
      const target = this.dataset.target;
      $(target).remove();
      });
   }

   /**
    * compte le nombre de fois qu'on a ajouté le formulaire auteur réalisateur
    */
   function counterForm(div,widget_counter){
      const count = +$(div).length;
      $(widget_counter).val(count);
   }
   
   function traitementEvenClicks(auteur,widget_counter){
   // je recupère le numero des forms !
   const index  = +$(widget_counter).val();

   // je remplace tous les __name__ par ce numero
   const templates = $(auteur).data('prototype').replace(/__name__/g,index);

   // j'injecte ce code au sein de la div 
   $(auteur).append(templates);

   // compter le nombre de form  auteur réalisateur
   $(widget_counter).val(index+1);
   }



   // je positionne les méthodes dès le prémier lancement de la page
   counterForm('#auteurRealisateurs div.form-group','#widget-counter');
   supFormAuteurRealisateur('button[data-action="delete"]');

   // pour le form documentAudioVisuels
   supFormAuteurRealisateur('button[data-action="delete-documentAudioVisuels"]');
   counterForm('#documentAudioVisuels div.form-group','#widget-counter-documentsAudioVisuels');
   
});

