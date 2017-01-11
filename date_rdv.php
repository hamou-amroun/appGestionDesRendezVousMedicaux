<?php	require "includes/head.php"; ?>
<link rel="stylesheet" href="css/bootstrap-3.3.6-dist/css/bootstrap.min.css">



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
	</style>




<?php
    setlocale(LC_TIME, 'fr_FR.utf8','fra');
date_default_timezone_set("Europe/Paris");
    if(isset($_GET['idd']) && (!empty($_GET['idd']))){
        
 
        
        
         $idd=htmlspecialchars($_GET['idd']);  
    
         if (!(is_numeric($idd))){
            
            echo'Changer pas le code source';
        
    }
   

       else{
        
        
  
       
		  require "includes/connect_bd.php";
		  $reponse = $bdd->prepare('SELECT * FROM docteur WHERE id=:id');
          $reponse->execute(array('id'=>$idd));
    $empechement="";
           $id_doc_disponible="";
while($donnee=$reponse->fetch()){
	$repos=$donnee['repos'];
	$id=$donnee['id'];
	$nombre_visite=$donnee['nombre_visite'];
	$duree=$donnee['duree'];
	$debut_de_travail=$donnee['debut_de_travail'];
	$pause_midi=$donnee['pause_midi'];
	$duree_repos=$donnee['duree_repos'];
    $empechement1=$donnee['empechement'];
    $empechement.="*".$empechement1;
    $id_doc_disponible.="*".$donnee['id'];;
$nom=$donnee['nom'];
$prenom=$donnee['prenom'];
$specialite=$donnee['specialite'];
$wilaya=$donnee['wilaya'];
$commune=$donnee['commune'];
$num_de_tel=$donnee['num_de_tel'];
$photo=$donnee['photo'];

}
           
           if (!preg_match("#$idd#", $id_doc_disponible)){ echo "ce doc n'existe pas";}
           else{

$amar="";
		 $reponse1 = $bdd->prepare('SELECT * FROM rdv WHERE id_docteur=:id');
          $reponse1->execute(array('id'=>$idd));
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

$date=(strftime("%A"));

    ?>

		

<section class="page-section colord" >
         
          <div class="container">
           <div class="row">
             <div class=" col-sm-3 hidden-xs">  <ul class="items list-unstyled clearfix animated rotateInUpLeft  showing" data-animation="fadeInRight" > 
                    <li class="item ">   <a href="uploads/<?php echo $photo;?>.jpg" class="fancybox">    <img class="img-responsive col-xs-12"  src="uploads/<?php echo $photo;?>.jpg" alt="">  </a> </li> </ul></div>
            <div class="heading col-sm-3 "> 
      <!-- Heading -->
                <h2 class="">Dr.<em style="text-transform: uppercase;"> <?php echo $nom.' '.$prenom ?> </em></h2>
      <p class="animated pulse showing"style=" text-transform: uppercase;; font-size:19px"><strong><?php echo $specialite ?></strong></p>
 <p><strong><?php echo $num_de_tel ?></strong></p>
<p><strong><?php echo $commune.' '.$wilaya ?></strong></p>
    </div>
    <div class="heading col-sm-4">
      <?php
       $je_commence= new DateTime($debut_de_travail);


               ?>
            <h1 class="hidden-xs"></h1>
     <p>je commence à  : <strong> <?php echo $je_commence->format('H:i'); ?></strong> </p>
        <p>je ne travaille pas le <strong> <?php echo $repos ?></strong> </p>
     
    </div>
  
    </div>	
    
    </div>	
    		
    			
    					<form class="colord" id="tableau_rdv" onsubmit="return false;">
			<div class="container" style="background-color:white">



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
		  
        if  (!preg_match("#$jour_demain_2#", $repos) && !preg_match("#$baba1#", $amar) )
        {  
							
								 if (preg_match("#$baba1#", $empechement) ) {  ?>
										<td class="amar" style="text-align:center;">
										
										</td>
										<?php  }
            else{ ?>
													
									
									<td class="amar" style="text-align:center;">
										<input type="radio" class="rama" title="<?php echo strftime(" %A %d %B %Y ",$demain_2)." à ".$plus_heure->format('H:i');?>" name="rdv" id="rdv" value="<?php echo strftime(" %Y-%m-%d ",$demain_2)." ".$plus_heure->format('H:i:s');?>">
									</td>
									<?php  } }
		else 
		{ ?>
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
 

      for($j=0;$j<7;$j++)
	    {  
		
	       $demain_2=mktime(0,0,0,date("m"), date("d")+$j+1, date("Y"));		
			$jour_demain_2=strftime("%A",$demain_2);
		  $baba=strftime("%Y-%m-%d",$demain_2)." ".$plus_heure1->format('H:i:s');
        if (!preg_match("#$jour_demain_2#", $repos) && !preg_match("#$baba#", $amar) )
        {  
							
								 if (preg_match("#$baba#", $empechement) ) {  ?>
										<td class="amar" style="text-align:center;">
										
										</td>
										<?php  }
            else{ ?>
													
									
									<td class="amar" style="text-align:center;">
										<input type="radio" class="rama" title="<?php echo strftime(" %A %d %B %Y ",$demain_2)." à ".$plus_heure1->format('H:i');?>" name="rdv" id="rdv" value="<?php echo strftime(" %Y-%m-%d ",$demain_2)." ".$plus_heure1->format('H:i:s');?>">
									</td>
									<?php  } }
		else 
		{ ?>
										<td class="hidden-xs"></td>

															<?php }
	
	  }  echo"</tr>";
    }	
    ?>


								</tbody>
								<td class="hidden-xs"></td>
								<td colspan=3>
									<div style="">
										<button class="btn btn-danger btn-block annuler" value="annuler">Annuler un RDV</button>
									</div>
								</td>
								<td colspan=3 class="hidden-ss" style="background-color:white;">
									<div style="">
										<button class="btn btn-success btn-block confirmer"  value="confirme">Prendre un RDV</button>
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
		  
        if (!preg_match("#$jour_demain_2#", $repos) && !preg_match("#$baba1#", $amar) )
        {  
							
								 if (preg_match("#$baba1#", $empechement) ) {  ?>
										<td class="amar" style="text-align:center;">
										
										</td>
										<?php  }
            else{ ?>
													
									
									<td class="amar" style="text-align:center;">
										<input type="radio" class="rama" title="<?php echo strftime(" %A %d %B %Y ",$demain_2)." à ".$plus_heure->format('H:i');?>" name="rdv" id="rdv" value="<?php echo strftime(" %Y-%m-%d ",$demain_2)." ".$plus_heure->format('H:i:s');?>">
									</td>
									<?php  } }
		else 
		{ ?>
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
               if (!preg_match("#$jour_demain_2#", $repos) && !preg_match("#$baba#", $amar) )
        {  
							
								 if (preg_match("#$baba#", $empechement) ) {  ?>
										<td class="amar" style="text-align:center;">
										
										</td>
										<?php  }
            else{ ?>
													
									
									<td class="amar" style="text-align:center;">
										<input type="radio" class="rama" title="<?php echo strftime(" %A %d %B %Y ",$demain_2)." à ".$plus_heure1->format('H:i');?>" name="rdv" id="rdv" value="<?php echo strftime(" %Y-%m-%d ",$demain_2)." ".$plus_heure1->format('H:i:s');?>">
									</td>
									<?php  } }
		else 
		{ ?>
										<td class="hidden-xs"></td>

														<?php }	}  echo"</tr>";?>
															<?php
    }	
    ?>

																<td class="hidden-xs"></td>
																<td colspan=3>
																	<div style="">
																		<button value="annuler" class="btn btn-danger btn-block annuler">Annuler un RDV</button>
																	</div>
																</td>
																<td colspan=3 class="hidden-ss" style="background-color:white;">
																	<div style="">
																		<button class="btn btn-success btn-block confirmer"  value="confirme">Prendre un RDV</button>
																	</div>
																</td>
							</tbody>
						</table>
					</section>
				</div>
			</div>



		</form>
		</section>

		<?php  }}}
?>

<!-- MODAL INSCRIPTION de PATIENT-->
   <div id="myModal28" class="modal modal_inscription container" data-easein="swoopIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                        

                                            <div class=" prenom form-group col-sm-6">
                                                <label for="prenom" class="sr-only">PRENOM</label>
                                                <input type="text" class="form-control" placeholder="PRENOM" id="prenom" name="prenom">
                                                <small id="erreur_prenom"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <input id="id_docteur" type="hidden" value="<?php echo $idd ;?>">
                            
                                    <div class=" date_de_naissance form-group col-lg-12">
                                        <label for="date_de_naissance" class="">Date de Naissance</label>
                                        <input type="date" class="form-control " name="date_de_naissance" id="date_de_naissance" placeholder="Votre Date De Naissance">
                                        <small id="output_checkdatedenaissane"></small>
                                    </div>
                          

                                    <div class=" col-lg-12 numero_de_tel form-group ">
                                        <label for="numero_de_tel" class="sr-only">Mobile</label>
                                        <input type="text" class="form-control" name="numero_de_tel" id="numero_de_tel" placeholder="06 xx xx xx xx">
                                        <small id="erreur_numero_de_tel"></small>
                                    </div>

  









                                </div>

                            </div>










                            <div class="modal-footer">
                                <button class="btn btn-success" name="confirmation_rdv" id="confirmation_rdv">Confirmer le RDV</button>
                                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <div class="container">
  
      <!-- modal ERREUR -->

      
    <div class="modEample">
 
  
      <div id="myModal31" class="modal" data-easein="flash"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header alert  alert-danger">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Erreur !</h4 ><span id="modal_erreur">Vous devez d'abord selectionner un créneau</span>
				<button class="btn btn-default pull-right  " data-dismiss="modal" aria-hidden="true">Fermer</button>
            </div>
 
        </div>
      </div>
      </div>
		</div>
		</div>


   <!-- modal Annulation RDV -->

      
    <div class="modEample">
 
  
      <div id="modal_annulation" class="modal" data-easein="swoopIn"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
              
              <form onsubmit="return false;" id="formulaire_annuler">
                    <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                <h4 class="modal-title">Tapez Votre Mot de passe</h4>
                            </div>
                  <div class="modal-body ">

        <div class="row">
                                        <div class="col-lg-12">
                                            <div class=" nom form-group col-sm-12">
                                                <label for="mot_de_passe_annuler" class="sr-only">Mot de passe</label>
                                                <input type="text" class="form-control" placeholder="Mot de passe" id="mot_de_passe_annuler" name="mot_de_passe_annule">
                                            
                                            </div>
                                            <div class="row">
                                            <div class="col-sm-12">
                                            <span id="erreur_annuler" style="color:red"></span>
                                </div>
                                       </div> </div>
                                    </div>
                  </div>
                  
                  
                 <div class="modal-footer">
                                <button class="btn btn-success" name="confirmation_annuler" id="confirmation_annuler">Confirmer l'annulation</button>
                                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>

                            </div>   
              </form>
              

        </div>
      </div>
      </div>
		</div>
	

<?php	require "includes/footer.php"; ?>


<script>
	
    $(".annuler").on('click',function(){
        $("#modal_annulation").modal('show');
        
    });
    $("#confirmation_annuler").on('click',function(){
        
       var mot_de_passe_annuler=$("#mot_de_passe_annuler").val();
        if (mot_de_passe_annuler==""){
            $("#erreur_annuler").html("Veuillez tapez Votre mot de passe");
                
        }
   		
            
                    else {
					$.ajax({
						type: "post",
						url: "traitement2.php",
						data: {
							'mot_de_passe_annuler': mot_de_passe_annuler,
				
                        },success: function (data){
                           alert(data);
                        },error: function() {
                            alert('La requête n\'a pas abouti'); }

                     });
                   


				}

    });
    
	
	$(".confirmer").on('click',function () {
		var rdv  = $('input:checked[name=rdv]').val();
		var rdv1  = $('input:checked[name=rdv]').size();
			
		if (rdv1==0){
	$("#myModal31").modal('show');
		}
			
				 else {
					
$("#myModal28").modal('show');
                     $(':input','#inscription_patient')
									.not(':button, :submit, :reset, :hidden')
									.val('')
									.removeAttr('checked')
									.removeAttr('selected')
                                    .removeClass("alert  alert-danger")
                                    .removeClass("alert  alert-success");
                     $("#inscription_patient div").removeClass("has-error has-feedback");
                     $("#inscription_patient div").removeClass("has-success has-feedback");
                     $("#inscription_patient small").empty();
                          
                 
				  }
    }); 
                     $("#confirmation_rdv").on('click',function () {
                        
                         var nom = $("#nom").val();
                              var prenom = $("#prenom").val();
              
                     var numero_de_tel = $("#numero_de_tel").val();
    
				var date_de_naissance = $("#date_de_naissance").val();
				
                var rdv  = $('input:checked[name=rdv]').val();        
                  var id=$("#id_docteur").val();
                  
                         
                         if (nom == "" || prenom == "" || numero_de_tel == "" || date_de_naissance == "" ||  rdv == ""|| id == "" ) {
                            	$("#erreur_erreur").html("VEuillez remplire tous les champs ");

                         }
                                      	 else
				if (!(/[a-z]$/.test(nom))) {
					$("#erreur_erreur").html("Votre nom doit contenir que des lettres");
                

				}  
                                                  	 else
				if (!(/[a-z]$/.test(prenom))) {
					$("#erreur_erreur").html("Votre prenom doit contenir que des lettres");
                

				} 
                                                  
			
                         else if (!(/^0[5-7][-. ]?[4-9][0-9]([-. ]?[0-9]{2}){3}$/.test(numero_de_tel))) {
                           	$("#erreur_erreur").html("Corrigez le numéro de tel");  
                         }
			
            
                    else {
					$.ajax({
						type: "post",
						url: "traitement.php",
						data: {
							'nom1': nom,
							'prenom1': prenom,
							'date_de_naissance1': date_de_naissance,
							'id1': id,
							'rdv': rdv,
							
							'numero_de_tel1': numero_de_tel,
						
                         
                        },success: function (data){
                            if (data == "RDV deja pris"){
                                alert('RDV deja pris');
							}
                            else{ 
document.location.href="http://localhost:8888/Medecine/pdf.php?id=<?php echo $id;?>";
                                
                                }
                        },error: function() {
                            alert('La requête n\'a pas abouti'); }

                     });
                   


				}
			
	});
               
	
	
	</script>
	
	
