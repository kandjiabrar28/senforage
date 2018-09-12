<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FacturationRepository")
 */
class Facturation
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
    private $datefacturation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datelimpaiement;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Consommation", inversedBy="facturation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $consommation;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Reglement", mappedBy="facturation", cascade={"persist", "remove"})
     */
    private $reglement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatefacturation(): ?\DateTimeInterface
    {
        return $this->datefacturation;
    }

    public function setDatefacturation(\DateTimeInterface $datefacturation): self
    {
        $this->datefacturation = $datefacturation;

        return $this;
    }

    public function getDatelimpaiement(): ?\DateTimeInterface
    {
        return $this->datelimpaiement;
    }

    public function setDatelimpaiement(\DateTimeInterface $datelimpaiement): self
    {
        $this->datelimpaiement = $datelimpaiement;

        return $this;
    }

    public function getConsommation(): ?Consommation
    {
        return $this->consommation;
    }

    public function setConsommation(Consommation $consommation): self
    {
        $this->consommation = $consommation;

        return $this;
    }

    public function getReglement(): ?Reglement
    {
        return $this->reglement;
    }

    public function setReglement(?Reglement $reglement): self
    {
        $this->reglement = $reglement;

        // set (or unset) the owning side of the relation if necessary
        $newFacturation = $reglement === null ? null : $this;
        if ($newFacturation !== $reglement->getFacturation()) {
            $reglement->setFacturation($newFacturation);
        }

        return $this;
    }
}
