<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AbonnementRepository")
 */
class Abonnement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAb;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $numabonnement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Compteur", mappedBy="abonnement", cascade={"persist", "remove"})
     */
    private $compteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAb(): ?\DateTimeInterface
    {
        return $this->dateAb;
    }

    public function setDateAb(\DateTimeInterface $dateAb): self
    {
        $this->dateAb = $dateAb;

        return $this;
    }

    public function getNumabonnement(): ?string
    {
        return $this->numabonnement;
    }

    public function setNumabonnement(string $numabonnement): self
    {
        $this->numabonnement = $numabonnement;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCompteur(): ?Compteur
    {
        return $this->compteur;
    }

    public function setCompteur(?Compteur $compteur): self
    {
        $this->compteur = $compteur;

        // set (or unset) the owning side of the relation if necessary
        $newAbonnement = $compteur === null ? null : $this;
        if ($newAbonnement !== $compteur->getAbonnement()) {
            $compteur->setAbonnement($newAbonnement);
        }

        return $this;
    }
}
