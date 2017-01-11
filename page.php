<?php require "includes/header.php"; ?>
     
<div class="container">
<div class="row">
<div class="row">
<div class="col-lg-10 " style="margin-top:15px">        <?php 
    
    if (!isset($_GET['page'])) {
            include_once("accueil.php"); }
       else {
            switch ($_GET['page']) {
                
                case "INSCRIPTION_DOCTEUR":
                  include_once("inscription_docteur.php");
                  break;
                case "MON_COMPTE":
                  include_once("mon_compte.php");
                  break;
                case "A_PROPOS":
                  include_once("a_propos.php");
                  break;
                    case "NOUS_Contacter":
                  include_once("nous_contacter.php");
                  break;
                default:
                  include_once("accueil.php");
            }
       }?>
</div>

</div>
   </div>

  </div>  
    
      
        
        
        
          

        
        
        
        
        
        
        
        
        
        
