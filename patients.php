

 
 <section class="page-section " >
    <div class="text-center">
          <h2>Vous désiriez voir la liste de vos patients?! </h2>
       <p>Selectionnez la date souhaitée et accédez à la liste </p>
       

   </div>
     
</section>
 
  <div class="container">
       <div class="row">
        <form action="pdf_docteur.php" class="center" method="post">

<div class="col-sm-6">
			<select style="display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);" name="date_des_rdv" id="date_des_rdv" class="">
						<option value="">--Choisissez une date--</option>
						



	<?php
require "includes/connect_bd.php"; 

for($i=0;$i<15;$i++)
	{ 
setlocale(LC_TIME, 'fr_FR.utf8','fra');
$demain=mktime(0,0,0,date("m"), date("d")+$i, date("Y"));
	$jour_demain=strftime("%A-%Y-%m-%d",$demain);
    ?>
    
    <option  value="<?php echo $jour_demain=strftime("%Y-%m-%d",$demain);?>" > <?php echo ''.$jour_demain=strftime("%A %d %b %Y",$demain);?></option>
        
    <?php
         }

?>
</select>
</div> 
<div class="col-sm-5">

<button value="ok" class="btn col-sm-2  btn-success " name="envoyer">OK</button>
</div>
</form>
</div>
</div>












