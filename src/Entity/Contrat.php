<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratRepository::class)]
class Contrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateContrat = null;

    #[ORM\Column(length: 255)]
    private ?string $noImmatriculation = null;

    #[ORM\ManyToOne(inversedBy: 'contrats')]
    private ?Usager $idUsager = null;

    #[ORM\ManyToOne(inversedBy: 'contrats')]
    private ?ModeleBatterie $idModeleBatterie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateContrat(): ?\DateTimeInterface
    {
        return $this->dateContrat;
    }

    public function setDateContrat(\DateTimeInterface $dateContrat): static
    {
        $this->dateContrat = $dateContrat;

        return $this;
    }

    public function getNoImmatriculation(): ?string
    {
        return $this->noImmatriculation;
    }

    public function setNoImmatriculation(string $noImmatriculation): static
    {
        $this->noImmatriculation = $noImmatriculation;

        return $this;
    }

    public function getIdUsager(): ?Usager
    {
        return $this->idUsager;
    }

    public function setIdUsager(?Usager $idUsager): static
    {
        $this->idUsager = $idUsager;

        return $this;
    }

    public function getIdModeleBatterie(): ?ModeleBatterie
    {
        return $this->idModeleBatterie;
    }

    public function setIdModeleBatterie(?ModeleBatterie $idModeleBatterie): static
    {
        $this->idModeleBatterie = $idModeleBatterie;

        return $this;
    }
}
