<?php
//03-manpulation-type-argument/exercice_3.php

class Vehicule
{
    private $litreEssence; // 5 contenu à instant T
    private $reservoir; // 50 capacité max du réservoir

    public function getLitreEssence(){
        return $this -> litreEssence;
    }

    public function setLitreEssence($litre){
        $this -> litreEssence = $litre;
    }

    public function getReservoir(){
        return $this -> reservoir;
    }

    public function setReservoir($litre){
        $this -> reservoir = $litre; 
   }
}


class Pompe
{
    private $litreEssence;

    public function getLitreEssence(){
        return $this -> litreEssence;
    }

    public function setLitreEssence($litre){
        $this -> litreEssence = $litre;
    }

    // Fonction pour la consigne 8...
    public function faireLePlein(Vehicule $v){ // on manipule un autre objet !
        // j'aurais pu stocker le volume manquant dans une variable
        $this -> setLitreEssence(($this -> getLitreEssence()) - ($v -> getReservoir() - $v -> getLitreEssence()));

        // mettre à jour le nouveau volume dans véhicule
        $v -> setLitreEssence($v -> getLitreEssence() + ($v -> getReservoir() - $v -> getLitreEssence()));
    }
}


$vehicule = new Vehicule;
$vehicule -> setLitreEssence(5);
$vehicule -> setReservoir(50);
echo 'essence dans le véhicule: ' . $vehicule -> getLitreEssence() . ' L<br />';
echo 'il manque ' . ($vehicule -> getReservoir() - $vehicule -> getLitreEssence()) . ' L dans le véhicule<br />';

$pompe = new Pompe;
$pompe -> setLitreEssence(800);
echo 'essence dans la pompe: ' . $pompe -> getLitreEssence() . ' L<br />';

// ----- On fait le plein
$pompe -> faireLePlein($vehicule);
echo 'essence dans la pompe après le plein: ' . $pompe -> getLitreEssence() . ' L<br />';

echo 'essence dans le véhicule après le plein: ' . $vehicule -> getLitreEssence() . ' L<br />';


// -- on roule...
$vehicule -> setLitreEssence(7);
$vehicule -> setReservoir(50);
echo '<hr />essence dans le véhicule: ' . $vehicule -> getLitreEssence() . ' L<br />';
echo 'il manque ' . ($vehicule -> getReservoir() - $vehicule -> getLitreEssence()) . ' L dans le véhicule<br />';

// ----- On fait le plein
$pompe -> faireLePlein($vehicule);
echo 'essence dans la pompe après le plein: ' . $pompe -> getLitreEssence() . ' L<br />';

echo 'essence dans le véhicule après le plein: ' . $vehicule -> getLitreEssence() . ' L<br />';
