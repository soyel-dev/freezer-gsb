<?php
namespace App\Model;

class Card {

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $mois;

    /**
     * @var string
     */
    private $dateModif;

    /**
     * @var string
     */
    private $idVisiteur;

    /**
     * @var string
     */
    private $etat;

    public function getID (): ?string {
        return htmlspecialchars($this->id);
    }

    public function getMois (): ?string {
        return htmlspecialchars($this->mois);
    }

    public function getDateModif (): ?string {
        return htmlspecialchars($this->dateModif);
    }

    public function getIdVisiteur (): ?string {
        return htmlspecialchars($this->idVisiteur);
    }

    public function getEtat (): ?string {
        return htmlspecialchars($this->etat);
    }

    public function getEtatFormatted (): ?string {
        if($this->etat == "CR") {
            return htmlspecialchars("Crée");
        } else {
            return htmlspecialchars("État non défini");
        }
    }

}