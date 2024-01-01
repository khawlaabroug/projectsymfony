<?php

namespace App\Entity;

use App\Repository\ChercheurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChercheurRepository::class)]
class Chercheur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 50)]
    private ?string $motDePasse = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\ManyToOne(inversedBy: 'chercheur')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipement $equipement = null;

    #[ORM\ManyToOne(inversedBy: 'chercheurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Projet $projet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): static
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getEquipement(): ?Equipement
    {
        return $this->equipement;
    }

    public function setEquipement(?Equipement $equipement): static
    {
        $this->equipement = $equipement;

        return $this;
    }

    public function getProjet(): ?projet
    {
        return $this->projet;
    }

    public function setProjet(?projet $projet): static
    {
        $this->projet = $projet;

        return $this;
    }
}
