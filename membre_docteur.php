<?php
session_start();
if (isset($_SESSION['boolean_session']))

{
$boolean_session=$_SESSION['boolean_session'];
if ($boolean_session=="true"){

require "includes/head.php"; ?>

<style>.header .navbar {
	margin: 0;
	background: transparent;
	border: 0;
    

    
}
    body{background-color: rgba(3, 211, 244,0.5);}
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
          <li class="" id="firstLink"><a href="?page=agenda" class="">Agenda</a></li>
          <li><a href="membre_docteur.php?page=patients" class="">Patients</a></li>
          <li><a href="membre_docteur.php?page=Mon_profil" class="">Mon profil</a></li>
          <li><a href="#team" class=""> Historique </a></li>
          <li><a href="#team" class="bouton_deconnexion"> Déconnexion </a></li>
    
        </ul>
      </div>
      <!--/.navbar-collapse--> 
    </nav>
    <!--/.navbar--> 
  </div>
  <!--/.container--> 
</header> <br>

<section class="page-section  ">
   


<?php
    if (isset($_GET['page'])) {
         switch ($_GET['page']) {
                case "agenda":
           include_once("table_rdv_medecin.php");
                  break;
                case "patients":
                
                  include_once("patients.php");
                 
                  break;
              case "Mon_profil":
                  include_once("amar.php");
                  break;
            }

} 
    ?>
    </section> 
    
       
  <div class="container">
  
      <!-- modal Déconnexion -->
<form action="traitement2.php" method="post">
      
    <div class="modEample">
 
  
      <div id="modal_deconnexion" class="modal" data-easein="shrinkIn"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header alert  alert-danger">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title"> Déconnexion </h4 ><span id="modal_erreur">Voulez-vous vraiment vous déconnecter?</span>
				
            </div>
              <div class="modal-footer">
                                <button class="btn btn-success" name="boutton_modal_deconnexion" id="boutton_modal_deconnexion">Déconnexion </button>
                                <button class="btn btn-success" data-dismiss="modal" aria-hidden="true" style="background-color:red">Fermer</button>

                            </div>   
 
        </div>
      </div>
      </div>
		</div>
		</form>
		</div>
             


<section style="display:none"><?php	require "includes/footer.php"; ?></section>
<?php 
    }
    }
else{ echo "vous devez vous connectez";
}
?>






<script>
    $(".bouton_deconnexion").on('click',function(){
        $("#modal_deconnexion").modal('show');
        
    });
</script>

	<script src="js/chained.js">
	</script>
	<script type="text/javascript" charset="utf-8">
		$(function () {
			$("#commune").chained("#wilaya");

		});
        
        
	</script>
	