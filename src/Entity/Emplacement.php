<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmplacementRepository")
 */
class Emplacement
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
    private $reference;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codebarres;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Produit", mappedBy="emplacement", cascade={"persist", "remove"})
     */
    private $produit;
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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getCodebarres(): ?string
    {
        return $this->codebarres;
    }

    public function setCodebarres(string $codebarres): self
    {
        $this->codebarres = $codebarres;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        // set (or unset) the owning side of the relation if necessary
        $newEmplacement = null === $produit ? null : $this;
        if ($produit->getEmplacement() !== $newEmplacement) {
            $produit->setEmplacement($newEmplacement);
        }

        return $this;
    }
}
