<?php 
include("inc/header.inc.php");
?>

    <div class="container">

      <div class="starter-template">
        <h1>Exercice 1.1</h1>
      </div>
	  <div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<form method="post" action="">
				<div class="form-group">
					<label for="nom">Nom</label>
					<input type="text" name="nom" id="nom" class="form-control" />
				</div>
				<div class="form-group">
					<label for="prenom">Prénom</label>
					<input type="text" name="prenom" id="prenom" class="form-control" />
				</div>
				<div class="form-group">
					<label for="adresse">Adresse</label>
					<input type="text" name="adresse" id="adresse" class="form-control" />
				</div>
				<div class="form-group">
					<label for="ville">Ville</label>
					<input type="text" name="ville" id="ville" class="form-control" />
				</div>
				<div class="form-group">
					<label for="cp">Code postal</label>
					<input type="text" name="cp" id="cp" class="form-control" />
				</div>
				<div class="form-group">
					<label for="sexe">Sexe</label>
					<select name="sexe" id="sexe" class="form-control" >
						<option>Homme</option>
						<option>Femme</option>
					</select>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" id="description" class="form-control" ></textarea>
				</div>
				<div class="form-group">
					<button class="form-control btn btn-info" type="submit" ><span class="glyphicon glyphicon-user"></span> Envoi</button>
				</div>
			</form>
		</div>
	  </div>
	  

    </div><!-- /.container -->
<?php 
include("inc/footer.inc.php");
?>