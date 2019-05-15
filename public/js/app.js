$(document).ready(function()
{     
   "use strict";
   // gerer l'ajout d'un auteur ou/et d'un réalisateur lors qu'on clique sur le button

  
   $('#ajoutAuteur-realisateur').click(function()
   { 
      traitementEvenClicks('#auteurRealisateurs','#widget-counter','#ajoutAuteur-realisateur');
      // j'effectue la suppressesion du formulaire auteur réalisateur 
      supFormAuteurRealisateur('button[data-action="delete"]');
      counterForm('#auteurRealisateurs div.form-group','#widget-counter');
      // car je n'est pas compris pourquoi il récupère 3 sur le 1er clique sur le boutton
      let estimeDiv = +$('#auteurRealisateurs div.form-group').length
      // je récupère la partie entière de la division.
      let count = Math.floor(estimeDiv/2);
      
      
   });
   $('#ajoutDocumentAudioVisuels').click(function(){
      traitementEvenClicks('#documentAudioVisuels','#widget-counter-documentAudioVisuels','#ajoutDocumentAudioVisuels');
      // j'effectue la suppressesion du formulaire auteur réalisateur 
      supFormAuteurRealisateur('button[data-action="delete-documentAudioVisuels"]');
      counterForm('#documentAudioVisuels div.form-group','#widget-counter-documentAudioVisuels');
   });

   /**
    * supprime le formulaire auteur réalisateur
    * 
    * @param {String} boutton 
    */
   function supFormAuteurRealisateur(boutton) {
      $(boutton).click(function(){
      const target = this.dataset.target;
      $(target).remove();
      // je rend le button ajout visible à chaque suppression
       $('#ajoutDocumentAudioVisuels').show(); 
      });
   }

   /**
    * compte le nombre de fois qu'on a ajouté le formulaire auteur réalisateur
    * 
    * @param {String} div 
    * @param {String} widget_counter 
    */
   function counterForm(div,widget_counter)
   {  const count = +$(div).length;
      $(widget_counter).val(count);
   }

   /**
    * 
    * @param {String} selecteurClass 
    * @param {boolean} isAuteurRealisateur 
    * @param {String} widget_counter 
    * @param {String} selecteurButton 
    */
   function traitementEvenClicks(selecteurDiv,widget_counter,selecteurButton){
      // je recupère le numero des forms !
      let index  = +$(widget_counter).val();
      // je remplace tous les __name__ par ce numero
      const templates = $(selecteurDiv).data('prototype').replace(/__name__/g,index);
   
      // j'injecte ce code au sein de la div 
      $(selecteurDiv).append(templates);
   
      // compter le nombre de form  
      $(widget_counter).val(index+1);
      
      const count = +$('#documentAudioVisuels div.form-group').length;
      if(count >= 2)
      {
         $(selecteurButton).hide();
      }
     
  

   }



  
   counterForm('#auteurRealisateurs div.form-group','#widget-counter');
   supFormAuteurRealisateur('button[data-action="delete"]');

   supFormAuteurRealisateur('button[data-action="delete-documentAudioVisuels"]');
   counterForm('#documentAudioVisuels div.form-group','#widget-counter-documentsAudioVisuels');
   
  
  calculDevisPrevisionnel('.ht input','.input-totalHtTotalGeneral');
  calculDevisPrevisionnel('.htNormandie input','.input-totalHtNormandieTotalGeneral');
   
  /**
   * permet d'effectue le calcul de devis prévisionnel 
   * cette méthode traite le cas montant Ht et dont rn région Normandie
   * @param {String} selecteurInput 
   * @param {String} selecteurInputTotal 
   */
   function calculDevisPrevisionnel(selecteurInput,selecteurInputTotal){
      $(selecteurInput).on('change',function(){
         if(isNaN($(this).val())) {
            $(this).css('background-color','#f11');
            alert('Vous ne devez saisir que des valeurs réelles');
            $(this).css('background-color','#FFFFFF');
         }else{
            var TOTAL = 0;
            calculMontantTotal(TOTAL,selecteurInput,selecteurInputTotal);
         }
      });
   }
   
   
   /**
    * permet de calculer le montant total à chaque fois qu'on saisie une 
    * valeur dans un champ input.
    * 
    * @param {integer} Total 
    * @param {string} selecteurInputs 
    * @param {sting} selecteurInputMontantTotal 
    */
   function calculMontantTotal(Total,selecteurInputs,selecteurInputMontantTotal){
      $('.row').find(selecteurInputs).each(function(){
         var valeur_saisie = $(this).val();
         Total = Total + +valeur_saisie;
     });
     $(selecteurInputMontantTotal).val(Total);
   }

   /**
    * permet de gérer la saisie de la virgule dans les inputs
    * 
    * @param {String} selecteurInput 
    */ 
 function traitementVirgule(selecteurInput){
    $(selecteurInput).keypress(function(e){
     var inp_val = $(this).val();
     if (inp_val.indexOf(',') != -1) {
       var cut = inp_val.split(",");
       $(this).val(cut.join('.'));
     }
    });
 }

   traitementVirgule('.ht input');
   traitementVirgule('.htNormandie input');

      
 
// traitement boutton radio partie genre
verifieNonSelectionne('#registration_genre_0','.genrePrecisionAutre');
verifieNonSelectionne('#registration_genre_1','.genrePrecisionAutre');
verifieNonSelectionne('#registration_genre_2','.genrePrecisionAutre');

 $('#registration_genre_0,#registration_genre_1,#registration_genre_2').click( function()
  {
   cacher('.genrePrecisionAutre');     
  });                 
 $('#registration_genre_3').click(function(){
   voir('.genrePrecisionAutre');
 });
 
 // traitement boutton radio partie adaptationOeuvre
 verifieSelectionne('#registration_adaptationOeuvre_0','.adaptationOeuvrePrecision');

 $('#registration_adaptationOeuvre_1').click(function(){
   cacher('.adaptationOeuvrePrecision');
 });
 $('#registration_adaptationOeuvre_0').click(function(){
   voir('.adaptationOeuvrePrecision');
 });
 // traitement projet déposé par 
 
 verifieSelectionneProjetDepose('#registration_deposant_0','.production');

 $('#registration_deposant_0').click(function(){
   voir('.production');
 });
 $('#registration_deposant_1').click(function(){
   cacher('.production');
   voir('.auteurRealisateurs');

   // il faut cacher le champ montant budget pour le cas de auteur/realisateur
   $('.montant-budget').hide();

 });
 // traitement financement acquis
 verifieSelectionne('#registration_financementAcquis_0','.financementAcquisPrecision');

 $('#registration_financementAcquis_0').click(function(){
   voir('.financementAcquisPrecision');
 });
 $('#registration_financementAcquis_1').click(function(){
   cacher('.financementAcquisPrecision');
 });

 // traiement dépôt collectivité 
 verifieSelectionne('#registration_depotProjetCollectivite_0','.depotProjetCollectivitePrecision');

 $('#registration_depotProjetCollectivite_0').click(function(){
   voir('.depotProjetCollectivitePrecision');
 });
 $('#registration_depotProjetCollectivite_1').click(function(){
   cacher('.depotProjetCollectivitePrecision');
 });
 
// traitement Projet Déjà presenté au fonds d'aide
verifieSelectionne('#registration_projetDejaPresenteFondsAide_0','.projetDejaPresenteFondsAidePrecision');

 $('#registration_projetDejaPresenteFondsAide_0').click(function(){
   voir('.projetDejaPresenteFondsAidePrecision');
 });
 $('#registration_projetDejaPresenteFondsAide_1').click(function(){
   cacher('.projetDejaPresenteFondsAidePrecision');
 });

// traitement autorisationtype d'aide développement
$('#registration_typeAideDoc_1').click(function(){
   if($('#registration_deposant_1').is(':checked')){
      alert('uniquement les producteurs peuvent déposer en développement');
   }
});

/**
 * Partie concerne uniquement projet Deposer par :
 *  verifie si le seclecteurVoir est coché et affhicher la div correspondante
 *  
 * @param {String} selecteurVoir 
 * @param {String} selecteurCache 
 */
 function verifieSelectionneProjetDepose(selecteurVoir,selecteurCache)
 {
   if($(selecteurVoir).is(':checked')){
      voir(selecteurCache);
      $('.montant-budget').show();  
   }else{
      if(!$(selecteurVoir).is(':visible')) {
         voir(selecteurCache);
      }else {
         cacher(selecteurCache);  
         voir('.auteurRealisateurs');
         $('.montant-budget').hide();
      }
   }
 }
 /**
  * Partie concerne tous les traitement où un clique sur le checkbox "oui" permet
  * d'afficher la div
  * 
  * @param {String} selecteurVoir 
  * @param {String} selecteurCache 
  */
 function verifieSelectionne(selecteurVoir,selecteurCache)
 {
   if($(selecteurVoir).is(':checked')){
      voir(selecteurCache);  
   }else{
      cacher(selecteurCache);  
   }
 }
 /**
  * Partie concerne tous les traitement où un clique sur le checkbox "oui" permet
  * de cacher la div
  * @param {String} selecteurVoir 
  * @param {String} selecteurCache 
  */
 function verifieNonSelectionne(selecteurVoir,selecteurCache)
 {
   if($(selecteurVoir).is(':checked')){
      cacher(selecteurCache);  
   }
 }
 /**
  *  permet de masquer 
  * @param {String} selecteur 
  */
 function  cacher(selecteur)
 {
     $(selecteur).hide();  
 }
 /**
  * permet de demasque
  * @param {String} selecteur 
  */
function voir(selecteur)
{
   if(!$(selecteur).is(':visible')){
      $(selecteur).show();  
   }
}
// partie traitment de durée envisage pour le projet
if ($('#registration_typeFilm_0').is(':checked') )
{
   $('.dureeEnvisagee').html('Durée envisagée');
}else{
   $('.dureeEnvisagee').html('Nombre d\'épisode(s),durée par épisode');

   if(!$('typeFilm').is(':visible'))
   {
      $('.dureeEnvisagee').html('Durée envisagée');
   }
      
   
}

gestionClick('#registration_typeFilm_0','Durée envisagée');
gestionClick('#registration_typeFilm_1','Nombre d\'épisode(s),durée par épisode');

/**
 * 
 * @param {String} selecteur 
 * @param {String} texte 
 */
function gestionClick(selecteur,texte)
{
   $(selecteur).click(function(){
      $('.dureeEnvisagee').html(texte);
   })
}


});

