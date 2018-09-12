<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ForageRepository")
 */
class Forage
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
    private $nomforage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Village", inversedBy="forages")
     */
    private $village;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomforage(): ?string
    {
        return $this->nomforage;
    }

    public function setNomforage(string $nomforage): self
    {
        $this->nomforage = $nomforage;

        return $this;
    }

    public function getVillage(): ?Village
    {
        return $this->village;
    }

    public function setVillage(?Village $village): self
    {
        $this->village = $village;

        return $this;
    }
}
