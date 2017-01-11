<?php
    


         	require "includes/connect_bd.php";

       $req2 = $bdd->prepare('SELECT * FROM rdv WHERE mot_de_passe=:mot_de_passe');
    $req2->execute(array('mot_de_passe'=>"7d623ba9"));

      while($donnee=$req2->fetch()){
	$rdv=$donnee['rdv'];
   

  }

$val1 = $rdv;
           
$date2 = new DateTime(strftime('%Y-%m-%d %H:%M:%S'));

$date2=$date2->add(new DateInterval("P1DT0H0M0S"));


$datetime1 = new DateTime($val1);


echo $datetime1->format('Y-m-d H:i:s');
?> <br><?php
echo $date2->format('Y-m-d H:i:s');
?> <br><?php

   $annulerRows=$req2->rowCount();
		if($annulerRows == 0){
		echo"mot de passe erroné";
			exit();
		} 
    
else  if($datetime1 < $date2){
  echo "Erreur il vous reste moins de 24h pour le RDV ";
}



          
		
  
 
    
    
    
    else{

        
       echo"success_annuler"; 
        
    } 








?>



















<?php
/*
if(isset($_POST['nom1']) && isset($_POST['prenom1'])  && isset($_POST['date_de_naissance1']) && isset($_POST['numero_de_tel1']) && isset($_POST['pass11']) && isset($_POST['pass21'])   ){
    
    	require "includes/connect_bd.php";
	extract ($_POST);
$nom1 = htmlspecialchars($nom1);
$prenom1 = htmlspecialchars($prenom1);
$date_de_naissance1 = htmlspecialchars($date_de_naissance1);
$numero_de_tel1 = htmlspecialchars($numero_de_tel1);
$pass11 = htmlspecialchars($pass11);
$pass21 = htmlspecialchars($pass21);



    
	$numero_de_tel1=preg_replace('#[^0-9]#', '', $numero_de_tel1);
    $nom1=preg_replace('#[^a-z]#i', '', $nom1);
$prenom1=preg_replace('#[^a-z]#i', '', $prenom1);
    
    if (preg_match("#[^a-z]#i", $nom1)){
		echo 'Doit contenir que des Lettres'.$id1;}
	
	else if (preg_match("#[^a-z]#i", $prenom1)){
		echo 'Doit contenir que des Lettres';}
    	else if (!(preg_match("#^[0-9]{4}-[0-9]{2}-[0-9]{2}$#", $date_de_naissance1)))
{
echo "corrigez la date";
}
	elseif (!preg_match("#^0[5-7][-. ]?[4-9][0-9]([-. ]?[0-9]{2}){3}$#", $numero_de_tel1))
{
echo "MOBILIS, NEDJMA ou Djezzy";
	exit();
}
  
    	else if ($pass11!=$pass21){
		echo 'Les mots de passes ne correspondent pas';
	}
    else{
        echo "success_rdv";
    }
	exit();
}



























?>
       
<?php/*
        
        <?php
session_start();
    require "includes/connect_bd.php";


          
          $reponse= $bdd->prepare('SELECT * FROM docteur where id=?');

		$reponse->execute(array($_SESSION['id_docteur_connecter']));

    


while ($donnees = $reponse->fetch()){
$id=$donnees['id'];	
$nom=$donnees['nom'];	
$prenom=$donnees['prenom'];
$specialite=$donnees['specialite'];
$wilaya=$donnees['wilaya'];
$commune=$donnees['commune'];
$num_de_tel=$donnees['num_de_tel'];
    
    echo ($nom.$prenom);
}
 ?>
  */
?>