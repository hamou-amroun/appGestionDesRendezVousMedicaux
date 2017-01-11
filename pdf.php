<?php
  

    if(isset($_GET['id']) && (!empty($_GET['id']))){
        
 
        
        
         $id=htmlspecialchars($_GET['id']);  
    
         if (!(is_numeric($id))){
            
            echo'Changer pas le code source';
        
    }
   

       else{





require "includes/connect_bd.php";

		  $reponse = $bdd->prepare('SELECT * FROM docteur WHERE id=:id');
          $reponse->execute(array('id'=>$id));





while($donnee=$reponse->fetch()){

	$nom=strtoupper($donnee['nom']);
	$prenom=strtoupper($donnee['prenom']);
	$specialite=strtoupper($donnee['specialite']);
	$num_de_tel=$donnee['num_de_tel'];
	$commune=$donnee['commune'];
	$wilaya=$donnee['wilaya'];
  

}
           
        $reponse1 = $bdd->prepare('SELECT * FROM rdv WHERE id_docteur=:idd ORDER BY id DESC LIMIT 0, 1');
          $reponse1->execute(array('idd'=>$id));

while($donnee1=$reponse1->fetch()){

	$nomm=strtoupper($donnee1['nom']);
	$prenomm=strtoupper($donnee1['prenom']);
	$date_de_naissancee=($donnee1['date_de_naissance']);
	$num_de_tell=$donnee1['numero_de_tel'];
	$mot_de_passee=$donnee1['mot_de_passe'];
	$rdvv=$donnee1['rdv'];

  

}

  setlocale(LC_TIME, 'fr_FR.utf8','fra');

          

require_once('fpdf181/fpdf.php');

class PDF extends FPDF
{
// En-tête
function Header()
{
	// Logo
	$this->Image('images\logo.png',10,6,50);
	// Police Arial gras 15
	$this->SetFont('Arial','',15);
    
    $this->Cell(150);
    $this->Cell(30,10,'www.rdvdoc.dz',0,0,'C');
     $this->Ln(15);
    $this->Cell(76);
	// Titre
	$this->Cell(30,10,'Votre Rendez-vous MEDICAL',0,0,'C');
    $this->Ln(20);
}


    
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();



$longueur = $pdf->GetStringWidth("Une CELLULE dimensionnée au texte!");
















	





$pdf->SetFont("Helvetica","",12);
$pdf->Cell(10,10,"NOM : ");
$pdf->cell(7);
$pdf->SetFont("times","IB",12);
$pdf->cell(25,10,$nomm);
           
$pdf->cell(62);
$pdf->SetFont("Helvetica","",12);
$pdf->Cell(25,10,"Date de naissance : ");
$pdf->cell(17);
$pdf->SetFont("times","IB",12);
$pdf->cell(30,10,$date_de_naissancee);

           
           

           
          
           
           
$pdf->ln();



$pdf->SetFont("Helvetica","",12);
$pdf->Cell(25,10,"PRENOM : ");
	
$pdf->SetFont("times","IB",12);
$pdf->cell(25,10,$prenomm);

    
$pdf->cell(53);
 $pdf->SetFont("Helvetica","",12);
$pdf->Cell(10,10,"Votre numero de tel : ");
$pdf->cell(32);
$pdf->SetFont("times","IB",12);
$pdf->cell(25,10,$num_de_tell);
$pdf->ln(40);


$pdf->SetFont("Helvetica","",12);
$pdf->Cell(25,10,"Votre Rendez-vous chez le  ");
$pdf->cell(28);
$pdf->SetFont("times","IB",12);
$pdf->cell(25,10,$specialite."  Dr. ".$nom." ".$prenom);  

 
$pdf->ln();
$pdf->SetFont("Helvetica","",12);
$pdf->Cell(25,10,"aura lieu le :");

            
$pdf->SetFont("Helvetica","",12);
$pdf->Cell(25,10,strftime("%A %d %B %Y  a %HH%M",strtotime($rdvv)) );
 $pdf->ln();
$pdf->SetFont("Helvetica","",12);
$pdf->Cell(25,10,"Veuillez vous presenter a son cabinet qui se situe a ".$commune." ".$wilaya);       
$pdf->ln(40);
 $pdf->SetFont("Helvetica","",12);
$pdf->Cell(25,10,"Veuillez apporter au rendez-vous votre presente convocation OU votre piece d'identite");       $pdf->ln(40);
 $pdf->SetFont("Helvetica","IBU",12);
           // --- Cell(Largeur, Hauteur, Texte, [Bords, RC , Alignement, Remplissage, Lien])
$pdf->Cell(25,10,"NB:");
             $pdf->ln();
 $pdf->SetFont("Helvetica","",12);
$pdf->Cell(25,10,"Vous pouvez annuler ce rendez-vous seulement 24h avant la date prevue ");
            $pdf->SetFont("Helvetica","",12);
                $pdf->ln();
$pdf->Cell(25,10,"Ce Mot de passe vous servira a annuler votre rendez-vous:  ".$mot_de_passee.""); 
$pdf->Output();
       }}
?>
























