<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipementRepository::class)]
class Equipement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\Column(length: 255)]
    private ?string $disponibilite = null;

    #[ORM\ManyToOne(inversedBy: 'equipements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Projet $projet = null;

    #[ORM\OneToMany(mappedBy: 'equipement', targetEntity: Chercheur::class)]
    private Collection $chercheur;

    public function __construct()
    {
        $this->chercheur = new ArrayCollection();
    }

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

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDisponibilite(): ?string
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(string $disponibilite): static
    {
        $this->disponibilite = $disponibilite;

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

    /**
     * @return Collection<int, chercheur>
     */
    public function getChercheur(): Collection
    {
        return $this->chercheur;
    }

    public function addChercheur(chercheur $chercheur): static
    {
        if (!$this->chercheur->contains($chercheur)) {
            $this->chercheur->add($chercheur);
            $chercheur->setEquipement($this);
        }

        return $this;
    }

    public function removeChercheur(chercheur $chercheur): static
    {
        if ($this->chercheur->removeElement($chercheur)) {
            // set the owning side to null (unless already changed)
            if ($chercheur->getEquipement() === $this) {
                $chercheur->setEquipement(null);
            }
        }

        return $this;
    }
}
