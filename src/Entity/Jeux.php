<?php

namespace App\Entity;

use App\Repository\JeuxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JeuxRepository::class)
 */
class Jeux
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="float")
     */
    private $Score;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="jeuxes")
     */
    private $relation;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getScore(): ?float
    {
        return $this->Score;
    }

    public function setScore(float $Score): self
    {
        $this->Score = $Score;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(User $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
        }

        return $this;
    }

    public function removeRelation(User $relation): self
    {
        $this->relation->removeElement($relation);

        return $this;
    }
}
