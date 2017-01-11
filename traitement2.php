<?php
    

if(isset($_POST['mot_de_passe_annuler'])){

         	require "includes/connect_bd.php";

       $req2 = $bdd->prepare('SELECT * FROM rdv WHERE mot_de_passe=:mot_de_passe');
    $req2->execute(array('mot_de_passe'=>$_POST['mot_de_passe_annuler']));

      while($donnee=$req2->fetch()){
	$rdv=$donnee['rdv'];
   

  }

$val1 = $rdv;
           
$date2 = new DateTime(strftime('%Y-%m-%d %H:%M:%S'));

$date2=$date2->add(new DateInterval("P1DT0H0M0S"));


$datetime1 = new DateTime($val1);


   $annulerRows=$req2->rowCount();
		if($annulerRows == 0){
		echo"mot de passe erroné";
			exit();
		} 
    
  else  if($datetime1 < $date2){
  echo "Erreur il vous reste moins de 24h pour le RDV ";
}



          
		
  
 
    
    
    
    else{
                  $req3 = $bdd->prepare('DELETE FROM rdv WHERE mot_de_passe=:mot_de_passe');
$req3->execute(array('mot_de_passe'=>$_POST['mot_de_passe_annuler']));
        
       echo"success_annuler"; 
        
    } 
}





/*traitement des empechements*/

if(isset($_POST['confirme']))
   {
    echo $_POST["variable_vide"];
    
    if ($_POST["rdv1"]==0)
    {
       $_POST["empechement"]=$_POST["variable_vide"]; 
    }
    
   else{ 
    $_POST["empechement"]=implode(",",$_POST["empechement"]);
    
      echo $_POST["empechement"];
    
     }    
    require "includes/connect_bd.php";
        session_start();
        	$req = $bdd->prepare('UPDATE docteur SET empechement=:empechement WHERE id=:id_empechement');
$req->execute(array( 'empechement'=>$_POST["empechement"],'id_empechement'=>$_SESSION['id_docteur_connecter']  ));
    echo"success";
       
       
   }


/*traitement de formulaire de connexion docteur*/

if(isset($_POST['bouton_connexion']) && $_POST['bouton_connexion']=="se_connecter" ){
    
    

    
if(isset($_POST['email_connexion']) && isset($_POST['password_connexion']) && !empty($_POST['email_connexion']) && !empty($_POST['password_connexion']))
{
    

   
       
        	require "includes/connect_bd.php";
	extract ($_POST);
$email_connexion = htmlspecialchars($email_connexion);
$password_connexion = htmlspecialchars($password_connexion);   
       
          $req = $bdd->prepare('SELECT * from docteur where email=:email_connexion');
$req->execute(array('email_connexion'=>$email_connexion));

if($donnees=$req->fetch()){
    do{  
        $nom=$donnees['nom'];
 $hash_pass_connexion=sha1($password_connexion.$nom);
        
        if ($donnees['mot_de_passe']== $hash_pass_connexion )
    {
           session_start();
            	$_SESSION['id_docteur_connecter'] = $donnees['id'];
            	$_SESSION['boolean_session'] = "true";
                
        echo ("success");
             }
            
    
    
    
   if ($donnees['mot_de_passe']!=$hash_pass_connexion )
   { echo ("mot de passe ou email incorrect"); }
       
 } while ($donnees=$req->fetch());
}
elseif($donnees=$req->fetch()==false)  {echo "mot de passe ou email incorrect"; }
}
else
{
    echo "VEuillez remplire tous les champs";
}
}



/*bouton déconnexion*/

if(isset($_POST['boutton_modal_deconnexion']))
{
    session_start();
    $_SESSION = array();
session_destroy();
    header("Location: pageprincipale.php");
}


?>