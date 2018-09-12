<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReglementRepository")
 */
class Reglement
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
    private $datereg;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Reglement", mappedBy="facturation", cascade={"persist", "remove"})
     */
    private $reglement;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Facturation", inversedBy="reglement", cascade={"persist", "remove"})
     */
    private $facturation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatereg(): ?\DateTimeInterface
    {
        return $this->datereg;
    }

    public function setDatereg(\DateTimeInterface $datereg): self
    {
        $this->datereg = $datereg;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getReglement(): ?self
    {
        return $this->reglement;
    }

    public function setReglement(?self $reglement): self
    {
        $this->reglement = $reglement;

        // set (or unset) the owning side of the relation if necessary
        $newFacturation = $reglement === null ? null : $this;
        if ($newFacturation !== $reglement->getFacturation()) {
            $reglement->setFacturation($newFacturation);
        }

        return $this;
    }

    public function getFacturation(): ?Facturation
    {
        return $this->facturation;
    }

    public function setFacturation(?Facturation $facturation): self
    {
        $this->facturation = $facturation;

        return $this;
    }
}
