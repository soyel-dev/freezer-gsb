<?php
namespace App\Model;

class Fees {

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $quantite;

    /**
     * @var string
     */
    private $idFraisForfait;

    /**
     * @var string
     */
    private $idFraisForfaitFormatted;

    /**
     * @var string
     */
    private $idFF;

    public function getID (): ?int {
        return $this->id;
    }

    public function getQuantite (): ?string {
        return htmlspecialchars($this->quantite);
    }

    public function getIdFraisForfait (): ?string {
        return htmlspecialchars($this->idFraisForfait);
    }

    public function getIdFraisForfaitFormatted (): ?string {
        if($this->idFraisForfait == "ETP") {
            return("Forfait étape");
        }
        if($this->idFraisForfait == "KM") {
            return("Frais kilométrique");
        }
        if($this->idFraisForfait == "NUI") {
            return("Nuitée hôtel");
        }
        if($this->idFraisForfait == "REP") {
            return("Restauration");
        }
    }

    public function getIdFrais (): ?string {
        return htmlspecialchars($this->idFF);
    }

}