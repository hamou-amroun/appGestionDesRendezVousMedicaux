<?php
session_start();






    





$id=$_SESSION['id_docteur_connecter'];

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
	$this->Cell(30,10,'Liste des Patients',0,0,'C');

    $this->Ln(20);
}


    
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();















	





$pdf->SetFont("Helvetica","B",12);
$pdf->Cell(10,10,"Dr.  ".$nom."  ".$prenom."  (".$specialite. ")");
$pdf->ln();
$pdf->SetFont("Helvetica","",12);
setlocale(LC_TIME, 'fr_FR.utf8','fra');

$pdf->Cell(25,10,"La liste des RDV du".strftime(" %A %d %B %Y",strtotime($_POST['date_des_rdv'])));

$pdf->ln(30);

$pdf->cell(5);
 $pdf->SetFont("Helvetica","B",10);
$pdf->Cell(10,10,"NOM");
$pdf->cell(25);
 $pdf->SetFont("Helvetica","B",10);
$pdf->Cell(10,10,"prenom");
$pdf->cell(35);
 $pdf->SetFont("Helvetica","B",10);
$pdf->Cell(10,10,"Tel");
$pdf->cell(45);
 $pdf->SetFont("Helvetica","B",10);
$pdf->Cell(10,10," RDV");
$pdf->ln();
     setlocale(LC_TIME, 'fr_FR.utf8','fra');   
  $jsk=$_POST['date_des_rdv'].' 00:00:00';
$usma=$_POST['date_des_rdv'].' 23:59:59';




    require "includes/connect_bd.php";
    		 $reponse1 = $bdd->prepare("SELECT * FROM rdv WHERE id_docteur=:id AND rdv BETWEEN :jsk AND :usma");
     $reponse1->execute(array('jsk'=>$jsk,'usma'=>$usma,'id'=>$id));

		$numRows=$reponse1->rowCount();
		if($numRows ==0){
            $pdf->ln(15);
           $pdf->cell(5);
            $pdf->SetTextColor(220,50,50);
 $pdf->SetFont("Helvetica","BI",15);
             setlocale(LC_TIME, 'fr_FR.utf8','fra');
$pdf->Cell(10,10,"Aucun Rendez-vous pour le ".strftime(" %A %d %B %Y",strtotime($_POST['date_des_rdv']))); 
            
        }
else{


while($donnee1=$reponse1->fetch()){
$nom_p=$donnee1['nom'];	
$prenom_p=$donnee1['prenom'];	
$num_p=$donnee1['numero_de_tel'];	
$rdv_p=$donnee1['rdv'];



$pdf->cell(5);
 $pdf->SetFont("Helvetica","I",10);
$pdf->Cell(10,10,$nom_p);
$pdf->cell(25);
 $pdf->SetFont("Helvetica","I",10);
$pdf->Cell(10,10,$prenom_p);
$pdf->cell(35);
 $pdf->SetFont("Helvetica","I",10);
$pdf->Cell(10,10,$num_p);
$pdf->cell(45);
 $pdf->SetFont("Helvetica","I",10);
$pdf->Cell(10,10,strftime("%H H %M",strtotime($rdv_p)));
    $pdf->ln();
}
    }


           
           



$pdf->Output();
      
?>
























