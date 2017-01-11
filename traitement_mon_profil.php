<?php session_start();
//traitement de la modification de numero
if (isset($_POST['numero_de_tel'])){
    
    require "includes/connect_bd.php";
	extract ($_POST);
$numero_de_tel = htmlspecialchars($numero_de_tel);
	$numero_de_tel=preg_replace('#[^0-9]#', '', $numero_de_tel);
$amaryassa=$bdd->prepare('SELECT id FROM docteur WHERE num_de_tel=?');
$amaryassa->execute(array($numero_de_tel));
$numRows=$amaryassa->rowCount();
if (!(preg_match("#^0[5-7]([-. ]?[0-9]{2}){4}$#", $numero_de_tel)))
{
echo "MOBILIS, NEDJMA ou Djezzy";
	}
else if($numRows >0){
		echo 'Numéro déja utilisé';
		
		}
    else{
                	$req = $bdd->prepare('UPDATE docteur SET num_de_tel=:num_de_tel WHERE id=:id');
$req->execute(array( 'num_de_tel'=>$numero_de_tel,'id'=>$_SESSION['id_docteur_connecter']  ));
        echo"success";
    }
    
    
}
//traitement de la modification de numero
if (isset($_POST['email'])){
    
    require "includes/connect_bd.php";
	extract ($_POST);
$email = htmlspecialchars($email);
$amaryassa=$bdd->prepare('SELECT id FROM docteur WHERE email=?');
$amaryassa->execute(array($email));
$emailRows=$amaryassa->rowCount();
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo('Adresse email invalide');
	}
	else if($emailRows >0){
		echo 'Email déja utilisé';
		
		}
    else{
                	$req = $bdd->prepare('UPDATE docteur SET email=:email WHERE id=:id');
$req->execute(array( 'email'=>$email,'id'=>$_SESSION['id_docteur_connecter']  ));
        echo"success";
    }
    
    
}

//traitement de la modification de Wilaya et commune
if (isset($_POST['wilaya']) && isset($_POST['commune'])){
    
    require "includes/connect_bd.php";
	extract ($_POST);
$wilaya = htmlspecialchars($wilaya);
$commune = htmlspecialchars($commune);


 
                	$req = $bdd->prepare('UPDATE docteur SET wilaya=:wilaya, commune=:commune WHERE id=:id');
$req->execute(array( 'wilaya'=>$wilaya,'commune'=>$commune,'id'=>$_SESSION['id_docteur_connecter']  ));
        echo"success";
    }



//traitement de la modification de journée de repos
if (isset($_POST['repos'])){
    
    require "includes/connect_bd.php";
	extract ($_POST);
$repos1 = htmlspecialchars($repos1);
$repos=implode(",",$repos);

 
                	$req = $bdd->prepare('UPDATE docteur SET repos=:repos WHERE id=:id');
$req->execute(array( 'repos'=>$repos,'id'=>$_SESSION['id_docteur_connecter']  ));
    if ($repos1==1){echo"success1";}
    else
    {
        echo"success";
  }
    
    
}

//traitement de la modification de journée de la durée d'une visite
if (isset($_POST['duree'])){
    
    require "includes/connect_bd.php";
	extract ($_POST);
$duree = htmlspecialchars($duree);
if (!preg_match("#PT1H0M0S|PT0H45M0S|PT0H30M0S#",$duree)){
	echo "change pas le code sources awinath";
	}
else{
 
                	$req = $bdd->prepare('UPDATE docteur SET duree=:duree WHERE id=:id');
$req->execute(array( 'duree'=>$duree,'id'=>$_SESSION['id_docteur_connecter']  ));
  echo"success";
 
}
}



//traitement de la modification de nombre de visite

if (isset($_POST['nombre_visite'])){
    
    require "includes/connect_bd.php";
	extract ($_POST);
$nombre_visite = htmlspecialchars($nombre_visite);
$nombre_visite=intval($nombre_visite);
  
 if(strlen($nombre_visite)>2) {
		echo' max 2 chiffres';
		
	}

else if ($nombre_visite>39)
		{
			echo 'entre 1 et 39';
}
    else{               	$req = $bdd->prepare('UPDATE docteur SET nombre_visite=:nombre_visite WHERE id=:id');
$req->execute(array( 'nombre_visite'=>$nombre_visite,'id'=>$_SESSION['id_docteur_connecter']  ));
  echo"success";}
}




//traitement de la modification du début de travail
if (isset($_POST['debut_de_travail'])){
    
    require "includes/connect_bd.php";
	extract ($_POST);
$debut_de_travail = htmlspecialchars($debut_de_travail);


 
                	$req = $bdd->prepare('UPDATE docteur SET debut_de_travail=:debut_de_travail WHERE id=:id');
$req->execute(array( 'debut_de_travail'=>$debut_de_travail,'id'=>$_SESSION['id_docteur_connecter']  ));
   
        echo"success";
  
    
    
}
    
  

//traitement de la modification de la durée de repos
if (isset($_POST['duree_repos'])){
    
    require "includes/connect_bd.php";
	extract ($_POST);
$duree_repos = htmlspecialchars($duree_repos);

 if (!preg_match("#PT2H0M0S|PT1H30M0S|PT1H15M0S|PT1H0M0S|PT0H45M0S|PT0H30M0S|PT0H20M0S|PT0H15M0S|PT0H10M0S#",$duree_repos)){
	echo "change pas le code sources Tonton";}
	else{
 
                	$req = $bdd->prepare('UPDATE docteur SET duree_repos=:duree_repos WHERE id=:id');
$req->execute(array( 'duree_repos'=>$duree_repos,'id'=>$_SESSION['id_docteur_connecter']  ));
   
        echo"success";
  }
    
    
}



//traitement de la modification à partir de quelle heure commence la pause
if (isset($_POST['pause_midi'])){
    
    require "includes/connect_bd.php";
	extract ($_POST);
$pause_midi = htmlspecialchars($pause_midi);


 
                	$req = $bdd->prepare('UPDATE docteur SET pause_midi=:pause_midi WHERE id=:id');
$req->execute(array( 'pause_midi'=>$pause_midi,'id'=>$_SESSION['id_docteur_connecter']  ));
   
        echo"success";
  
    
    
}
    
