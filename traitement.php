<?php
if(!empty($_POST['nom_check'])){
	$_POST['nom_check'] = htmlspecialchars($_POST['nom_check']);
	$nom= $_POST['nom_check'];
	$nom=preg_replace('#[a-z]#i', '', $nom);
	

	
if (preg_match("#[^a-z]#", $nom)){
		echo 'Doit contenir que des Lettres';
		exit();
	}

			   else{
			   echo 'success';
			   exit(); 
			   }
	exit();
	}

	
if(!empty($_POST['prenom_check'])){
	$_POST['prenom_check'] = htmlspecialchars($_POST['prenom_check']);
	$prenom= $_POST['prenom_check'];
	$prenom=preg_replace('#[a-z]#i', '', $prenom);
	

	
if (preg_match("#[^a-z]#", $prenom)){
		echo 'Doit contenir que des Lettres';
		exit();
	}

			   else{
			   echo 'success';
			   exit(); 
			   }
	}



if (!empty($_POST['numero_de_tel_check']))
{
$_POST['numero_de_tel_check'] = htmlspecialchars($_POST['numero_de_tel_check']);


	
if (!preg_match("#^0[5-7][-. ]?[4-9][0-9]([-. ]?[0-9]{2}){3}$#", $_POST['numero_de_tel_check']))
{
echo "MOBILIS, NEDJMA ou Djezzy";
	exit();
}
		$_POST['numero_de_tel_check']=preg_replace('#[^0-9]#', '', $_POST['numero_de_tel_check']);
require "includes/connect_bd.php";
	{
	$amaryassa=$bdd->prepare('SELECT id FROM docteur WHERE num_de_tel=?');
		$amaryassa->execute(array($_POST['numero_de_tel_check']));
		$numRows=$amaryassa->rowCount();
		if($numRows >0){
		echo 'Numéro déja utilisé';
			exit();
		}	
else
{
echo "success";
}	
}
}


if(!empty($_POST['email_check'])){
	$_POST['email_check'] = htmlspecialchars($_POST['email_check']);
$email=$_POST['email_check'];
	
	
//ad véréfigh l'adresse email :p
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo('Adresse email invalide');
		exit();
	}
	
//connectigh ar la BDD
require "includes/connect_bd.php";
	{
	$amar=$bdd->prepare('SELECT id FROM docteur WHERE email=?');
		$amar->execute(array($email));
		$emailRows=$amar->rowCount();
		if($emailRows >0){
		echo 'Adresse email déja utilisée';
			exit();
		}
	else
	{echo'success';
	 exit();
	}
	
	
	}

}



if(!empty($_POST['pass1_check']) && !empty($_POST['pass2_check'])){
	$_POST['pass1_check'] = htmlspecialchars($_POST['pass1_check']);
		$_POST['pass2_check'] = htmlspecialchars($_POST['pass2_check']);
	
	if (strlen($_POST['pass1_check']) < 6 || strlen($_POST['pass2_check']) < 6 ) {
		echo ' Trop court (6 caractères minimum)';
		exit();}
		
	else if($_POST['pass1_check']==$_POST['pass2_check']){
		echo 'success';
			exit();
		}

				else{
				echo 'les deux mots de passe sont différents';
					exit();
				}
}
		
	



if (!empty($_POST['nombre_visite_check']))
{
$nombre_visite_check = htmlspecialchars($_POST['nombre_visite_check']);
	
	if(strlen($nombre_visite_check)>2) {
		echo' max 2 chiffres';
		exit();
	}	
for ($i=0; $i<strlen($nombre_visite_check);$i++)
{
	if (!(is_numeric($nombre_visite_check[$i]))){
		echo ' doit contenir que des chiffre';
		exit();
	}
}
	

		if ((intval($nombre_visite_check)<1) || (intval($nombre_visite_check)>39))
		{
			echo 'entre 1 et 39';
		exit();
		}
	
	

		
else
{
echo "success";
	exit();
}	
}



	
	//traitement formulaire d'inscription du docteur

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['genre']) && isset($_POST['date_de_naissance']) && isset($_POST['email']) && isset($_POST['numero_de_tel']) && isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['specialite']) && isset($_POST['wilaya']) && isset($_POST['commune']) && isset($_POST['nombre_visite']) && isset($_POST['duree']) && isset($_POST['repos']) && isset($_POST['debut_de_travail']) && isset($_POST['duree_repos']) && isset($_POST['pause_midi']) ){

	require "includes/connect_bd.php";
	extract ($_POST);
$nom = htmlspecialchars($nom);
$prenom = htmlspecialchars($prenom);
$genre = htmlspecialchars($genre);
$date_de_naissance = htmlspecialchars($date_de_naissance);
$email = htmlspecialchars($email);
$numero_de_tel = htmlspecialchars($numero_de_tel);
$pass1 = htmlspecialchars($pass1);
$pass2 = htmlspecialchars($pass2);
$specialite = htmlspecialchars($specialite);
$wilaya = htmlspecialchars($wilaya);
$commune = htmlspecialchars($commune);
$nombre_visite = htmlspecialchars($nombre_visite);
$duree = htmlspecialchars($duree);
$debut_de_travail = htmlspecialchars($debut_de_travail);
$duree_repos = htmlspecialchars($duree_repos);
$pause_midi = htmlspecialchars($pause_midi);
$repos=implode(",",$repos);


	$numero_de_tel=preg_replace('#[^0-9]#', '', $numero_de_tel);

$nombre_visite=intval($nombre_visite);
	
	
	
$nom=preg_replace('#[^a-z]#i', '', $nom);
$prenom=preg_replace('#[^a-z]#i', '', $prenom);
	
	
$amaryassa=$bdd->prepare('SELECT id FROM docteur WHERE num_de_tel=?');
$amaryassa->execute(array($numero_de_tel));
$numRows=$amaryassa->rowCount();

$yassaamar=$bdd->prepare('SELECT id FROM docteur WHERE email=?');
		$yassaamar->execute(array($email));
		$emailRows=$yassaamar->rowCount();

	
	
$youcefzegrour=$bdd->query('SELECT * FROM pause_midi');
$amroun_hamou="";
$kenza_medjek="";
		while($donnee=$youcefzegrour->fetch()){
		$debut_de_travail1=$donnee['debut_de_travail'];
		$pause_midi1=$donnee['pause_midi'];
			$amroun_hamou.='*'.$debut_de_travail1;
			$kenza_medjek.='*'.$pause_midi1;
}
$nombre1=0;
$nombre2=0;
	$keydates = preg_split("/[*]+/i", $amroun_hamou);
	$keydates2 = preg_split("/[*]+/i", $kenza_medjek);
$b=count($keydates);
$c=count($keydates2);

for($i=0;$i<$b;$i++)
{
if (preg_match("#$debut_de_travail#",$keydates[$i])){
	$nombre1=$nombre1+1;
}

	
}
	for($j=0;$j<$c;$j++)
{
if (preg_match("#$pause_midi#",$keydates2[$j])){
	$nombre2=$nombre2+1;
}

	
}
	
	
	
	$keywords = preg_split("/[\s,]+/i", $repos);
	$a=count($keywords);
 $taille=strlen($keywords[0]);
	$nombre=0;
	for($i=0;$i<$a;$i++)
{
if (!preg_match("#^samedi$|^dimanche$|^lundi$|^mardi$|^mercredi$|^jeudi$|^vendredi$#i",$keywords[$i])){
	$nombre=$nombre+1;}
}
if ($taille==0)
{$nombre=$nombre-1;}

	


if (preg_match("#[^a-z]#i", $nom)){
		echo 'Doit contenir que des Lettres';}
	
	else if (preg_match("#[^a-z]#i", $prenom)){
		echo 'Doit contenir que des Lettres';}
	
	else if (!(preg_match("#^[0-9]{4}-[0-9]{2}-[0-9]{2}$#", $date_de_naissance)))
{
echo "corrigez la date";
}
	else if (!(preg_match("#femme|homme#", $genre)))
	{ echo "choisissez votre sexe";
	}
	else if (!(preg_match("#^0[5-7]([-. ]?[0-9]{2}){4}$#", $numero_de_tel)))
{
echo "MOBILIS, NEDJMA ou Djezzy";
	}
	else if($numRows >0){
		echo 'Numéro déja utilisé';
		
		}	
	
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo('Adresse email invalide');
	}
	else if($emailRows >0){
		echo 'Email déja utilisé';
		
		}
else if ($nombre!=0){
	echo "changez pas le code sources";
	}

	else if (!preg_match("#PT1H0M0S|PT0H45M0S|PT0H30M0S#",$duree)){
	echo "change pas le code sources awinath";
	}
	
	else if(strlen($nombre_visite)>2) {
		echo' max 2 chiffres';
		
	}	
else if ($nombre_visite>39)
		{
			echo 'entre 1 et 39';
}
	else if ($nombre1==0){
	echo "changez pas le code source de l'heure de début";
	}
		else if ($nombre2==0){
	echo "changez pas le code source de l'heure de la pause";
	}
		else if (!preg_match("#PT2H0M0S|PT1H30M0S|PT1H15M0S|PT1H0M0S|PT0H45M0S|PT0H30M0S|PT0H20M0S|PT0H15M0S|PT0H10M0S#",$duree_repos)){
	echo "change pas le code sources Tonton";
	}
	
	else if ($pass1!=$pass2){
		echo 'Les mots de passes ne correspondent pas';
	}
	else
	{
        if ($genre=="femme"){
            $photo="photo_femme";
        }
       
        if($genre=="homme"){$photo="photo_homme";}
	$hash_pass=sha1($pass1.$nom);

	$req = $bdd->prepare('INSERT INTO docteur (nom, prenom, date_de_naissance, genre, num_de_tel, email, mot_de_passe, specialite, wilaya, commune, repos, duree, nombre_visite, debut_de_travail, duree_repos, pause_midi, ip, date_inscription, photo)
VALUES(:nom, :prenom, :date_de_naissance, :genre, :num_de_tel, :email, :mot_de_passe, :specialite, :wilaya, :commune, :repos, :duree, :nombre_visite, :debut_de_travail, :duree_repos, :pause_midi, :ip, now(), :photo)');
$req->execute(array(
   
    'nom'=>$nom,
    'prenom'=> $prenom,
    'date_de_naissance'=> $date_de_naissance, 
    'genre'=> $genre,
    'num_de_tel'=> $numero_de_tel,
    'email'=> $email,
    'mot_de_passe'=> $hash_pass,
    'specialite'=> $specialite,
    'wilaya'=> $wilaya,
    'commune'=> $commune,
    'repos'=> $repos,
    'duree'=> $duree,
    'nombre_visite'=> $nombre_visite,
	'debut_de_travail'=> $debut_de_travail,
	'duree_repos'=> $duree_repos, 
	'pause_midi'=> $pause_midi, 
    'ip'=> $_SERVER['REMOTE_ADDR'],
    'photo'=>$photo));
		echo "register_success";
		
}
	exit();
}



//traitement formulaire de prise de RDV (patient)

if(isset($_POST['nom1']) && isset($_POST['prenom1']) && isset($_POST['date_de_naissance1']) && isset($_POST['id1']) && isset($_POST['rdv']) ){
    
    
    
    	extract ($_POST);

    
    

    require "includes/connect_bd.php";
    
    

	$rdv_pris=$bdd->prepare('SELECT id FROM rdv WHERE id_docteur=? and rdv=?');
		$rdv_pris->execute(array($id1,$rdv));
		$rdvRows=$rdv_pris->rowCount();
		if($rdvRows >0){
		echo 'RDV deja pris';
			exit();
		}
        else{
    
    
$pass11=substr(sha1(uniqid().rand(0,1000000)),0,8);
    
    
    
    
    $req = $bdd->prepare('INSERT INTO rdv (id_docteur, nom, prenom, numero_de_tel, mot_de_passe, date_de_naissance, rdv ,date_prise_rdv)
VALUES(:id_docteur,:nom, :prenom, :numero_de_tel,  :mot_de_passe,:date_de_naissance, :rdv, now())');
$req->execute(array(
   
    'id_docteur'=>$id1,
    'nom'=>$nom1,
    'prenom'=> $prenom1,
    'date_de_naissance'=> $date_de_naissance1, 
    'numero_de_tel'=> $numero_de_tel1, 
   

    'mot_de_passe'=> $pass11,
    'rdv'=> $rdv,
));
     
    
echo $rdv;
    }
        }
	exit();


































?>