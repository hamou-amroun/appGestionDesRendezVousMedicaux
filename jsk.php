<?php	require "includes/head.php"; ?>
<style>.header .navbar {
	margin: 0;
	background: transparent;
	border: 0;
    

    
}
    </style>

<header class="header">
  <div class="container">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="pageprincipale.php" class="navbar-brand scroll-top logo  animated bounceInDown"><b><i></i><em style="color:#666666;">RDV</em>Doc</b></a> </div>
      <!--/.navbar-header-->
      <div id="main-nav" class="collapse navbar-collapse">
        <ul class="nav navbar-nav" id="mainNav">
          <li class="active" id="firstLink"><a href="#resultat" class="">Résulat</a></li>
          <li ><a href="#recherche" class=""><i class="fa fa-search fa-2x" aria-hidden="true"></i></a></li>
          <li><a href="#annule_un_rdv" class="">Annluer un RDV</a></li>
          <li><a href="#team" class="">Team</a></li>
    
        </ul>
      </div>
      <!--/.navbar-collapse--> 
    </nav>
    <!--/.navbar--> 
  </div>
  <!--/.container--> 
</header>
<!--/.header-->


<section id="resultat" class="page-section  "style=""> <section  class="page-section ">
          <div class="heading text-center"> 
      <!-- Heading -->
      <h2>Voilà le résultat de votre recherche</h2>
      <p> Choisissez un docteur et accédez à son agenda</p>
    </div>
    
    <div> 
    <?php	
        
      if (empty($_POST['specialite']) && empty($_POST['wilaya']) && empty($_POST['commune'])  )
{
    
    echo 'Veuillez Seclectionner au moins un champs!' ;
}
else{
     require "includes/connect_bd.php";

    if(isset($_POST['specialite']) && !empty($_POST['specialite']) && empty($_POST['wilaya']) && empty($_POST['commune']))
       {
    $_POST['specialite'] = htmlspecialchars($_POST['specialite']);
          
          $reponse= $bdd->prepare('SELECT * FROM docteur where specialite=?');

		$reponse->execute(array($_POST['specialite']));
    }

else
        if(isset($_POST['wilaya']) && !empty($_POST['wilaya']) && empty($_POST['specialite']) && empty($_POST['commune']))
       {
   $_POST['wilaya'] = htmlspecialchars($_POST['wilaya']);
            

          $reponse= $bdd->prepare('SELECT * FROM docteur where wilaya=?');

		$reponse->execute(array($_POST['wilaya']));
    }    
        
        
 else
        if(isset($_POST['commune']) && !empty($_POST['commune']) && empty($_POST['specialite']) )
       {
               $_POST['commune'] = htmlspecialchars($_POST['commune']);

      
          $reponse= $bdd->prepare('SELECT * FROM docteur where commune=?');

		$reponse->execute(array($_POST['commune']));
    }

 else
        if(isset($_POST['specialite']) && isset($_POST['wilaya']) && !empty($_POST['specialite']) && !empty($_POST['wilaya']) && empty($_POST['commune']) )
       {
               $_POST['specialite'] = htmlspecialchars($_POST['specialite']);
               $_POST['wilaya'] = htmlspecialchars($_POST['wilaya']);


          $reponse= $bdd->prepare('SELECT * FROM docteur where specialite=? and wilaya=? ');

		$reponse->execute(array($_POST['specialite'], $_POST['wilaya']));
    } 

    else
        if(isset($_POST['specialite']) && isset($_POST['commune']) && !empty($_POST['specialite']) && !empty($_POST['commune'])  )
       {

         $_POST['specialite'] = htmlspecialchars($_POST['specialite']);
               $_POST['commune'] = htmlspecialchars($_POST['commune']);
          $reponse= $bdd->prepare('SELECT * FROM docteur where specialite=? and commune=? ');

		$reponse->execute(array($_POST['specialite'], $_POST['commune']));
    }     
          
        
        $numRows=$reponse->rowCount();
    if ($numRows==0){ echo "Aucun résultat";}
    else{
while ($donnees = $reponse->fetch()){
$id=$donnees['id'];	
$nom=$donnees['nom'];	
$prenom=$donnees['prenom'];
$specialite=$donnees['specialite'];
$wilaya=$donnees['wilaya'];
$commune=$donnees['commune'];
$num_de_tel=$donnees['num_de_tel'];
$photo=$donnees['photo'];
 ?>
         <div class="container" style="border: 1px solid black;">
  <header class="row">
<div class="col-lg-12">
<h2 class="" style="" > Dr. <em style="text-transform: uppercase;"> <?php echo $id.' ' .$nom. ' '.$prenom  ?> </em></h2>
</div>
</header>
         <div class="row">
             <div class="col-xs-4 col-sm-3 ">
                <div class="row">
                        <div id="">
              <!-- Image  -->
                <ul class="items list-unstyled clearfix animated fadeInRight showing" data-animation="fadeInRight" > 
                    <li class="item ">   <a href="uploads/<?php echo $photo;?>.jpg" class="fancybox">    <img class="img-responsive col-xs-12" src="uploads/<?php echo $photo;?>.jpg" alt="">  </a> </li> </ul></div>
                  
                </div>
      
    
            </div>
             <div class="col-xs-11 col-sm-9">
         
    
     <div class="row" ><p style="text-transform: uppercase;"> <?php echo $specialite ?> </p>           </div>
             <div class="row">  <p> Commune de <?php echo $commune ?> </p> </div>
                 <div class="row" > <h2> <?php echo $num_de_tel ?> </h2> </div>
            <div class="row" >     
            
           <a href="http://localhost:8888/Medecine/date_rdv.php?idd=<?php echo $id ?>"> 
            <button  style="margin-bottom: 14px;" class="btn btn-info btn-lg" name="bouton_agenda" id="bouton_agenda"><i class="fa fa-calendar fa-1x" aria-hidden="true"></i>&nbsp;Son agenda </button></a> </div>
           
            </div>
            <br>    
    
           <!-- <div class="col-xs-4" style="word-wrap:break-word;">
           
           

           
            </div> -->
             
           
            </div>   
            
 
        </div>
    <?php
    
    
}
}
}
  ?>
   
        </div>
    
    
    
    </section>
       </section>
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
 <section id="" class="page-section colord ">

 </section>      
       
       
       
       
    <section id="recherche" class="page-section colord" style="background-color:#5990E3" ><section class="page-section"   >
          
    
           <div class="container">
    <div class="heading text-center"> 
      <!-- Heading -->
      <h2>Une simple Recherche</h2>
      <p> Pour trouver votre DOCTEUR et choisir l'heure de RDV</p>
    </div>
    
 
  <div class="row">
  
 <form id="recherche" action="jsk.php" method="post">
  <div class="col-sm-6"> 
   <h2>Trouvez un docteur seulement en choississant </h2>
   <p> Sa SPECIALITE et/ou Sa WILAYA ou/et Sa COMMUNE</p>
   <div class="row">
   <div class="specialite  col-sm-3"><select id="specialite" name="specialite" class="" onchange="verifForm();">
						<option value="">--Specialité--</option>
						<option value="generaliste">Généraliste</option>
						<option value="dentiste">Dentiste</option>
						<option value="cardiologue">cardiologue</option>
</select> 

   
   
   </div>
   <div class="wilaya  col-sm-3">
<select name="wilaya" id="wilaya" onchange="verifForm();" >
<option value="">--wilaya--</option>

<option  value="15" > Tizi Ouzou</option> 			
<option  value="06" > Béjaia</option> 			
<option  value="16" > Alger</option> 			
</select>
	
	
</div>
<div class="commune col-sm-3 ">


 <select name="commune" id="commune"   onchange="verifForm();" disabled="true">
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
<br>
  <small id="recherche_vide" style="color:red; font-size:1em;"> Veuillez selectionner au moins un champ</small>
   <br>
   <button id="trouver_docteur" class="btn btn-info btn-lg" disabled="true" ><i class="fa  fa-stethoscope fa-1x" aria-hidden="true"></i>&nbsp;Trouver Docteur</button>
   
    
   
   </div>
   </form>
  <div class="col-sm-6">
  <h2>Vous connaissez le nom de votre Docteur?</h2>
  <form action="date_rdv.php" method="get">
   <label for="choix_docteur">Alors selectionnez son nom et accédez à son agenda: </label>
     
<br>
<select name="idd" id="choix_docteur" onchange="verifAgenda()">
 <option  value="" >--Liste docteurs--</option>
<?php	require "includes/connect_bd.php";
	$reponse = $bdd->query('SELECT * FROM docteur order by nom');

while ($donnees = $reponse->fetch()){
$id=$donnees['id'];	
$nom=$donnees['nom'];	
$prenom=$donnees['prenom'];
    ?>
    <option  value="<?php echo $id?>" ><?php  echo $nom.' '.$prenom; ?> </option>
    <?php
         }



    ?>
</select>

  
 
            <button disabled="true" id="bouton_agenda"  style="margin-bottom: 14px;" class="btn btn-info btn-lg" ><i class="fa fa-calendar fa-1x" aria-hidden="true"></i>&nbsp;Son agenda </button>
  <br>
  <br>

</form>
  </div>
  </div>

               
  
  </div>
        
        
        
  
         
        
    </section>
    </section>
   

    <section id="annuler_un_rdv" class="page-section" ></section>







<!--[if lte IE 8]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]--> 



<script src="js/modernizr-latest.js"></script> 
<script src="js/jquery-2.2.0.min.js" type="text/javascript"></script> 
<script src="css/bootstrap-3.3.6-dist/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="js/jquery.isotope.min.js" type="text/javascript"></script> 
<script src="js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script> 
<script src="js/jquery.nav.js" type="text/javascript"></script> 
<script src="js/jquery.fittext.js"></script> 
<script src="js/waypoints.js"></script> 
<script src="js/custom.js" type="text/javascript"></script> 
<script src="js/owl-carousel/owl.carousel.js"></script>


	<script src="js/chained.js">
	</script>
	<script type="text/javascript" charset="utf-8">
		$(function () {
			$("#commune").chained("#wilaya");

		
		});
        	$("#connexion").on('click',function () {
                $("#modal_connexion").modal('show');
                
                
                
            });
	</script>


   <script>
    
function verifForm()
{
    if(document.getElementById('specialite').value !='' || document.getElementById('wilaya').value!='' || document.getElementById('commune').value !='')
    {
        document.getElementById('trouver_docteur').disabled=false;
 
        document.getElementById('recherche_vide').setAttribute('style','display:none; ');
 
    }
    else{
           document.getElementById('trouver_docteur').disabled=true;
         document.getElementById('recherche_vide').setAttribute('style','color:red; font-size:1em; ');
    }
}
function verifAgenda()
{
    if(document.getElementById('choix_docteur').value !='')
    {
        document.getElementById('bouton_agenda').disabled=false;
 
  
 
    }
    else{
           document.getElementById('bouton_agenda').disabled=true;
       
    }
}
       
</script>


</body>
</html>





