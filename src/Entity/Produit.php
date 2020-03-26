<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
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
     * @ORM\Column(type="string", length=255)
     */
    private $referance;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Emplacement", inversedBy="produit", cascade={"persist", "remove"})
     */
    private $emplacement;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bcommande", mappedBy="produit")
     */
    private $bcommandes;

    public function __construct()
    {
        $this->bcommandes = new ArrayCollection();
    }

    public function __tostring(){
        return $this->nom;
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

    public function getReferance(): ?string
    {
        return $this->referance;
    }

    public function setReferance(string $referance): self
    {
        $this->referance = $referance;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getEmplacement(): ?emplacement
    {
        return $this->emplacement;
    }

    public function setEmplacement(?emplacement $emplacement): self
    {
        $this->emplacement = $emplacement;

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
            $bcommande->setProduit($this);
        }

        return $this;
    }

    public function removeBcommande(Bcommande $bcommande): self
    {
        if ($this->bcommandes->contains($bcommande)) {
            $this->bcommandes->removeElement($bcommande);
            // set the owning side to null (unless already changed)
            if ($bcommande->getProduit() === $this) {
                $bcommande->setProduit(null);
            }
        }

        return $this;
    }
}
