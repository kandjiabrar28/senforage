<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VillageRepository")
 */
class Village
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
    private $nomvillage;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $commune;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\client", mappedBy="village")
     */
    private $clients;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Forage", mappedBy="village")
     */
    private $forages;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Chefvillage", mappedBy="village", cascade={"persist", "remove"})
     */
    private $chefvillage;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
        $this->forages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomvillage(): ?string
    {
        return $this->nomvillage;
    }

    public function setNomvillage(string $nomvillage): self
    {
        $this->nomvillage = $nomvillage;

        return $this;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * @return Collection|client[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(client $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
            $client->setVillage($this);
        }

        return $this;
    }

    public function removeClient(client $client): self
    {
        if ($this->clients->contains($client)) {
            $this->clients->removeElement($client);
            // set the owning side to null (unless already changed)
            if ($client->getVillage() === $this) {
                $client->setVillage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Forage[]
     */
    public function getForages(): Collection
    {
        return $this->forages;
    }

    public function addForage(Forage $forage): self
    {
        if (!$this->forages->contains($forage)) {
            $this->forages[] = $forage;
            $forage->setVillage($this);
        }

        return $this;
    }

    public function removeForage(Forage $forage): self
    {
        if ($this->forages->contains($forage)) {
            $this->forages->removeElement($forage);
            // set the owning side to null (unless already changed)
            if ($forage->getVillage() === $this) {
                $forage->setVillage(null);
            }
        }

        return $this;
    }

    public function getChefvillage(): ?Chefvillage
    {
        return $this->chefvillage;
    }

    public function setChefvillage(Chefvillage $chefvillage): self
    {
        $this->chefvillage = $chefvillage;

        // set the owning side of the relation if necessary
        if ($this !== $chefvillage->getVillage()) {
            $chefvillage->setVillage($this);
        }

        return $this;
    }
}
