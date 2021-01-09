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
     * @ORM\Column(type="integer")
     */
    private $Score;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="Jeuxobjet")
     * @ORM\JoinColumn(nullable=true)
     */
    private $Userid;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_prenom_patient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $patient;

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



    public function getUserid(): ?User
    {
        return $this->Userid;
    }

    public function setUserid(?User $Userid): self
    {
        $this->Userid = $Userid;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getNomPrenomPatient(): ?string
    {
        return $this->nom_prenom_patient;
    }

    public function setNomPrenomPatient(string $nom_prenom_patient): self
    {
        $this->nom_prenom_patient = $nom_prenom_patient;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }


    public function setAge(string $age): self
    {
        $this->age = $age;

        return $this;
    }
    public function __toString()
    {
        return $this->Userid;
    }

    public function getPatient(): ?string
    {
        return $this->patient;
    }

    public function setPatient(string $patient): self
    {
        $this->patient = $patient;

        return $this;
    }
}
