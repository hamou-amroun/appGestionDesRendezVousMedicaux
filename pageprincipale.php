<?php session_start(); ?>
<?php	require "includes/head.php"; ?>

<header class="header">
  <div class="container">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="#" class="navbar-brand scroll-top logo  animated bounceInDown"><b><i></i><em style="color:#666666;">RDV</em>Doc</b></a> </div>
      <!--/.navbar-header-->
      <div id="main-nav" class="collapse navbar-collapse">
        <ul class="nav navbar-nav" id="mainNav">
          <li class="active" id="firstLink"><a href="#home" class="">accueil</a></li>
          <li ><a href="#rendez-vous" class="">Rendez-Vous</a></li>
          <li><a href="#pharmacie-de-garde" class="">Pharmacie de Garde</a></li>
          <li><a href="#team" class="">Team</a></li>
    
          <li><a href="#docteur" class="">Vous êtes Doc?</a></li>
        </ul>
      </div>
      <!--/.navbar-collapse--> 
    </nav>
    <!--/.navbar--> 
  </div>
  <!--/.container--> 
</header>
<!--/.header-->
<div id="#top"></div>



<section id="home" >
<div class="banner-container">
<div id="carousel" class="carousel slide ">
<!-- pour les indicateur-->

<ol class="carousel-indicators  hidden-xs" style="left: 25%;">
<li data-target="#carousel" data-slide-to="0"class="active" style=" "></li>
<li data-target="#carousel" data-slide-to="1" style=" "></li>
<li data-target="#carousel" data-slide-to="2" style=" "></li>



</ol>

<div class="carousel-inner">

<div class="item active"> <img alt="banner" src="images/banner-bg.jpg">

</div>
<div class="item"> <img alt="banner" src="images/banner-bg1.jpg">
<h1 class="carousel-caption">Une autre présentation</h1>
</div>

<div class="item"> <img alt="banner" src="images/Capture.PNG">

</div>

</div>
<div class="hidden-md hidden-lg hidden-sm">
<a class="left carousel-control" href="#carousel" data-slide="prev">
<span class="icon-prev"></span>
</a>
<a class="right carousel-control" href="#carousel" data-slide="next">
<span class="icon-next"></span>
</a>
</div>
</div>
 <div class="container banner-content">
      <div class="hero-text animated fadeInDownBig hidden-xs hidden-sm hidden-md" style=" margin-top: 390px;">
        <h1 class="responsive-headline " style="font-size: 40px; top:150px">Prendre un RDV</h1>
        <a href="#basics" class="arrow-link"> <i class="fa fa-arrow-circle-down fa-2x"></i> </a> 
        <!--<p>Awesome theme for your Business or Corporate site to showcase <br/>
          your product and service.</p>--> 
      </div>
    </div>
</div></section>
  <section id="services" class="page-section colord" style="background-color:#5990E3" ><section class="page-section"   >
          
           <div class="container">
    <div class="heading text-center"> 
      <!-- Heading -->
      <h2>Obtenir un Rdv en quelques clics</h2>

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
    
    

<section id="aboutUs">
  <div class="container">
    <div class="heading text-center"> 
      <!-- Heading -->
      <h2>About Us</h2>
      <p>At lorem Ipsum available, but the majority have suffered alteration in some form by injected humour.</p>
    </div>
    <div class="row feature design">
      <div class="six columns right">
        <h3>Clean and Modern Design.</h3>
        <p>Lorem ipsum dolor sit amet, ea eum labitur scsstie percipitoleat fabulas complectitur deterruisset at pro. Odio quaeque reformidans est eu, expetendis intellegebat has ut, viderer invenire ut his. Has molestie percipit an. Falli volumus efficiantur sed id, ad vel noster propriae. Ius ut etiam vivendo, graeci iudicabit constituto at mea. No soleat fabulas prodesset vel, ut quo solum dicunt.
          Nec et jority have suffered alteration. </p>
        <p>Odio quaeque reformidans est eu, expetendis intellegebat has ut, viderer invenire ut his. Has molestie percipit an. Falli volumus efficiantur sed id, ad vel noster propriae. Ius ut etiam vivendo, graeci iudicabit constituto at mea. No soleat fabulas prodesset vel, ut quo solum dicunt.
          Nec et amet vidisse mentitumsstie percipitoleat fabulas. </p>
      </div>
      <div class="six columns feature-media left"> <img src="images/feature-img-1.png" alt=""> </div>
    </div>
  </div>
</section>
<section id="work" class="page-section page">
  <div class="container text-center">
    <div class="heading">
      <h2>Our Facilities</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, alias enim placeat earum quos ab.</p>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="portfolio">
          <ul class="items list-unstyled clearfix animated fadeInRight showing" data-animation="fadeInRight" style="position: relative; height: 438px;">
            <li class="item branding" style="position: absolute; left: 0px; top: 0px;"> <a href="images/work/1.jpg" class="fancybox"> <img src="images/work/1.jpg" alt="">
              <div class="overlay"> <span>Etiam porta</span> </div>
              </a> </li>
            <li class="item photography" style="position: absolute; left: 292px; top: 0px;"> <a href="images/work/2.jpg" class="fancybox"> <img src="images/work/2.jpg" alt="">
              <div class="overlay"> <span>Lorem ipsum</span> </div>
              </a> </li>
            <li class="item branding" style="position: absolute; left: 585px; top: 0px;"> <a href="images/work/3.jpg" class="fancybox"> <img src="images/work/3.jpg" alt="">
              <div class="overlay"> <span>Vivamus quis</span> </div>
              </a> </li>
            <li class="item photography" style="position: absolute; left: 877px; top: 0px;"> <a href="images/work/4.jpg" class="fancybox"> <img src="images/work/4.jpg" alt="">
              <div class="overlay"> <span>Donec ac tellus</span> </div>
              </a> </li>
            <li class="item photography" style="position: absolute; left: 0px; top: 219px;"> <a href="images/work/5.jpg" class="fancybox"> <img src="images/work/5.jpg" alt="">
              <div class="overlay"> <span>Etiam volutpat</span> </div>
              </a> </li>
            <li class="item web" style="position: absolute; left: 292px; top: 219px;"> <a href="images/work/6.jpg" class="fancybox"> <img src="images/work/6.jpg" alt="">
              <div class="overlay"> <span>Donec congue </span> </div>
              </a> </li>
            <li class="item photography" style="position: absolute; left: 585px; top: 219px;"> <a href="images/work/7.jpg" class="fancybox"> <img src="images/work/7.jpg" alt="">
              <div class="overlay"> <span>Nullam a ullamcorper diam</span> </div>
              </a> </li>
            <li class="item web" style="position: absolute; left: 877px; top: 219px;"> <a href="images/work/8.jpg" class="fancybox"> <img src="images/work/8.jpg" alt="">
              <div class="overlay"> <span>Etiam consequat</span> </div>
              </a> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="docteur" class="page-section">
  <div class="container">
    <div class="heading text-center"> 
      <!-- Heading -->
      <h2>Vous êtes un docteur?!</h2>
      <p> Alors n'hésitez pas à vous inscrire!</p>
    </div>
  
  <div class="row">
  <div class="col-sm-6">
    <h2>Vous n'avez pas encore de compte?!</h2>
   <p> Inscrivez vous et profitez de notre plateforme!</p>
 <a href="http://localhost:8888/Medecine/inscription_docteur.php"> <button class="btn btn-info btn-lg">S'inscire</button></a> </div>
 
  
   
    
      <div class="col-sm-6">
      
      <?php 
          if (isset($_SESSION['boolean_session'])){?>
            <h2>Vous êtes déja connecté</h2>
   <p> Cliquez pour revenir sur votre compte!</p>
         <a href="http://localhost:8888/Medecine/membre_docteur.php"> <button class="btn btn-info btn-lg">Reconnecter</button></a>
         <?php     
          }

else{
          ?>
  <h2>Vous disposez déja d'un compte?!</h2>
   <p> Connectez vous et profitez de notre plateforme!</p>
  <button id="connexion" class="btn btn-info btn-lg">Se Connecter</button></div>
<?php } ?>
  
  
  
  </div>

  
  
  
  </div>
  <!--/.container--> 
</section>



<section id="contactUs" class="contact-parlex">
  <div class="parlex-back">
    <div class="container">
      <div class="row">
        <div class="heading text-center"> 
          <!-- Heading -->
          <h2>Contact Us</h2>
          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered.</p>
        </div>
      </div>
      <div class="row mrgn30">
        <form method="post" action="" id="contactfrm" role="form">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" title="Please enter your name (at least 2 characters)">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" title="Please enter a valid email address">
              <button name="submit" type="submit" class="btn btn-lg btn-primary" id="submit">Submit</button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="comments">Comments</label>
              <textarea name="comment" class="form-control" id="comments" cols="3" rows="5" placeholder="Enter your message…" title="Please enter your message (at least 10 characters)"></textarea>
            </div>
            <div class="result"></div>
          </div>
        </form>
        <div class="col-sm-4">
          <h4>Address:</h4>
          <address>
          WebThemez Company<br>
          134 Stilla. Tae., 414515<br>
          Leorislon, SA 02434-34534 USA <br>
          </address>
          <h4>Phone:</h4>
          <address>
          12345-49589-2<br>
          </address>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="social text-center"> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-dribbble"></i></a> <a href="#"><i class="fa fa-flickr"></i></a> <a href="#"><i class="fa fa-github"></i></a> </div>
      <!--CLEAR FLOATS--> 
    </div>
    <!--/.container--> 
  </div>
</section>
<!--/.page-section-->

<div class="container modal_connexion">

    <!-- modal examples -->


    <div class="modEample">


        <div id="modal_connexion" class="modal" data-easein="flipYIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color:#5990E3;">
                    <form onsubmit="return false;" id="formulaire_connexion">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title">Vos Cordonnées</h4>
                        </div>

                        <div class="modal-body ">

                            <div class="row">

                                <div class="row">



                                    <div class="col-lg-12">


                                        <div class=" col-lg-12 numero_de_tel form-group ">
                                            <label for="email_connexion" class="sr-only">Mobile</label>
                                            <input type="email" class="form-control" name="email_connexion" id="email_connexion" placeholder="docteur@Exemple.dz">
                                    
                                        </div>
                                    </div>

                                    <div class="col-lg-12">

                                        <div class=" pass1 form-group col-lg-12">
                                            <label for="password_connexion" class="sr-only">Mot de passe</label>
                                            <input type="password" placeholder="mot de passe" class="form-control" name="password_connexion" id="password_connexion">
                                     
                                        </div>


                                    </div>
                                    
                                    <div class="col-lg-12">
              <div class=" pass1 form-group col-lg-12">
                                   <small style="color:red" id="erreur_connexion"> </small>  

                                        </div> </div>



                                </div>

                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-success" style="color: #fff;background-color: #5cb85c; border-color: #4cae4c;" name="bouton_connexion" value="se_connecter" id="bouton_connexion">Se Connecter</button>
                                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true" style="    color: #fff; background-color: #d9534f; border-color: #d43f3a;">Close</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php	require "includes/footer.php"; ?>





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





