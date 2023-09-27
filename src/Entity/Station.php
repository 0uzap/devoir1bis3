<?php

namespace App\Entity;

use App\Repository\StationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StationRepository::class)]
class Station
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $latitude = null;

    #[ORM\Column(length: 30)]
    private ?string $longitude = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseRue = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseVille = null;

    #[ORM\Column(length: 25)]
    private ?string $codePostal = null;

    #[ORM\OneToMany(mappedBy: 'idStation', targetEntity: Borne::class, orphanRemoval: true)]
    private Collection $bornes;

    public function __construct()
    {
        $this->bornes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getAdresseRue(): ?string
    {
        return $this->adresseRue;
    }

    public function setAdresseRue(string $adresseRue): static
    {
        $this->adresseRue = $adresseRue;

        return $this;
    }

    public function getAdresseVille(): ?string
    {
        return $this->adresseVille;
    }

    public function setAdresseVille(string $adresseVille): static
    {
        $this->adresseVille = $adresseVille;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * @return Collection<int, Borne>
     */
    public function getBornes(): Collection
    {
        return $this->bornes;
    }

    public function addBorne(Borne $borne): static
    {
        if (!$this->bornes->contains($borne)) {
            $this->bornes->add($borne);
            $borne->setIdStation($this);
        }

        return $this;
    }

    public function removeBorne(Borne $borne): static
    {
        if ($this->bornes->removeElement($borne)) {
            // set the owning side to null (unless already changed)
            if ($borne->getIdStation() === $this) {
                $borne->setIdStation(null);
            }
        }

        return $this;
    }
}
