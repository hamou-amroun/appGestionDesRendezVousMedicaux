



<link rel="stylesheet" href="css/bootstrap-3.3.6-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/fileinput.min.css">
<section class="page-section">

<form action="testertester.php" method="post" enctype="multipart/form-data" >
<!-- début de l'interface -->
<div class="form-group">
	<input 	type='file'class='input-ghost' name='monfichier' style='visibility:hidden; height:0'
			onchange="$(this).next().find('input').val(($(this).val()).split('\\').pop());">
	<div class="input-group input-file" name="monfichier">
		<span class="input-group-btn">
			<button 	class="btn btn-default btn-choose"
						type="button"
						onclick="$(this).parents('.input-file').prev().click();">Choisir</button>
		</span>
		<input 	type="text" name="monfichier" class="form-control" placeholder='Choisissez un fichier...'style="cursor:pointer"
				onclick="$(this).parents('.input-file').prev().click(); return false;"
		/>


	
	</div>
</div>
<input type="submit" value="Envoyer le fichier" />
 </form>   
</section>

<form action="testertester.php" method="post" enctype="multipart/form-data" >
<div class="row">
	<input 	type='file'class='input-ghost' name='monfichier' style='visibility:hidden; height:0'
			onchange="$(this).next().find('input').val(($(this).val()).split('\\').pop());">    
  <h2 style="font-size:16px">Photo de Profil</h2>
	<div class="input-group input-file" name="monfichier">
	<div class="row">
	<div  class="col-sm-12">
		<img  src="images/photo-2.jpg" width="300"   name="monfichier"  title='Cliquez pour choisir une photo...'style="cursor:pointer"
				onclick="$(this).parents('.input-file').prev().click(); return false;"
		/></div>
		</div>
		<div class="row">
		<div class="col-sm-12">
	 <div class="col-sm-8">	
<input  	type="text" name="monfichier" class="" placeholder='cliquez pour Choisir une photo...'style="cursor:pointer;width: 253.63636px;"
				onclick="$(this).parents('.input-file').prev().click(); return false;"
		/>
            </div>
       <div class="col-sm-4"><button  class="btn btn-success btn-block" value="Envoyer le fichier" >Ajouter</button></div>
        </div>
</div>

</div>  
    
    
    
    
</div>
    
    
  
    
    </form>   
<script src="js/jquery-2.2.0.min.js"></script>

<script src="css/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>