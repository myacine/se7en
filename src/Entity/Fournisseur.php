<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FournisseurRepository")
 */
class Fournisseur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $abveviation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ai;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mailaa;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mailcc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mailcci;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bcommande", mappedBy="fournisseur")
     */
    private $bcommandes;

    public function __construct()
    {
        $this->bcommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAbveviation(): ?string
    {
        return $this->abveviation;
    }

    public function setAbveviation(string $abveviation): self
    {
        $this->abveviation = $abveviation;

        return $this;
    }

    public function getRc(): ?string
    {
        return $this->rc;
    }

    public function setRc(?string $rc): self
    {
        $this->rc = $rc;

        return $this;
    }

    public function getAi(): ?string
    {
        return $this->ai;
    }

    public function setAi(?string $ai): self
    {
        $this->ai = $ai;

        return $this;
    }

    public function getNis(): ?string
    {
        return $this->nis;
    }

    public function setNis(?string $nis): self
    {
        $this->nis = $nis;

        return $this;
    }

    public function getNif(): ?string
    {
        return $this->nif;
    }

    public function setNif(?string $nif): self
    {
        $this->nif = $nif;

        return $this;
    }

    public function getMailaa(): ?string
    {
        return $this->mailaa;
    }

    public function setMailaa(string $mailaa): self
    {
        $this->mailaa = $mailaa;

        return $this;
    }

    public function getMailcc(): ?string
    {
        return $this->mailcc;
    }

    public function setMailcc(string $mailcc): self
    {
        $this->mailcc = $mailcc;

        return $this;
    }

    public function getMailcci(): ?string
    {
        return $this->mailcci;
    }

    public function setMailcci(string $mailcci): self
    {
        $this->mailcci = $mailcci;

        return $this;
    }

    /**
     * @return Collection|Bcommande[]
     */
    public function getBcommandes(): Collection
    {
        return $this->bcommandes;
    }

    public function addBcommande(Bcommande $bcommande): self
    {
        if (!$this->bcommandes->contains($bcommande)) {
            $this->bcommandes[] = $bcommande;
            $bcommande->setFournisseur($this);
        }

        return $this;
    }

    public function removeBcommande(Bcommande $bcommande): self
    {
        if ($this->bcommandes->contains($bcommande)) {
            $this->bcommandes->removeElement($bcommande);
            // set the owning side to null (unless already changed)
            if ($bcommande->getFournisseur() === $this) {
                $bcommande->setFournisseur(null);
            }
        }

        return $this;
    }
}
