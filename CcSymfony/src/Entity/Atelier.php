<?php

namespace App\Entity;
use App\Entity\User;
use App\Repository\AtelierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtelierRepository::class)]
class Atelier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type:"text")]
    private ?string $description = null;

    #[ORM\Column(type:'text',nullable: true)]
    private $descriptionHtml;
    public function getId(): ?int
    {
        return $this->id;
    }


    #[ORM\ManyToOne( inversedBy: "ateliers")]
    private ?User $instructeur = null;
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
    public function getDescriptionHtml(): ?string
    {
        return $this->descriptionHtml;
    }

    public function setDescriptionHtml(?string $descriptionHtml): self
    {
        $this->descriptionHtml = $descriptionHtml;

        return $this;
    }
    public function getInstructeur(): ?User
    {
        return $this->instructeur;
    }
    public function setInstructeur(?User $instructeur): self
    {
        $this->instructeur = $instructeur;

        return $this;
    }
}
