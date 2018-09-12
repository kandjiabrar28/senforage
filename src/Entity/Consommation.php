<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConsommationRepository")
 */
class Consommation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nouvelindex;

    /**
     * @ORM\Column(type="integer")
     */
    private $ancienindex;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datereleve;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Facturation", mappedBy="consommation", cascade={"persist", "remove"})
     */
    private $facturation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Agent", inversedBy="consommations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agent;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Compteur", inversedBy="consommations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNouvelindex(): ?int
    {
        return $this->nouvelindex;
    }

    public function setNouvelindex(int $nouvelindex): self
    {
        $this->nouvelindex = $nouvelindex;

        return $this;
    }

    public function getAncienindex(): ?int
    {
        return $this->ancienindex;
    }

    public function setAncienindex(int $ancienindex): self
    {
        $this->ancienindex = $ancienindex;

        return $this;
    }

    public function getDatereleve(): ?\DateTimeInterface
    {
        return $this->datereleve;
    }

    public function setDatereleve(\DateTimeInterface $datereleve): self
    {
        $this->datereleve = $datereleve;

        return $this;
    }

    public function getFacturation(): ?Facturation
    {
        return $this->facturation;
    }

    public function setFacturation(Facturation $facturation): self
    {
        $this->facturation = $facturation;

        // set the owning side of the relation if necessary
        if ($this !== $facturation->getConsommation()) {
            $facturation->setConsommation($this);
        }

        return $this;
    }

    public function getAgent(): ?Agent
    {
        return $this->agent;
    }

    public function setAgent(?Agent $agent): self
    {
        $this->agent = $agent;

        return $this;
    }

    public function getCompteur(): ?Compteur
    {
        return $this->compteur;
    }

    public function setCompteur(?Compteur $compteur): self
    {
        $this->compteur = $compteur;

        return $this;
    }
}
