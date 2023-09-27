<?php

namespace App\Entity;

use App\Repository\BorneRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BorneRepository::class)]
class Borne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateMiseEnService = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDernièreRevision = null;

    #[ORM\ManyToOne(inversedBy: 'bornes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Station $idStation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateMiseEnService(): ?\DateTimeInterface
    {
        return $this->dateMiseEnService;
    }

    public function setDateMiseEnService(\DateTimeInterface $dateMiseEnService): static
    {
        $this->dateMiseEnService = $dateMiseEnService;

        return $this;
    }

    public function getDateDernièreRevision(): ?\DateTimeInterface
    {
        return $this->dateDernièreRevision;
    }

    public function setDateDernièreRevision(\DateTimeInterface $dateDernièreRevision): static
    {
        $this->dateDernièreRevision = $dateDernièreRevision;

        return $this;
    }

    public function getIdStation(): ?Station
    {
        return $this->idStation;
    }

    public function setIdStation(?Station $idStation): static
    {
        $this->idStation = $idStation;

        return $this;
    }
}
