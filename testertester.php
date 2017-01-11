<?php
session_start();
/* traitement de l'image de profil*/
         	require "includes/connect_bd.php";

       $req2 = $bdd->prepare('SELECT * FROM docteur WHERE id=:id');
       $req2->execute(array('id'=>$_SESSION['id_docteur_connecter']));


      while($donnee=$req2->fetch()){
	$id=$donnee['id'];
   

  }
$id=substr(sha1(md5($id)),0,8);
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['monfichier']['size'] <= 2000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif','PNG', 'png');

        $file = ''.$id.'.jpg';
 
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . $file);
                        echo "<font color='green'>L'envoi de votre image bien été effectué !</font><br />";
                           	$req = $bdd->prepare('UPDATE docteur SET photo=:photo WHERE id=:id');
$req->execute(array( 'photo'=>$id, 'id'=>$_SESSION['id_docteur_connecter'] ));
 
                }else{
                     
                        echo "<font color='red'>L'extension du fichier n'est pas autorisée. <br /></font>";
                        echo "<font color='red'>(Seuls les fichiers jpg, jpeg, gif, png sont acceptés.)</font> ";
                     
                     }
        }else
        {
            echo "<font color='red'>Le fichier est trop volumineux.</font> <br />";
            echo "<font color='red'>(Poids limité à 4Mo)</font>";
        }
}else
{
    echo "<font color='red'>Veuillez selectionner un fichier.</font>"; 
}
?>