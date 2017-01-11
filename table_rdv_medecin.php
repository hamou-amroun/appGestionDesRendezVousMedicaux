<!DOCTYPE html>

<html lang="fr">

<head>




	<style>
		.rama:hover {
			cursor: pointer;
		}
		
		.amar:hover {
			background-color: #dff0d8;
		}
		
		#table2 tr:nth-child(even) {
			background-color: #E8E8E8;
		}
		
		#table2 tr:nth-child(odd) {
			background-color: white;
		}
        #table1{background-color:white}
        #table2{background-color:white}
	</style>
</head>
<section class="page-section " >
    <div class="text-center">
          <h2>Vous avez un empêchement ?! </h2>
       <p>Cochez Pour l'AJOUTER / Décocher pour l'ANNULER </p>
       

   </div>
</section>



<?php
   $id= $_SESSION['id_docteur_connecter'];
		  require "includes/connect_bd.php";
		  $reponse = $bdd->prepare("SELECT * FROM docteur WHERE id=:id");
        $reponse->execute(array('id'=>$id));
     $empechement="";
while($donnee=$reponse->fetch()){
	$repos=$donnee['repos'];
	$nombre_visite=$donnee['nombre_visite'];
	$duree=$donnee['duree'];
	$debut_de_travail=$donnee['debut_de_travail'];
	$pause_midi=$donnee['pause_midi'];
	$duree_repos=$donnee['duree_repos'];
    $empechement1=$donnee['empechement'];
    $empechement.="*".$empechement1;
}

$amar="";
		  $reponse1 = $bdd->query('SELECT * FROM rdv');
while($donnee1=$reponse1->fetch()){
	$youcef=$donnee1['rdv'];
	$amar.="*".$youcef;
	
}





	 if($duree=="PT0H10M0S") {$la_duree=10;}
else if ($duree=="PT0H15M0S") {$la_duree=15;}
else if ($duree=="PT0H20M0S") {$la_duree=20;}
else if ($duree=="PT0H30M0S") {$la_duree=30;}
else if ($duree=="PT0H45M0S") {$la_duree=45;}
else if ($duree=="PT1H0M0S") {$la_duree=60;}
else if ($duree=="PT1H15M0S") {$la_duree=75;}
else if ($duree=="PT1H30M0S") {$la_duree=90;}
else if ($duree=="PT2H0M0S") {$la_duree=120;}


$datetime1 = new DateTime($debut_de_travail);
$datetime2 = new DateTime($pause_midi);
$a= $datetime1->diff($datetime2);
$min=$a->format('%i ');
$h=$a->format('%H ');
$interval=$h*60+$min;
    $safia=(int)($interval/$la_duree);
if($safia>$nombre_visite){
    $visite_avant=$nombre_visite;
}
               else
               { $visite_avant=$safia;}
$visite_apres=$nombre_visite-$visite_avant;
		  
	?>



	<script src="js/jquery-2.2.0.min.js"></script>
	<?php
setlocale(LC_TIME, 'fr_FR.utf8','fra');
date_default_timezone_set("Europe/Paris");
$date=(strftime("%A"));

    ?>
   <div id="myModal28" class="modal container" data-easein="tada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="container">
            <div class="row">


                <div class="modal-dialog">
                    <div class="modal-content">
                        <form onsubmit="return false;" id="inscription_patient">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                <h4 class="modal-title">Vos informations</h4>
                            </div>

                            <div class="modal-body ">

                                <div class="row">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class=" nom form-group col-sm-6">
                                                <label for="nom" class="sr-only">nom</label>
                                                <input type="text" class="form-control" placeholder="NOM" id="nom" name="nom">
                                                <small id="erreur_nom"></small>
                                            </div>
                                            <input type="text" value="">

                                            <div class=" prenom form-group col-sm-6">
                                                <label for="prenom" class="sr-only">PRENOM</label>
                                                <input type="text" class="form-control" placeholder="PRENOM" id="prenom" name="prenom">
                                                <small id="erreur_prenom"></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" date_de_naissance form-group col-lg-12">
                                        <label for="date_de_naissance" class="">Date de Naissance</label>
                                        <input type="date" class="form-control " name="date_de_naissance" id="date_de_naissance" placeholder="Votre Date De Naissance">
                                        <small id="output_checkdatedenaissane"></small>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-11 form-group  ">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <label for="homme">HOMME</label>&nbsp;
                                            <input class="" id="homme" type="radio" name="genre" value="homme">&nbsp;&nbsp;
                                            <label for="femme">FEMME</label>&nbsp;
                                            <input class="" id="femme" type="radio" name="genre" value="femme">

                                        </div>
                                    </div>

                                    <div class=" col-lg-12 numero_de_tel form-group ">
                                        <label for="numero_de_tel" class="sr-only">Mobile</label>
                                        <input type="text" class="form-control" name="numero_de_tel" id="numero_de_tel" placeholder="06 xx xx xx xx">
                                        <small id="erreur_numero_de_tel"></small>
                                    </div>

                                    <div class="row">

                                        <div class="col-lg-12">

                                            <div class=" pass1 form-group col-sm-6">
                                                <label for="pass1" class="sr-only">Mot de passe</label>
                                                <input type="password" placeholder="mot de passe" class="form-control" name="pass1" id="pass1">
                                                <small id="output_pass1"></small>
                                            </div>

                                            <div class=" pass2 form-group col-sm-6">
                                                <label for="pass2" class="sr-only">confirmation mot de passe</label>
                                                <input type="password" placeholder="confirmation mot de passe" class="form-control" name="pass2" id="pass2">
                                                <small id="output_pass2"></small>
                                            </div>
                                        </div>
                                    </div>










                                </div>

                            </div>










                            <div class="modal-footer">
                                <button class="btn btn-success" id="confirmation_rdv">Confirmer le RDV</button>
                                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <div class="container">
  
      <!-- modal examples -->

      
    <div class="modEample">
 
  
      <div id="myModal31" class="modal" data-easein="flash"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header alert  alert-danger">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Erreur !</h4>Vous devez d'abord selectionner un créneau
				<button class="btn btn-default pull-right  " data-dismiss="modal" aria-hidden="true">Fermer</button>
            </div>
 
        </div>
      </div>
      </div>
		</div>
		</div>

		<form id="tableau_rdv" onsubmit="return false;">
			<div class="container">



				<div class="row">
					<section class=" table-responsive col-xs-12  " style="  border: 0px solid blue; padding-right: 100px; padding-left: 0px;margin-bottom: 0px">
						<table class="table table-bordered table-striped table-condensed  " id="table1" style="  border: 0px solid blue;">
							<tbody>
								<thead>
									<tr>
										<td class="hidden-xs">RDV </td>
										<td class="hidden-sm hidden-md hidden-lg pull-right" style="  border: 0px solid blue;">
											<button style="background-color:#DFE1F0" onclick='$("#button_back1").show();$("#table2").show();$("#table1").hide();$("#button_next1").hide();' id="button_next1" class="btn "><span class="glyphicon glyphicon-fast-forward"></span></button>
										</td>
										<?php




for($i=0;$i<7;$i++)
	{ 

      $demain=mktime(0,0,0,date("m"), date("d")+$i+1, date("Y"));
		
	$jour_demain=strftime("%A",$demain);
	if (preg_match("#$jour_demain#",$repos)) 
	{?>
											<td class="hidden-xs" style="background-color:#f2dede;"><span style="color:red;"><?php echo strftime("%d %b",$demain);?></span></td>
											<?php } 
	else  { ?>
												<td class="hidden-xs " style="background-color: #dff0d8;">
													<?php echo strftime("%d/%b",$demain);?>
												</td>
												<?php
		  	?>
													<td class="hidden-lg hidden-sm hidden-md " style="background-color: #dff0d8;">
														<?php echo strftime("%d/%m",$demain);?>
													</td>
													<?php	
		  } ?>
														<?php
    }	
    ?>
															<td class="hidden-xs" style="  border: 0px solid blue;">
																<button style="background-color:#DFE1F0" onclick='$("#button_back").show();$("#table2").show();$("#table1").hide();$("#button_next").hide();' id="button_next" class="btn "><span class="glyphicon glyphicon-fast-forward"></span></button>
															</td>
									</tr>
								</thead>
								<tbody>
									<?php

$plus_heure= new DateTime($debut_de_travail);

$plus_heure->sub(new DateInterval($duree));


for($i=0;$i<$visite_avant;$i++)
	{
	$plus_heure->add(new DateInterval($duree));
	echo"<tr>";
	 echo "<td>".$plus_heure->format('H:i'). "</td>";
 

      for($j=0;$j<7;$j++)
	    {  
		
	       $demain_2=mktime(0,0,0,date("m"), date("d")+$j+1, date("Y"));		
			$jour_demain_2=strftime("%A",$demain_2);

		
		  		  $baba1=strftime("%Y-%m-%d",$demain_2)." ".$plus_heure->format('H:i:s');
		  
        if (!preg_match("#$jour_demain_2#", $repos) && !preg_match("#$baba1#", $amar) ) {  
                                     if (preg_match("#$baba1#", $empechement) ) {  ?>
										<td class="amar" style="text-align:center;">
											<input class="rama" type="checkbox" title="<?php echo strftime(" %A %d %B %Y ",$demain_2)." à ".$plus_heure->format('H:i');?>" name="empechement[]" id="empechement" value="<?php echo strftime("%Y-%m-%d",$demain_2)." ".$plus_heure->format('H:i:s');?> " checked>
										</td>
										<?php  }
            else{ ?>
										<td class="amar" style="text-align:center;">
											<input class="rama" type="checkbox" title="<?php echo strftime(" %A %d %B %Y ",$demain_2)." à ".$plus_heure->format('H:i');?>" name="empechement[]" id="empechement" value="<?php echo strftime("%Y-%m-%d",$demain_2)." ".$plus_heure->format('H:i:s');?>">
										</td>
										<?php  }
        }
    


		else{ ?>
											<td class="hidden-xs"></td>

											<?php }	}
  
    
    echo"</tr>";?>
												<?php
    }	
    ?>






													<?php

$plus_heure1= new DateTime($pause_midi);

$plus_heure1->add(new DateInterval($duree_repos));
$plus_heure1->sub(new DateInterval($duree));


for($i=0;$i<$visite_apres;$i++)
	{
	$plus_heure1->add(new DateInterval($duree));
	echo"<tr>";
	 echo "<td>".$plus_heure1->format('H:i'). "</td>";
 

      for($j=0;$j<7;$j++)
	    {  
		
	       $demain_2=mktime(0,0,0,date("m"), date("d")+$j+1, date("Y"));		
			$jour_demain_2=strftime("%A",$demain_2);
		  $baba=strftime("%Y-%m-%d",$demain_2)." ".$plus_heure1->format('H:i:s');
        if (!preg_match("#$jour_demain_2#", $repos) && !preg_match("#$baba#", $amar) ) {  
                                    if (preg_match("#$baba#", $empechement) ) {  ?>
										<td class="amar" style="text-align:center;">
											<input class="rama" type="checkbox" title="<?php echo strftime(" %A %d %B %Y ",$demain_2)." à ".$plus_heure1->format('H:i');?>" name="empechement[]" id="empechement" value="<?php echo strftime("%Y-%m-%d",$demain_2)." ".$plus_heure1->format('H:i:s');?> " checked>
										</td>
										<?php  }
            else{ ?>
										<td class="amar" style="text-align:center;">
											<input class="rama" type="checkbox" title="<?php echo strftime(" %A %d %B %Y ",$demain_2)." à ".$plus_heure1->format('H:i');?>" name="empechement[]" id="empechement" value="<?php echo strftime("%Y-%m-%d",$demain_2)." ".$plus_heure1->format('H:i:s');?>">
										</td>
										<?php  }} 
		else 
		{ ?>
															<td class="hidden-xs"></td>

															<?php }
	
	  }  echo"</tr>";
    }	
    ?>


								</tbody>
								<td class="hidden-xs" style=" background-color:white;   border: 0px solid blue;"></td>
								
								<td colspan=6 class="hidden-ss" style="background-color:white;">
									<div style="">
										<button class="btn btn-success btn-block confirmer"  value="confirme">Actualiser les Empêchements</button>
									</div>
								</td>

						</table>
					</section>
				</div>


				<div class="row">

					<section class=" table-responsive col-xs-12  " style="  border: 0px solid blue; padding-right: 100px; padding-left: 0px;margin-bottom: 0px ">
						<table class="table table-bordered table-striped table-condensed  " id="table2" style="  border: 0px solid blue;display:none">


							<thead>
								<tr>
									<td class="hidden-xs">RDV </td>
									<td class="hidden-sm hidden-md hidden-lg pull-right" style="  border: 0px solid blue;">
										<button onclick='$("#button_back1").hide();$("#table2").hide();$("#table1").show();$("#button_next1").show();' id="button_back1" style="display:none" class="btn "><span class="glyphicon glyphicon-fast-backward"></span></button>

									</td>

									<?php




for($i=7;$i<14;$i++)
	{ 

      $demain=mktime(0,0,0,date("m"), date("d")+$i+1, date("Y"));
		
	$jour_demain=strftime("%A",$demain);
	if (preg_match("#$jour_demain#",$repos)) 
	{?>
										<td class="hidden-xs" style="background-color:#f2dede;"><span style="color:red;"><?php echo strftime("%d %b",$demain);?></span></td>
										<?php } 
	else  { ?>
											<td class="hidden-xs " style="background-color: #dff0d8;">
												<?php echo strftime("%d/%b",$demain);?>
											</td>
											<?php
		  	?>
												<td class="hidden-lg hidden-sm hidden-md " style="background-color: #dff0d8;">
													<?php echo strftime("%d/%m",$demain);?>
												</td>
												<?php	
		  } ?>
													<?php
    }	
    ?>
														<td class="hidden-xs" style="  border: 0px solid blue;">
															<button onclick='$("#button_back").hide();$("#table2").hide();$("#table1").show();$("#button_next").show();' id="button_back" style="display:none" class="btn "><span class="glyphicon glyphicon-fast-backward"></span></button>
														</td>
								</tr>
							</thead>
							<tbody>
								<?php

$plus_heure= new DateTime($debut_de_travail);

$plus_heure->sub(new DateInterval($duree));


for($i=0;$i<$visite_avant;$i++)
	{
	$plus_heure->add(new DateInterval($duree));
	echo"<tr>";
	 echo "<td>".$plus_heure->format('H:i'). "</td>";
 

      for($j=7;$j<14;$j++)
	    {  
		
	       $demain_2=mktime(0,0,0,date("m"), date("d")+$j+1, date("Y"));		
			$jour_demain_2=strftime("%A",$demain_2);

		
		  		  $baba1=strftime("%Y-%m-%d",$demain_2)." ".$plus_heure->format('H:i:s');
		  
         if (!preg_match("#$jour_demain_2#", $repos) && !preg_match("#$baba1#", $amar) ) {  
                                     if (preg_match("#$baba1#", $empechement) ) {  ?>
										<td class="amar" style="text-align:center;">
											<input class="rama" type="checkbox" title="<?php echo strftime(" %A %d %B %Y ",$demain_2)." à ".$plus_heure->format('H:i');?>" name="empechement[]" id="empechement" value="<?php echo strftime("%Y-%m-%d",$demain_2)." ".$plus_heure->format('H:i:s');?> " checked>
										</td>
										<?php  }
            else{ ?>
										<td class="amar" style="text-align:center;">
											<input class="rama" type="checkbox" title="<?php echo strftime(" %A %d %B %Y ",$demain_2)." à ".$plus_heure->format('H:i');?>" name="empechement[]" id="empechement" value="<?php echo strftime("%Y-%m-%d",$demain_2)." ".$plus_heure->format('H:i:s');?>">
										</td>
										<?php  }
        }
    


		else{ ?>
											<td class="hidden-xs"></td>


										<?php }	}  echo"</tr>";?>
											<?php
    }	
    ?>






												<?php

$plus_heure1= new DateTime($pause_midi);

$plus_heure1->add(new DateInterval($duree_repos));
$plus_heure1->sub(new DateInterval($duree));


for($i=0;$i<$visite_apres;$i++)
	{
	$plus_heure1->add(new DateInterval($duree));
	echo"<tr>";
	 echo "<td>".$plus_heure1->format('H:i'). "</td>";
 

      for($j=7;$j<14;$j++)
	    {  
		
	       $demain_2=mktime(0,0,0,date("m"), date("d")+$j+1, date("Y"));		
			$jour_demain_2=strftime("%A",$demain_2);
		  $baba=strftime("%Y-%m-%d",$demain_2)." ".$plus_heure1->format('H:i:s');
       if (!preg_match("#$jour_demain_2#", $repos) && !preg_match("#$baba#", $amar) ) {  
                                    if (preg_match("#$baba#", $empechement) ) {  ?>
										<td class="amar" style="text-align:center;">
											<input class="rama" type="checkbox" title="<?php echo strftime(" %A %d %B %Y ",$demain_2)." à ".$plus_heure1->format('H:i');?>" name="empechement[]" id="empechement" value="<?php echo strftime("%Y-%m-%d",$demain_2)." ".$plus_heure1->format('H:i:s');?> " checked>
										</td>
										<?php  }
            else{ ?>
										<td class="amar" style="text-align:center;">
											<input class="rama" type="checkbox" title="<?php echo strftime(" %A %d %B %Y ",$demain_2)." à ".$plus_heure1->format('H:i');?>" name="empechement[]" id="empechement" value="<?php echo strftime("%Y-%m-%d",$demain_2)." ".$plus_heure1->format('H:i:s');?>">
										</td>
										<?php  }} 
		else 
		{ ?>
															<td class="hidden-xs"></td>

														<?php }	}  echo"</tr>";?>
															<?php
    }	
    ?>
<td class="hidden-xs" style=" background-color:white;   border: 0px solid blue;"></td>
								
								<td colspan=6 class="hidden-ss" style="background-color:white;">
									<div style="">
										<button class="btn btn-success btn-block confirmer"  value="confirme">Actualiser les Empêchements</button>
									</div>
								</td>
							</tbody>
						</table>
					</section>
				</div>
			</div>



		</form>
		
	
		<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
		<script src="css/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
		<script src="js/velocity.min.js"></script>
		<script src="js/velocity.ui.min.js"></script>
		<script src="js/modalEffet.js"></script>
	

<script>
	
	
	$(".confirmer").on('click',function () {
		
		var rdv1  = $('input:checked[id=empechement]').size();
        var rdv  = []
        	$('input:checked[id=empechement]').each(function () {
					rdv.push($(this).val());
				});
        	
var	variable_vide="";
			   $.ajax({
				type: "post",
				url: "traitement2.php",
				data: {
					'empechement': rdv,
                    'rdv1':rdv1,
                    'confirme':$(".confirmer").val(),
                    'variable_vide':variable_vide,
             
                },
       success: function (data) {
	alert(data);
           
       }
           
   });
			
});
	
	
	</script>
	<script type="text/javascript" charset="utf-8" src="js/ajax.js">  </script>