<?php 
include("inc/header.inc.php");
?>

    <div class="container">

      <div class="starter-template">
        <h1>Exercice 4</h1>
      </div>
	  <div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<h4>Calculatrice</h4>
			<form method="post" action="">
				<div class="form-group">
					<label for="val1">1ère valeur</label>
					<input type="text" name="val1" id="val1" class="form-control" />
				</div>
				<div class="form-group">
					<label for="operateur">Opérateur</label>
					<select name="operateur" id="operateur" class="form-control" >
						<option>+</option>
						<option>-</option>
						<option>*</option>
						<option>/</option>
					</select>
				</div>
				<div class="form-group">
					<label for="val2">2ème valeur</label>
					<input type="text" name="val2" id="val2" class="form-control" />
				</div>
				<div class="form-group">
					<button class="form-control btn btn-info" type="submit" ><span class="glyphicon glyphicon-th"></span> Calculer</button>
				</div>
			</form>
		</div>
	  </div>
	  

    </div><!-- /.container -->
<?php 
include("inc/footer.inc.php");
?>