<?php

namespace App\Entity;

use App\Repository\NewlettersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewlettersRepository::class)]
class Newletters
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 30)]
    private $ufr;

    #[ORM\Column(type: 'string', length: 30)]
    private $departement;

    #[ORM\Column(type: 'string', length: 15)]
    private $niveau;

    #[ORM\Column(type: 'string', length: 15)]
    private $status;

    #[ORM\OneToOne(inversedBy: 'newletters', targetEntity: Publiants::class, cascade: ['persist', 'remove'])]
    private $publiants;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUfr(): ?string
    {
        return $this->ufr;
    }

    public function setUfr(string $ufr): self
    {
        $this->ufr = $ufr;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getPubliants(): ?Publiants
    {
        return $this->publiants;
    }

    public function setPubliants(?Publiants $publiants): self
    {
        $this->publiants = $publiants;

        return $this;
    }
}
