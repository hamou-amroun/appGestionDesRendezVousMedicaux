<?php
$id=$_SESSION['id_docteur_connecter'];
	require "includes/connect_bd.php";
	$reponse = $bdd->prepare('SELECT * FROM docteur where id=:id');
    $reponse->execute(array('id'=>$id));

while ($donnees = $reponse->fetch()){

$nom=$donnees['nom'];
$prenom=$donnees['prenom'];
$date_de_naissance=$donnees['date_de_naissance'];
$num_de_tel=$donnees['num_de_tel'];
$email=$donnees['email'];
$mot_de_passe=$donnees['mot_de_passe'];
$specialite=$donnees['specialite'];
$wilaya=$donnees['wilaya'];
$commune=$donnees['commune'];
$repos=$donnees['repos'];
$duree=$donnees['duree'];
$nombre_visite=$donnees['nombre_visite'];

$duree_repos=$donnees['duree_repos'];

$photo=$donnees['photo'];

$heure_debut_de_travail1=$donnees['debut_de_travail'];	
$debut_de_travail1= new DateTime($heure_debut_de_travail1);
    
$heure_debut1=$donnees['pause_midi'];	
$pause_midi1= new DateTime($heure_debut1);    
    
}

	 if($duree=="PT0H30M0S") {$duree=30;}
else if ($duree=="PT0H45M0S") {$duree=45;}
else if ($duree=="PT1H0M0S") {$duree=60;}

	 if($duree_repos=="PT0H10M0S") {$duree_repos=10;}
else if ($duree_repos=="PT0H15M0S") {$duree_repos=15;}
else if ($duree_repos=="PT0H20M0S") {$duree_repos=20;}
else if ($duree_repos=="PT0H30M0S") {$duree_repos=30;}
else if ($duree_repos=="PT0H45M0S") {$duree_repos=45;}
else if ($duree_repos=="PT1H0M0S") {$duree_repos=60;}
else if ($duree_repos=="PT1H15M0S") {$duree_repos=75;}
else if ($duree_repos=="PT1H30M0S") {$duree_repos=90;}
else if ($duree_repos=="PT2H0M0S") {$duree_repos=120;}


?>


<section class="page-section">
<div class="container">
<div class="row">
<div class="col-sm-4">

<form  action="testertester.php" method="post" enctype="multipart/form-data" >
<div class="container">
<div class="row">
	<input 	type='file'class='input-ghost' name='monfichier' style='visibility:hidden; height:0'
			onchange="$(this).next().find('input').val(($(this).val()).split('\\').pop());">    
  
	<div class="input-group input-file" name="monfichier">
	<div class="row">
	<div class="col-sm-12">
		<img class="img-responsive col-xs-7 col-sm-9" src="uploads/<?php echo $photo;?>.jpg" name="monfichier"  title='Cliquez pour choisir une photo...'style="cursor:pointer"
				onclick="$(this).parents('.input-file').prev().click(); return false;"
		/></div>
		</div>
		<div class=" form-inline">
		<div class="col-sm-12 input-group">

<input type="text" name="monfichier" class="form-control" placeholder='cliquez pour Choisir une photo...'style="cursor:pointer"
				onclick="$(this).parents('.input-file').prev().click(); return false;"
		/>
            
   <span class="input-group-btn">    <button  class="btn btn-success" value="Envoyer le fichier" >Ajouter</button></span>
        </div>
        
        </div>       
</div>

</div> 
   </div> 
    
    
    
    

    
 
    </form>   
</div>
  <div class="col-sm-offset-1 col-sm-7">

<h2 style="font-size:px">détails supplémentaires sur le cabinet</h2>
<form action="" id="form_detail">
<textarea name="" id="" cols="25" rows="8" class="form-control" placeholder="Exemple: Adresse précise du cabinet ... Prix d'une visite ...      "></textarea>
 
<button class="btn btn-success pull-right"> Modifier</button>
</form>
    </div>  
    
   </div> 
   <div class="row">
      
      <!--Information Personnelle Div gauche-->
       <div class="col-sm-6">
       

<h2 style="font-size:18px">informations Personnelles </h2>



<form onsubmit="return false;" class="form-inline" id="form_m_nom">

<div class="input-group ">

     <label for="nom" class="sr-only">prenom</label>
            <input type="text" class="form-control" name="nom" id="nom" disabled placeholder="NOM" value="<?php echo $nom;?>" >
<span class="input-group-btn"> <button class=" btn btn-default" id="bouton_m_nom" style="visibility:hidden;" disabled type="button">modifier</button></span>

</div>
           </form><br>
<form onsubmit="return false;" class="form-inline" id="form_m_prenom">

<div class="input-group ">

     <label for="prenom" class="sr-only">prenom</label>
            <input type="text" class="form-control" name="prenom" id="prenom" disabled placeholder="PRENOM" value="<?php echo $prenom;?>" >
<span class="input-group-btn"> <button class=" btn btn-default" id="bouton_m_prenom" style="visibility:hidden;" disabled type="button">modifier</button></span>

</div>
           </form><br>
<form onsubmit="return false;" class="form-inline" id="form_m_date_de_naissace">

<div class="input-group ">

     <label for="date_de_naissance" class="sr-only">date de naissane</label>
            <input style=" " type="text" class="form-control" name="date_de_naissance" id="date_de_naissance" disabled placeholder="date_de_naissance" value="<?php echo $date_de_naissance;?>"  >
<span class="input-group-btn"> <button class=" btn btn-default" id="" type="button" style="visibility:hidden;" disabled>modifier</button></span>

</div>
           </form> <br>         
<form onsubmit="return false;" class="form-inline" id="form_m_numero_de_tel">
<div class="input-group ">

     <label for="numero_de_tel" class="sr-only">Numero_de_tel</label>
            <input type="text" class="form-control" name="numero_de_tel" id="numero_de_tel" placeholder="numero_de_tel" value="<?php echo $num_de_tel;?>"  >
<span class="input-group-btn"> <button class=" btn btn-default" id="bouton_m_numero_de_tel" type="button"  >modifier</button></span>

</div></form> <br>           
<form onsubmit="return false;" class="form-inline" id="form_m_email">

<div class="input-group ">

     <label for="email" class="sr-only">Numero_de_tel</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="email" value="<?php echo $email;?>"  >
<span class="input-group-btn"> <button class=" btn btn-default" id="bouton_m_email" type="button"  >modifier</button></span>

</div>
           </form> <br>           
<form onsubmit="return false;" class="form-inline" id="form_m_wilaya">
   <div class="row">
<div class="wilaya form-group col-sm-3">
    <div class="input-group">
        
        <select id="wilaya" name="wilaya" style="" class=" form-control ">
          <option value=""><?php echo $wilaya;?></option>

<option  value="tizi ouzou" > Tizi Ouzou</option> 			
<option  value="bejaia" > Béjaia</option> 			
<option  value="alger" > Alger</option> 
       	
        </select>
    </div>
    </div>

<div class="commune form-group col-sm-3">

       <div class="input-group">
        
        <select id="commune" name="commune" disabled="true" title="vous devez selectionner une wilaya" style="" class=" form-control ">
     <option value=""><?php echo $commune;?></option>
												
<option  value="Tizi Ouzou" class="tizi ouzou" > Tizi Ouzou</option>						
<option  value="Azazga" class="tizi ouzou" > Azazga</option>						
<option  value="Freha" class="tizi ouzou" > Freha</option>						
<option  value="Bouzeguene" class="tizi ouzou" > Bouzeguene</option>						
<option  value="Draa El Mizan" class="tizi ouzou" > Draa El Mizan</option>						
<option  value="Tizi Gheniff" class="tizi ouzou" > Tizi Gheniff</option>						
<option  value="Ait Ziki" class="tizi ouzou" > Ait Ziki</option>						
<option  value="Illoula" class="tizi ouzou" > Illoula</option>						
<option  value="Iferhounane" class="tizi ouzou" > Iferhounane</option>						
<option  value="Yakouren" class="Tizi Ouzou" > Yakouren</option>						
<option  value="Larbaa Nath Irathen" class="tizi ouzou" > Larbaa Nath Irathen</option>						
<option  value="Ouagyenoun" class="tizi ouzou" > Ouagyenoun</option>						
<option  value="Maathas" class="tizi ouzou" > Maathas</option>						
<option  value="Tizi Rached" class="tizi ouzou" > Tizi Rached</option>						
<option  value="Ouadhia" class="tizi ouzou" > Ouadhia</option>						
<option  value="Azeffoun" class="tizi ouzou" > Azeffoun</option>						
<option  value="Tigzirt" class="tizi ouzou" > Tigzirt</option>						
<option  value="Idjeur" class="tizi ouzou" > Idjeur</option>						
<option  value="Ait Yenni" class="tizi ouzou" > Ait Yenni</option>						
<option  value="Bejaia" class="bejaia" > Bejaia</option>						
<option  value="Akbou" class="bejaia" > Akbou</option>						
<option  value="Tichy" class="bejaia" > Tichy</option>						
<option  value="Ighil Ali" class="bejaia" > Ighil Ali</option>						
<option  value="akfadou" class="bejaia" > akfadou</option>						
<option  value="Melbou" class="bejaia" > Melbou</option>						
<option  value="Aokas" class="bejaia" > Aokas</option>						
<option  value="Alger-Centre" class="alger" > Alger-Centre</option>						
<option  value="Bab El Oued" class="alger" > Bab El Oued</option>						
<option  value="Casbah" class="alger" > Casbah</option>						
<option  value="Kouba" class="alger" > Kouba</option>
<option  value="Ben Aknoun" class="alger" > Ben Aknoun</option> 
        </select>
    </div>
   
       </div>      <bouton class=" col-sm-2 btn btn-default " style="background-color: white;
    border-color: #adadad; " id="bouton_m_wilaya">Modifier</bouton> </div></form>
    <br>
    <form onsubmit="return false;" class="form-inline" id="form_m_date_de_naissace">

<div class="input-group ">

     <label for="specialite" class="sr-only">date de naissane</label>
            <input style=" " type="text" class="form-control" name="specialite" id="specialite" disabled placeholder="specialité" value="<?php echo $specialite;?>"  >
<span class="input-group-btn"> <button class=" btn btn-default" id="" type="button" style="visibility:hidden;" disabled>modifier</button></span>

</div>
           </form> <br>



</div > <!--Fin Div gauche-->
          





































<!--Information Professionel Div Droite-->
       <div class="col-sm-6"><!--Information Professionel Div Droite-->
       <h2 style="font-size:18px ; "> Modifier le mot de passe </h2>
                <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseMotDePasse" aria-expanded="false" aria-controls="collapseMotDePasse">Modifier le mot de passe</button>
<div class="collapse" id="collapseMotDePasse">
  <form onsubmit="return false;" class="well" id="form_m_mot_de_passe">
   <div class=" pass1 form-group">  
            <label for="ancien_mot_de_passe" class="sr-only">Ancien Mot de passe</label>
            <input type="password" placeholder="Ancien Mot de passe" class="form-control" name="ancien_mot_de_passe" id="ancien_mot_de_passe">
            </div>
   <div class=" pass1 form-group">  
            <label for="pass1" class="sr-only"> Nouveau Mot de passe</label>
            <input type="password" placeholder="Nouveau Mot de passe" class="form-control" name="pass1" id="pass1" >
            <small id="output_pass1"></small>
            </div>
            
          <div class=" pass2 form-group">  
            <label for="pass2" class="sr-only" >confirmation Nouveau Mot de passe</label>
            <input type="password" placeholder="confirmation Nouveau Mot de passe" class="form-control" name="pass2" id="pass2" >
            <small id="output_pass2"></small>
            </div>
            <button class="btn btn-success" id="confirme_m_mot_de_passe" name="confirme_m_mot_de_passe"> Confirmer</button>
  </form>
       </div>
       
       
       
       
       <h2 style="font-size:18px">informations Professionnelles </h2>
  
       
            
    
<div class="  repos form-group "> 
<label for="repos" class="col-xs-11">Vos Journées Libres</label>

      <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseRepos" aria-expanded="false" aria-controls="collapseRepos">Modifier</button>   <?php echo $repos;?>
<div id="collapseRepos" class="collapse row">
<form onsubmit="return false;" class="well" id="form_m_repos">
<div class=" reposs col-sm-offset-1 col-xs-11">
	<input id="0libre" type="checkbox" name="repos[]" value="" checked style="display:none">
	<label for="samedi">Sam</label>&nbsp;<input id="samedi" type="checkbox" name="repos[]" value=" samedi">&nbsp;
	<label for="dimanche">Dim</label>&nbsp;<input id="dimanche" type="checkbox" name="repos[]"value=" dimanche">
	<label for="lundi">Lun</label>&nbsp;<input id="lundi" type="checkbox" name="repos[]" value=" lundi">
	<label for="mardi">Mar</label><input id="mardi" type="checkbox" name="repos[]" value=" mardi">&nbsp;
	<label for="mercredi">Mer</label>&nbsp;<input id="mercredi" type="checkbox" name="repos[]" value=" mercredi">&nbsp;
	<label for="jeudi">Jeu</label>&nbsp;<input id="jeudi" type="checkbox" name="repos[]" value=" jeudi">&nbsp;
	<label for="vendredi">Ven</label>&nbsp;<input id="vendredi" type="checkbox" name="repos[]" value=" vendredi"> 
</div>
   <button class="btn btn-success" name="bouton_m_repos" id="bouton_m_repos">Confirmer</button>
    </form>
</div>
</div>
       
       
<div class=" duree form-group "> 
<label for="duree" class="col-xs-11">La durée d'une visite:</label>
<button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseDuree" aria-expanded="false" aria-controls="collapseDuree">Modifier</button> elle dure : <?php echo $duree ; ?> minutes
 
<div id="collapseDuree" class="collapse row">
<form onsubmit="return false;" class="well" id="form_m_duree">
<div class=" col-sm-offset-1 col-xs-11 ">
	<label for="30min">30min</label>&nbsp;<input    id="30min" type="radio" name="duree" value="PT0H30M0S">&nbsp;
	<label for="45min">45min</label>&nbsp;<input  id="45min" type="radio" name="duree"value="PT0H45M0S">
	<label for="60min">60min</label>&nbsp;<input  id="60min" type="radio" name="duree" value="PT1H0M0S">	
</div>
   <button class="btn btn-success" name="bouton_m_duree" id="bouton_m_duree">Confirmer</button>
</form>
</div>
</div> 
       
      <label for="nombre_visite" class="">nombre de visite par jour</label>         
<form onsubmit="return false;" class="form-inline" id="form_m_nombre_visite">
<div class="input-group ">


            <input type="number" class="form-control" name="nombre_visite" id="nombre_visite" title="Nombre de visite par jour" placeholder="Nombre de visite par jour" value="<?php echo $nombre_visite;?>"  >
<span class="input-group-btn"> <button class=" btn btn-default" id="bouton_m_nombre_visite" type="button"  >modifier</button></span>

</div></form>  <br> 
   <label for="debut_de_travail" class="">l'heure de début de travail</label>    
 <form onsubmit="return false;" class="form-inline" id="form_m_debut_de_travail">
    <div class="input-group">
        
        <select id="debut_de_travail" name="debut_de_travail" style="" class=" form-control ">
          <option value=""><?php echo $debut_de_travail1->format('H:i');?> </option>
          <?php
	require "includes/connect_bd.php";
	$reponse = $bdd->query('SELECT * FROM pause_midi');

while ($donnees = $reponse->fetch()){
$heure_debut_de_travail=$donnees['debut_de_travail'];	
$debut_de_travail= new DateTime($heure_debut_de_travail);

    ?>
    
    <option  value="<?php echo $donnees['debut_de_travail'];?>" > <?php echo ''.$debut_de_travail->format('H:i');?></option>    
    <?php
         }

?>
	
        </select>
        <bouton class=" btn btn-default input-group-addon" style="background-color: white;
    border-color: #adadad; " id="bouton_m_debut_de_travail">Modifier</bouton>
    </div>
</form><br> 
      
      <label for="duree_repos" class="">la durée de la pause</label>  
 <form onsubmit="return false;" class="form-inline" id="form_m_duree_repos">
    <div class="input-group">
        
        <select id="duree_repos" name="duree_repos" style="" class=" form-control ">
          <option value=""><?php echo $duree_repos.' min' ;?></option>
          <option value="PT0H10M0S">10min</option>
						<option value="PT0H15M0S">15min</option>
						<option value="PT0H20M0S">20min</option>
						<option value="PT0H30M0S">30min</option>
						<option value="PT0H45M0S">45min</option>
						<option value="PT1H0M0S">60min</option>
						<option value="PT1H15M0S">75min</option>
						<option value="PT1H30M0S">90min</option>
						<option value="PT2H0M0S">120min</option>

	
        </select>
        <bouton class=" btn btn-default input-group-addon" style="background-color: white;
    border-color: #adadad; " id="bouton_m_duree_repos">Modifier</bouton>
    </div>
</form><br>  
<label for="pause_midi" class="">à partir de </label>  
 <form onsubmit="return false;" class="form-inline" id="form_m_pause_midi">
    <div class="input-group">
        
        <select id="pause_midi" name="pause_midi" style="" class=" form-control ">
          <option value=""><?php echo $pause_midi1->format('H:i') ;?></option>
      	<?php
	require "includes/connect_bd.php";
	$reponse = $bdd->query('SELECT * FROM pause_midi');

while ($donnees = $reponse->fetch()){
$heure_debut=$donnees['pause_midi'];	
$pause_midi= new DateTime($heure_debut);

    ?>
    
    <option  value="<?php echo $donnees['pause_midi'];?>" > <?php echo ''.$pause_midi->format('H:i');?></option>    
    <?php
         }

?>

	
        </select>
        <bouton class=" btn btn-default input-group-addon" style="background-color: white;
    border-color: #adadad; " id="bouton_m_pause_midi">Modifier</bouton>
    </div>
</form><br>                          
                                    
                                               
           
                          
       </div> <!--Fin Div droite-->
       
       
       
       
       
</div> <!--Fin Div row droite gauche-->



<div class="container">
  
      <!-- modal examples -->

      
    <div class="modEample">
 
  
      <div id="modal_erreur_modification" class="modal" data-easein="flash"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header ">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id=titre_erreur_modification>Erreur !</h4> <span id=erreur_modification> erreur</span>
				<button class="btn btn-default pull-right  " data-dismiss="modal" aria-hidden="true">Fermer</button>
            </div>
 
        </div>
      </div>
      </div>
		</div>
		</div>




    </div>


  
</section>
<script src="js/jquery-2.2.0.min.js"></script>
