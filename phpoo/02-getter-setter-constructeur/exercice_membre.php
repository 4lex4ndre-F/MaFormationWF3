<?php
//02-getter-setter-constructeur/exercie_membre.php_ini_loaded_file

// Consignes : au regard de la classe ci-dessous, créez un membre, affecter lui un pseudo et un email et afficher les informations :


class Membre{
    private $pseudo;
    private $email;

    // pour manipuller le pseudo
    public function getPseudo(){
        return $this -> pseudo;
    }
    public function setPseudo($pseudo){
        if(is_string($pseudo) ){
            $this -> pseudo = $pseudo;
        }
        else{
            return false;
        }
    }

    // pour manipuler l'email
    public function getEmail(){
        return $this -> email;
    }
    public function setEmail($email){
        if(is_string($email)){
            $this -> email = $email;
        }
        else{
            return false;
        }
    }
}

// création objet
$membre = new Membre;
$membre -> setPseudo('Alex');
$membre -> setEmail('mail@mail.fr');

echo 'Pseudo: ' . $membre -> getPseudo() . '<br />Email: ' . $membre -> getEmail();