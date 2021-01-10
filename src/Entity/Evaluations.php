<?php

namespace App\Entity;

use App\Repository\EvaluationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvaluationsRepository::class)
 */
class Evaluations
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
    private $titre;

    /**
     * @ORM\Column(type="integer")
     */
    private $Score;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="Evaluationsobjet")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

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
     * @ORM\Column(type="string",  nullable=true, length=255)
     * 
     */
    private $patient;

    /**
     * @ORM\OneToMany(targetEntity=Patient::class, mappedBy="jeux")
     */
    private $patientrelation;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
        $this->patientrelation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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



    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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

    /**
     * @return Collection|Patient[]
     */
    public function getPatientrelation(): Collection
    {
        return $this->patientrelation;
    }

    public function addPatientrelation(Patient $patientrelation): self
    {
        if (!$this->patientrelation->contains($patientrelation)) {
            $this->patientrelation[] = $patientrelation;
            $patientrelation->setEvaluations($this);
        }

        return $this;
    }

    public function removePatientrelation(Patient $patientrelation): self
    {
        if ($this->patientrelation->removeElement($patientrelation)) {
            // set the owning side to null (unless already changed)
            if ($patientrelation->getEvaluations() === $this) {
                $patientrelation->setEvaluations(null);
            }
        }

        return $this;
    }
}