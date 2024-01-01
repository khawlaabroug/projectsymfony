<?php

namespace App\Entity;

use App\Repository\PublicationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PublicationRepository::class)]
class Publication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 50)]
    private ?string $auteur = null;

    #[ORM\Column(length: 100)]
    private ?string $motsCles = null;

    #[ORM\ManyToOne(inversedBy: 'publications')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Projet $projet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getMotsCles(): ?string
    {
        return $this->motsCles;
    }

    public function setMotsCles(string $motsCles): static
    {
        $this->motsCles = $motsCles;

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
