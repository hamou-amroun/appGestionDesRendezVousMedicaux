
<head>

<meta charset="utf-8">
<link rel="stylesheet" href="css/bootstrap-3.3.6-dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="css/style_inscription.css">
</head>
<body style="background-color: rgba(3, 211, 244,0.5)">
    

<header class="header">
  <div class="container">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">

        <a href="pageprincipale.php" class="navbar-brand scroll-top logo  animated bounceInDown"><b><i></i><em style="color:#666666;">RDV</em>Doc</b></a> </div>
      <!--/.navbar-header-->
   
      <!--/.navbar-collapse--> 
    </nav>
    <!--/.navbar--> 
  </div>
  <!--/.container--> 
</header>
<!--/.header-->

<div class="container">
  
      <!-- modal examples -->

      
    <div class="modEample">
 
  
      <div id="myModal31" class="modal" data-easein="flash"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header alert  alert-danger">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Erreur !</h4> <span id=statut> Vous devez d'abord selectionner un créneau</span>
				<button class="btn btn-default pull-right  " data-dismiss="modal" aria-hidden="true">Fermer</button>
            </div>
 
        </div>
      </div>
      </div>
		</div>
		</div>

<div class="modal " id="infos">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">x</button>
<h4 class="modal-title">Plus d'informations</h4>
</div>
<div class="modal-body">
Merci pour Votre Confiance
	Vous vous êtes bien inscrit
</div>
<div class="modal-footer">
<button class="btn btn-success"> Se connecter</button>
<button class="btn btn-info" data-dismiss="modal">Fermer</button>

</div>

</div>
</div>
</div>



<section class="page-section colord"> <br>
 </section>


	<section id="inscription">
		<form id="register_form" onsubmit="return false;" class="  col-sm-12" style="color: #fff;">
			<p>
				<span>
      <div class="container col-sm-12" style="background-color: rgba(3, 211, 244,0.01); border-radius:14px;">
<header class="row">
<div class="col-sm-12" style="margin-top:10px">

</div>
</header>
	<div class="row">
	
	<div class=" col-sm-5 div_g "> 
          
       <div class="row">
           <div class=" nom form-group col-sm-6">
            <label for="nom" class="sr-only">nom</label>
            <input type="text" class="form-control"  placeholder="NOM" id="nom" name="nom" >
            <small id="erreur_nom" ></small>
           </div>
          <div class=" prenom form-group col-sm-6">  
            <label for="prenom" class="sr-only">PRENOM</label>
            <input type="text" class="form-control" placeholder="PRENOM" id="prenom" name="prenom"  >
            <small id="erreur_prenom" ></small>
          </div>
       </div>        
              
            <div class=" date_de_naissance form-group ">  
            <label for="date_de_naissance" class="">Date de Naissance</label>
            <input type="date" class="form-control" name="date_de_naissance" id="date_de_naissance" placeholder="Votre Date De Naissance"  >
            <small id="output_checkdatedenaissane" ></small>
           </div>
 
<div class="row">
<div class="col-xs-11 form-group  ">
	<label for="homme"  >HOMME</label>&nbsp;<input class=""   id="homme" type="radio" name="genre" value="homme">&nbsp;&nbsp;
	<label for="femme">FEMME</label>&nbsp;<input class="" id="femme" type="radio" name="genre"value="femme">

</div> </div>


           
          <div class=" numero_de_tel form-group ">  
            <label for="numero_de_tel" class="sr-only">Mobile</label>
            <input type="text" class="form-control" name="numero_de_tel" id="numero_de_tel" placeholder="06 xx xx xx xx"  >
            <small id="erreur_numero_de_tel" ></small>
           </div>
           
             <div class=" email form-group">  
            <label for="email" class="sr-only">Adresse electronique</label>
            <input type="email" class="form-control" placeholder="docteur@exemple.dz" id="email" name="email">
            <small id="output_email"></small>
            </div>
            
           
          <div class=" pass1 form-group">  
            <label for="pass1" class="sr-only">Mot de passe</label>
            <input type="password" placeholder="mot de passe" class="form-control" name="pass1" id="pass1" >
            <small id="output_pass1"></small>
            </div>
            
          <div class=" pass2 form-group">  
            <label for="pass2" class="sr-only" >confirmation mot de passe</label>
            <input type="password" placeholder="confirmation mot de passe" class="form-control" name="pass2" id="pass2" >
            <small id="output_pass2"></small>
            </div>
            
        
            
            </div>
	



<div class="col-sm-2"></div>
	

	
	
	<div class=" col-sm-5 div_d ">
	
          
<div class=" row ">
<div class="row">
<div class="specialite form-group col-sm-10"><select id="specialite" name="specialite" class="form-control">
						<option value="">--Specialité--</option>
						<option value="generaliste">Généraliste</option>
						<option value="dentiste">Dentiste</option>
						<option value="cardiologue">cardiologue</option>
</select>         	
</div>
</div>


   
    
<div class="row">
<div class="wilaya form-group col-sm-5">
<select name="wilaya" id="wilaya" class="form-control">
<option value="">--wilaya--</option>

<option  value="15" > Tizi Ouzou</option> 			
<option  value="06" > Béjaia</option> 			
<option  value="16" > Alger</option> 			
</select>
	
	
</div>
<div class="commune form-group col-sm-5">


 <select name="commune" id="commune" disabled="true" class="form-control">
	<option value="">--Commune--</option>
												
<option  value="Tizi Ouzou" class="15" > Tizi Ouzou</option>						
<option  value="Azazga" class="15" > Azazga</option>						
<option  value="Freha" class="15" > Freha</option>						
<option  value="Bouzeguene" class="15" > Bouzeguene</option>						
<option  value="Draa El Mizan" class="15" > Draa El Mizan</option>						
<option  value="Tizi Gheniff" class="15" > Tizi Gheniff</option>						
<option  value="Ait Ziki" class="15" > Ait Ziki</option>						
<option  value="Illoula" class="15" > Illoula</option>						
<option  value="Iferhounane" class="15" > Iferhounane</option>						
<option  value="Yakouren" class="Tizi Ouzou" > Yakouren</option>						
<option  value="Larbaa Nath Irathen" class="15" > Larbaa Nath Irathen</option>						
<option  value="Ouagyenoun" class="15" > Ouagyenoun</option>						
<option  value="Maathas" class="15" > Maathas</option>						
<option  value="Tizi Rached" class="15" > Tizi Rached</option>						
<option  value="Ouadhia" class="15" > Ouadhia</option>						
<option  value="Azeffoun" class="15" > Azeffoun</option>						
<option  value="Tigzirt" class="15" > Tigzirt</option>						
<option  value="Idjeur" class="15" > Idjeur</option>						
<option  value="Ait Yenni" class="15" > Ait Yenni</option>						
<option  value="Bejaia" class="06" > Bejaia</option>						
<option  value="Akbou" class="06" > Akbou</option>						
<option  value="Tichy" class="06" > Tichy</option>						
<option  value="Ighil Ali" class="06" > Ighil Ali</option>						
<option  value="akfadou" class="06" > akfadou</option>						
<option  value="Melbou" class="06" > Melbou</option>						
<option  value="Aokas" class="06" > Aokas</option>						
<option  value="Alger-Centre" class="16" > Alger-Centre</option>						
<option  value="Bab El Oued" class="16" > Bab El Oued</option>						
<option  value="Casbah" class="16" > Casbah</option>						
<option  value="Kouba" class="16" > Kouba</option>
<option  value="Ben Aknoun" class="16" > Ben Aknoun</option> 
</select>

	
</div>    
    
     </div>        

             
             
             
             
<div class=" col-xs-12 repos form-group "> 
<label for="repos" class="col-sm-offset-1 col-xs-11">Vos Journées Libres</label>
<div class="row">
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
</div>
</div>
 
  
               
            
              
                
<div class=" col-xs-12 repos form-group "> 
<label for="duree" class="col-sm-offset-1 col-xs-11">La durée d'une visite</label>
<div class="row">
<div class=" col-sm-offset-1 col-xs-11 ">
	<label for="30min">30min</label>&nbsp;<input    id="30min" type="radio" name="duree" value="PT0H30M0S">&nbsp;
	<label for="45min">45min</label>&nbsp;<input  id="45min" type="radio" name="duree"value="PT0H45M0S">
	<label for="60min">60min</label>&nbsp;<input  id="60min" type="radio" name="duree" value="PT1H0M0S">	
</div>
</div>
</div>
           <div class="row">
            <div class=" nombre_visite form-group col-sm-6">
            <label for="nombre_visite" class="sr-only">Nombre de Visite par jour</label>
            <input type="text" class="form-control"  placeholder="Nombre de visite par jour" id="nombre_visite" name="nombre_visite"  min="1" max="39">
            <small id="erreur_nombre_visite"></small>
           </div> 
           </div>
            
            
            
            
            </div>
                         
                          <div class="row">
                          <div class="row">
                                    <div class="form_group col-sm-4" style="">
	<label for="">début de travail:</label>
</div>
                          	<div class="form-group col-sm-4">			<select name="debut_de_travail" id="debut_de_travail" class="form-control">
						<option value="">xx:xx</option>
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
</select> </div>
                          	
                          </div>
                          </div>
                           
            <div class="row">
            <div class="form_group col-sm-3" style="">
	<label for="">Durée de la Pause:</label>
</div>
<div class="fin_repos form-group col-sm-3" style=" padding-left: 0px">
					<select name="duree_repos" id="duree_repos" class="form-control">
						<option value="">----</option>
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
       	
</div >   
<div class=" form_group col-sm-3" style="">
	<label for="">à Partir De:</label>
</div>
<div class=" pause_midi form-group col-sm-3" style=" padding-left: 0px">
				<select name="pause_midi" id="pause_midi" class="form-control">
						<option value="">---</option>
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
</div>
           
     </div> 
       
	
	</div>
		
            </div>

		
	<footer class="row">
<div class="col-lg-12">
       <div class="row">
              	
           <br><br>
            <input type="submit" id="bRegister" class="btn btn-info btn-block " style="background-color:005f8d" value="Inscription">
              </div>
</div>
</footer>	
		
		</div>
	
			  
	</span>
			</p>
		</form>
	</section>

</body>


	<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
		<script src="css/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

	
<script type="text/javascript" charset="utf-8" src="js/ajax.js">  </script>


	<script src="js/chained.js">
	</script>
	<script type="text/javascript" charset="utf-8">
		$(function () {
			$("#commune").chained("#wilaya");

		});
	</script>