<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParametreRepository")
 */
class Parametre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $unitevolume;

    /**
     * @ORM\Column(type="float")
     */
    private $prixunitevolume;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbjours;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnitevolume(): ?string
    {
        return $this->unitevolume;
    }

    public function setUnitevolume(string $unitevolume): self
    {
        $this->unitevolume = $unitevolume;

        return $this;
    }

    public function getPrixunitevolume(): ?float
    {
        return $this->prixunitevolume;
    }

    public function setPrixunitevolume(float $prixunitevolume): self
    {
        $this->prixunitevolume = $prixunitevolume;

        return $this;
    }

    public function getNbjours(): ?int
    {
        return $this->nbjours;
    }

    public function setNbjours(int $nbjours): self
    {
        $this->nbjours = $nbjours;

        return $this;
    }
}
