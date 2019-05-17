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
      //.replace(/__name__/g,index)
      const str = '<div class="row my-3" id="blockPourcentage_registration_auteurRealisateurs___name__"><div class="col"><p></p></div><div class="col"><div class="row"><div><input type="text" id="registration_auteurRealisateurs___name___pourcentageAuteurRealisateur" name="registration[auteurRealisateurs][__name__][pourcentageAuteurRealisateur]" required="required" class="form-control-sm w-100" /></div><span>%</span></div></div></div>';
      const templates = $(selecteurDiv).data('prototype').replace(str,'').replace(/__name__/g,index);
      const newStr = str.replace(/__name__/g,index);
      // j'injecte ce code au sein de la div 
      console.log(templates);
      $(selecteurDiv).append(templates);

      $('.pourcentageAuteurRealisateur').append(newStr);
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
verifierSelectionnePorjetDeposeMbudget('#registration_deposant_0','.montant-budget');

 $('#registration_deposant_0').click(function(){
   voir('.production');
   voir('.montant-budget');
 });
 $('#registration_deposant_1').click(function(){
   cacher('.production');
   voir('.auteurRealisateurs');
   // il faut cacher le champ montant budget pour le cas de auteur/realisateur
   cacher('.montant-budget');

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
   }else{
      if(!$(selecteurVoir).is(':visible')) {
         voir(selecteurCache);
      }else {
         cacher(selecteurCache);  
         voir('.auteurRealisateurs');
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
   cacher('.col-dureeEpisode');
}else if($('#registration_typeFilm_1').is(':checked')){
   $('.dureeEnvisagee').html('Nombre d\'épisodes');
   $('.dureeEpisode').html('Durée par épisode');
}


if(!$('.typeFilm').is(':visible')){
$('.dureeEnvisagee').html('Durée envisagée');
  cacher('.col-dureeEpisode');
}
// pour les cliks
$('#registration_typeFilm_0').click(function(){
   $('.dureeEnvisagee').html('Durée envisagée');
   cacher('.col-dureeEpisode');
})
$('#registration_typeFilm_1').click(function(){
   voir('.col-dureeEpisode');
   $('.dureeEnvisagee').html('Nombre d\épisodes');
   $('.dureeEpisode').html('Durée par épisode');
   
})

// gestion checkbox listeLiensEligibilite  pour n'afficher que les 3 prémiers

if($('.liensEligibiliteReste').is(':visible')){
   $('#registration_liensEligibilite_3').hide();
   $('label[for="registration_liensEligibilite_3"]').hide();
   $('#registration_liensEligibilite_4').hide();
   $('label[for="registration_liensEligibilite_4"]').hide();
}
/**
 * gestion des affichages champs montant du budget avec le boutton projet déposé 
 */
function verifierSelectionnePorjetDeposeMbudget()
{
   if($('#registration_deposant_0').is(':checked')){
      voir('.montant-budget');
   }else if($('#registration_deposant_1').is(':checked')){
      cacher('.montant-budget')
   }
}
// gestion des affichage du label montant du budget
if($('#registration_typeAideLm_0').is(':checked') || $('#registration_typeAideDoc_0').is(':checked'))
{
   $('label[for="montant-budget"]').html('montant du budget écriture HT');
}else
if($('#registration_typeAideLm_1').is(':checked')){
   $('label[for="montant-budget"]').html('montant du budget réécriture HT');
}else
if($('#registration_typeAideDoc_1').is(':checked')){
   $('label[for="montant-budget"]').html('montant du budget développement HT');
}else
{
   $('label[for="montant-budget"]').html('montant du budget HT');
}
// pour les clicks
 $('#registration_typeAideLm_0').click(function(){
   $('label[for="montant-budget"]').html('montant du budget écriture HT');
})
$('#registration_typeAideLm_1',).click(function(){
   $('label[for="montant-budget"]').html('montant du budget réécriture HT');
});

$('#registration_typeAideDoc_0').click(function(){
   $('label[for="montant-budget"]').html('montant du budget écriture HT');
});
$('#registration_typeAideDoc_1').click(function(){
   $('label[for="montant-budget"]').html('montant du budget développement HT');
});

// gestion d'ajout des noms et prénoms des auteurs/réalisateurs
$('.prenom input[id$="prenom"]').css('background-color','#f11');
///$('label').css('background-color','#f11');
const t = $('#input-prenom').click(function(){
  const t = this.dataset.target;
  $(t).css('background-color','#f11');
});

 $('#registration_auteurRealisateurs_1_prenom').click(function(){
    alert('oki');
    console.log('oki');
   //const attr = $(this).getAttribute("id");
  // alert(attr);
});

});


