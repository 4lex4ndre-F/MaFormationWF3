<?php
//05-heritage/exemple_heritage.php

class Membre
{
    public $id_membre;
    public $pseudo;
    public $email;

    public function seConnecter(){
        return 'Je me connecte !';
    }

    public function inscription(){
        return 'Je m\'inscris !';
    }
}
//--------------------------------------------
class Admin extends Membre // La class admin hérite de la classe Membre.
{
    // C'est comme si tout le code de Membre était présent ici!

    public function accesBackOffice(){
        return 'J\'ai acccès au BO !';
    }    
}
//----------------------------------------------
$admin = new Admin;
echo $admin -> seConnecter() . '<br />';
echo $admin -> inscription() . '<br />';
echo $admin -> accesBackOffice() . '<br />';

/*
Commentaires:
    Dans notre site, un admin c'est avant tout un membre avec une fonctionnalité supplémentaire : L'accès au BackOffice.
    Il est donc naturel que la classe Admin extends la classe Membre et qu'on ne ré-écrive pas tout le code deux fois !
*/