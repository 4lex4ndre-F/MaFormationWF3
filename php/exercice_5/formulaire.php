<?php
// APPEL DE INIT.INC.PHP
require("inc/init.inc.php");


// code php spécifique à la page

// CONTROLES DES SAISIES DU FORMULAIRE

// déclaration de variables de récupération des valeurs saisies
$nom = "";
$prenom = "";
$tel = "";
$profession = "";
$ville = "";
$cp = "";
$adresse = "";
$date_naissance = "";
$sexe = "";
$description = "";

// ISSET
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel']) && isset($_POST['profession']) && isset($_POST['ville']) && isset($_POST['cp']) && isset($_POST['adresse']) && isset($_POST['date_naissance']) && isset($_POST['sexe']) && isset($_POST['description']))
{
    // déclaration de variables de récupération des valeurs saisies
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $profession = $_POST['profession'];
    $ville = $_POST['ville'];
    $cp = $_POST['cp'];
    $adresse = $_POST['adresse'];
    $date_naissance = $_POST['date_naissance'];
    $sexe = $_POST['sexe'];
    $description = $_POST['description'];

    $message .= '<div class="alert alert-success" role="alert">OK, nous sommes rentré dans la condition isset()</div>';


    /*************************************************************************************
                            CONTROLE DU REMPLISSAGE DES CHAMPS
    *************************************************************************************/

    // CONTROLES SUR LE NOM
    // controle sur le nom (obligatoire)
    if(empty($nom))
    {
        $message .= '<div class="alert alert-warning" role="alert">Le champ "nom" est obligatoire.</div>';
        $erreur = true;
    }
    // controle sur le nom. Caractères autorisés: a-z, A-Z, 0-9, _ - .
    $verif_caracteres = preg_match('#^[a-zA-Z0-9._-ôêéàè]+$#', $nom);
    if(!$verif_caracteres && !empty($nom))
    {
        $message .= '<div class="alert alert-warning" role="alert">Il y a des caractères non autorisés dans le nom.<br />Caractères autorisés: a-z, A-Z, 0-9, _ - ., ôêéàè</div>';
        $erreur = true;
    }

    // CONTROLES SUR LE PRENOM
    // controle sur le prenom (obligatoire)
    if(empty($prenom))
    {
        $message .= '<div class="alert alert-warning" role="alert">Le champ "prenom" est obligatoire.</div>';
        $erreur = true;
    }
    // controle sur le prenom. Caractères autorisés: a-z, A-Z, 0-9, _ - .,ôêéàè
    $verif_caracteres = preg_match('#^[a-zA-Z0-9._-ôêéàè]+$#', $prenom);
    if(!$verif_caracteres && !empty($prenom))
    {
        $message .= '<div class="alert alert-warning" role="alert">Il y a des caractères non autorisés dans le prénom.<br />Caractères autorisés: a-z, A-Z, 0-9, _ - .ôêéàè</div>';
        $erreur = true;
    }

    // CONTROLES SUR LE NUMERO DE TELEPHONE
    // controle sur le tel
    if(empty($tel))
    {
        $message .= '<div class="alert alert-warning" role="alert">Le champ "téléphone" est obligatoire.</div>';
        $erreur = true;
    }
    if(!is_numeric($tel) && !empty($tel))
    {
        $message .= '<div class="alert alert-warning" role="alert">Le champ "téléphone" ne doit contenir que des chiffres.</div>';
        $erreur = true;
    }

    // CONTROLE SUR LA PROFESSION
    // controle sur la profession. Caractères autorisés: a-z, A-Z, 0-9, _ - ., ôêéàè
    $verif_caracteres = preg_match('#^[a-zA-Z0-9._-ôêéàè]+$#',$profession);
    if(!$verif_caracteres && !empty($profession))
    {
        $message .= '<div class="alert alert-warning" role="alert">Il y a des caractères non autorisés dans le champ "profession".<br />Caractères autorisés: a-z, A-Z, 0-9, _ - ., ôêéàè</div>';
        $erreur = true;
    }

    // CONTROLE SUR LA VILLE
    // controle sur la ville. Caractères autorisés: a-z, A-Z, 0-9, _ - ., ôêéàè
    $verif_caracteres = preg_match('#^[a-zA-Z0-9._-ôêéàè]+$#',$ville);
    if(!$verif_caracteres && !empty($ville))
    {
        $message .= '<div class="alert alert-warning" role="alert">Il y a des caractères non autorisés dans le champ "ville".<br />Caractères autorisés: a-z, A-Z, 0-9, _ - ., ôêéàè</div>';
        $erreur = true;
    }

    // CONTROLE SUR LE CODE POSTAL
    if(!is_numeric($cp) && !empty($cp))
    {
        $message .= '<div class="alert alert-warning" role="alert">Le champ "code postal" ne doit contenir que des chiffres.</div>';
        $erreur = true;
    }

    // CONTROLE SUR L'ADRESSE
    // controle sur l'adresse. Caractères autorisés: a-z, A-Z, 0-9, _ - ., ôêéàè
    $verif_caracteres = preg_match('#^[a-zA-Z0-9 ._-ôêéàè]+$#',$adresse);
    if(!$verif_caracteres && !empty($adresse))
    {
        $message .= '<div class="alert alert-warning" role="alert">Il y a des caractères non autorisés dans le champ "adresse".<br />Caractères autorisés: a-z, A-Z, 0-9, _ - ., ôêéàè</div>';
        $erreur = true;
    }

    // CONTROLES SUR LA DATE DE NAISSANCE
    // /!\ un peu compliqué, je passe pour l'instant...l'input est de type DATE

    // CONTROLE SUR LE SEXE
    if(!empty($sexe) && $sexe != 'm' && $sexe != 'f')
    {
        $message .= '<div class="alert alert-warning" role="alert">ALERTE. Vous jouez avec le code.</div>';
        $erreur = true;
    }

    // CONTROLE SUR LA DESCRIPTION /!\ je n'arrive pas à integrer la "," dans le preg_match()
    $verif_caracteres = preg_match('#^[a-zA-Z0-9 ._-ôêéàè]+$#',$description);
    if(!$verif_caracteres && !empty($description))
    {
        $message .= '<div class="alert alert-warning" role="alert">Il y a des caractères non autorisés dans le champ "description".<br />Caractères autorisés: a-z, A-Z, 0-9 _ - . ôêéàè</div>';
        $erreur = true;
    }

    /*************************************************************************************
                           FIN CONTROLE DU REMPLISSAGE DES CHAMPS
    *************************************************************************************/

    /*************************************************************************************
                        INSERTION DES ENTREES DU FORMULAIRE DANS LA BDD
    *************************************************************************************/

    if($erreur != true)
    {
        $message .= '<div class="alert alert-success" role="alert">Il n\'y a pas d\'erreurs dans le remplissage du formulaire</div>';

        // /!\ il faut convertir la date de naissance en format YYYY/dd/mm
        $date = str_replace('/', '-', $date_naissance);
        $date_anniv = date('Y-m-d', strtotime($date));

        $req = $pdo->prepare("INSERT INTO annuaire (nom, prenom, telephone, profession, ville, code_postal, adresse, date_de_naissance, sexe, description) VALUES (:nom, :prenom, :tel, :profession, :ville, :cp, :adresse, :date_naissance, :sexe, :description)");
        $req->bindParam(':nom', $nom, PDO::PARAM_STR);
        $req->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindParam(':tel', $tel, PDO::PARAM_STR);
        $req->bindParam(':profession', $profession, PDO::PARAM_STR);
        $req->bindParam(':ville', $ville, PDO::PARAM_STR);
        $req->bindParam(':cp', $cp, PDO::PARAM_STR);
        $req->bindParam(':adresse', $adresse, PDO::PARAM_STR);
        $req->bindParam(':date_naissance', $date_anniv, PDO::PARAM_STR);
        $req->bindParam(':sexe', $sexe, PDO::PARAM_STR);
        $req->bindParam(':description', $description, PDO::PARAM_STR);
        $req->execute();
    }


    /*************************************************************************************
                    FIN DE L'INSERTION DES ENTREES DU FORMULAIRE DANS LA BDD
    *************************************************************************************/

} // fin isset()





// Affichage sur la page
require("inc/header.inc.php");
require("inc/nav.inc.php");
echo '<pre>'; print_r($_POST); echo'</pre>';
?>

<div class="container">
    <div class="col-sm-6 col-sm-offset-3">

        <div class="starter-template">
            <h1><span class="glyphicon glyphicon-user"></span> Formulaire</h1>
            <h2>Ajouter une entrée</h2>
            <div><?= $message ?></div>
        </div><!-- /.starter-template -->

        <form action="" method="post">

            <div class="form-group">
                <label for="nom">Nom <span class="glyphicon glyphicon-asterisk"></span></label>
                <input type="text" name="nom" id="nom" class="form-control" >
            </div>

            <div class="form-group">
                <label for="prenom">Prénom <span class="glyphicon glyphicon-asterisk"></span></label>
                <input type="text" name="prenom" id="prenom" class="form-control" >
            </div>

            <div class="form-group">
                <label for="tel">Téléphone <span class="glyphicon glyphicon-asterisk"></span></label>
                <input type="text" name="tel" id="tel" class="form-control" >
            </div>

            <div class="form-group">
                <label for="profession">Profession</label>
                <input type="text" name="profession" id="profession" class="form-control" >
            </div>

            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" name="ville" id="ville" class="form-control" >
            </div>

            <div class="form-group">
                <label for="cp">Code Postal</label>
                <input type="text" name="cp" id="cp" class="form-control" >
            </div>

            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" class="form-control" >
            </div>

            <div class="form-group">
                <label for="date_naissance">Date de naissance (jj/mm/aaaa)</label>
                <input type="date" name="date_naissance" id="date_naissance" class="form-control" >
            </div>

            <div class="radio">
                <label>
                    <input type="radio" name="sexe" id="sexe" value="m" checked>
                    Homme
                </label>
            </div>

            <div class="radio">
                <label>
                    <input type="radio" name="sexe" id="sexe" value="f" cheked>
                    Femme
                </label>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="" rows="5"></textarea>
            </div>

              <div class="form-group">
                <input type="submit" class="form-control btn btn-primary" name="valider" id="valider" value="Valider" />
              </div>

        </form>
    
    </div><!-- /.col-sm-6 col-sm-offset-3 -->
</div><!-- /.container -->




<?php
require("inc/footer.inc.php");