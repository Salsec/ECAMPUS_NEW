<?php

namespace App\Entity;

use App\Repository\PubliantsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PubliantsRepository::class)]
class Publiants
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 30)]
    private $nom;

    #[ORM\Column(type: 'string', length: 30)]
    private $prenom;

    #[ORM\Column(type: 'string', length: 30)]
    private $email;

    #[ORM\Column(type: 'string', length: 15)]
    private $tel;

    #[ORM\Column(type: 'string', length: 30)]
    private $mdp;

    #[ORM\Column(type: 'string', length: 15)]
    private $profil;

    #[ORM\OneToOne(mappedBy: 'publiants', targetEntity: Newletters::class, cascade: ['persist', 'remove'])]
    private $newletters;

    #[ORM\OneToMany(mappedBy: 'publiants', targetEntity: News::class)]
    private $news;

    public function __construct()
    {
        $this->news = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getProfil(): ?string
    {
        return $this->profil;
    }

    public function setProfil(string $profil): self
    {
        $this->profil = $profil;

        return $this;
    }

    public function getNewletters(): ?Newletters
    {
        return $this->newletters;
    }

    public function setNewletters(?Newletters $newletters): self
    {
        // unset the owning side of the relation if necessary
        if ($newletters === null && $this->newletters !== null) {
            $this->newletters->setPubliants(null);
        }

        // set the owning side of the relation if necessary
        if ($newletters !== null && $newletters->getPubliants() !== $this) {
            $newletters->setPubliants($this);
        }

        $this->newletters = $newletters;

        return $this;
    }

    /**
     * @return Collection<int, News>
     */
    public function getNews(): Collection
    {
        return $this->news;
    }

    public function addNews(News $news): self
    {
        if (!$this->news->contains($news)) {
            $this->news[] = $news;
            $news->setPubliants($this);
        }

        return $this;
    }

    public function removeNews(News $news): self
    {
        if ($this->news->removeElement($news)) {
            // set the owning side to null (unless already changed)
            if ($news->getPubliants() === $this) {
                $news->setPubliants(null);
            }
        }

        return $this;
    }

}
