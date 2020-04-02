<?php
namespace App\Model;

class Member {

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $mdp;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var int
     */
    private $cp;

    /**
     * @var string
     */
    private $ville;

    /**
     * @var string
     */
    private $dateEmbauche;

    public function getID (): ?string {
        return $this->id;
    }

    public function getNom (): ?string {
        return htmlspecialchars($this->nom);
    }

    public function getPrenom (): ?string {
        return htmlspecialchars($this->prenom);
    }

    public function getLogin (): ?string {
        return htmlspecialchars($this->login);
    }

    public function getMdp (): ?string {
        return htmlspecialchars($this->mdp);
    }

    public function getAdresse (): ?string {
        return htmlspecialchars($this->adresse);
    }

    public function getCp (): ?int {
        return htmlspecialchars($this->cp);
    }

    public function getVille (): ?string {
        return htmlspecialchars($this->ville);
    }

    public function getDateEmbauche (): ?string {
        return htmlspecialchars($this->dateEmbauche);
    }

}