<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompteurRepository")
 */
class Compteur
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
    private $numero;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etat;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Abonnement", inversedBy="compteur", cascade={"persist", "remove"})
     */
    private $abonnement;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Agent", mappedBy="compteurs")
     */
    private $agents;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Consommation", mappedBy="compteur")
     */
    private $consommations;

    public function __construct()
    {
        $this->agents = new ArrayCollection();
        $this->consommations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getAbonnement(): ?Abonnement
    {
        return $this->abonnement;
    }

    public function setAbonnement(?Abonnement $abonnement): self
    {
        $this->abonnement = $abonnement;

        return $this;
    }

    /**
     * @return Collection|Agent[]
     */
    public function getAgents(): Collection
    {
        return $this->agents;
    }

    public function addAgent(Agent $agent): self
    {
        if (!$this->agents->contains($agent)) {
            $this->agents[] = $agent;
            $agent->addCompteur($this);
        }

        return $this;
    }

    public function removeAgent(Agent $agent): self
    {
        if ($this->agents->contains($agent)) {
            $this->agents->removeElement($agent);
            $agent->removeCompteur($this);
        }

        return $this;
    }

    /**
     * @return Collection|Consommation[]
     */
    public function getConsommations(): Collection
    {
        return $this->consommations;
    }

    public function addConsommation(Consommation $consommation): self
    {
        if (!$this->consommations->contains($consommation)) {
            $this->consommations[] = $consommation;
            $consommation->setCompteur($this);
        }

        return $this;
    }

    public function removeConsommation(Consommation $consommation): self
    {
        if ($this->consommations->contains($consommation)) {
            $this->consommations->removeElement($consommation);
            // set the owning side to null (unless already changed)
            if ($consommation->getCompteur() === $this) {
                $consommation->setCompteur(null);
            }
        }

        return $this;
    }
}
