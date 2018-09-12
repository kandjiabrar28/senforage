<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AgentRepository")
 */
class Agent
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $prenomagent;

    /**
     * @ORM\Column(type="string", length=35)
     */
    private $nomagent;

    /**
     * @ORM\Column(type="string", length=14)
     */
    private $matricule;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $telephone;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Compteur", inversedBy="agents")
     */
    private $compteurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Consommation", mappedBy="agent")
     */
    private $consommations;

    public function __construct()
    {
        $this->compteurs = new ArrayCollection();
        $this->consommations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenomagent(): ?string
    {
        return $this->prenomagent;
    }

    public function setPrenomagent(string $prenomagent): self
    {
        $this->prenomagent = $prenomagent;

        return $this;
    }

    public function getNomagent(): ?string
    {
        return $this->nomagent;
    }

    public function setNomagent(string $nomagent): self
    {
        $this->nomagent = $nomagent;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection|Compteur[]
     */
    public function getCompteurs(): Collection
    {
        return $this->compteurs;
    }

    public function addCompteur(Compteur $compteur): self
    {
        if (!$this->compteurs->contains($compteur)) {
            $this->compteurs[] = $compteur;
        }

        return $this;
    }

    public function removeCompteur(Compteur $compteur): self
    {
        if ($this->compteurs->contains($compteur)) {
            $this->compteurs->removeElement($compteur);
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
            $consommation->setAgent($this);
        }

        return $this;
    }

    public function removeConsommation(Consommation $consommation): self
    {
        if ($this->consommations->contains($consommation)) {
            $this->consommations->removeElement($consommation);
            // set the owning side to null (unless already changed)
            if ($consommation->getAgent() === $this) {
                $consommation->setAgent(null);
            }
        }

        return $this;
    }
}
