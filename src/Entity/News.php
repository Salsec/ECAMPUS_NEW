<?php

namespace App\Entity;

use App\Repository\NewsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewsRepository::class)]
class News
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $formation_destinataire;

    #[ORM\Column(type: 'date')]
    private $date_redactionn;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date_moderation;

    #[ORM\Column(type: 'string', length: 30)]
    private $titre_avant_moderation;

    #[ORM\Column(type: 'text')]
    private $texte_avant_moderation;

    #[ORM\Column(type: 'string', length: 30, nullable: true)]
    private $titre_apres_moderation;

    #[ORM\Column(type: 'text', nullable: true)]
    private $texte_apres_moderation;

    #[ORM\Column(type: 'string', length: 30, nullable: true)]
    private $accord_moderation;

    #[ORM\Column(type: 'date')]
    private $date_souhaite_debut_publication;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date_effective_debut_publication;

    #[ORM\Column(type: 'date')]
    private $date_souhaite_fin_publication;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date_effective_fin_publication;

    #[ORM\Column(type: 'text', nullable: true)]
    private $motivation_invalidation;

    #[ORM\Column(type: 'text', nullable: true)]
    private $importance_news;

    #[ORM\ManyToOne(targetEntity: Publiants::class, inversedBy: 'news')]
    private $publiants;

    #[ORM\ManyToOne(targetEntity: Moderateurs::class, inversedBy: 'news')]
    private $moderateurs;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormationDestinataire(): ?string
    {
        return $this->formation_destinataire;
    }

    public function setFormationDestinataire(string $formation_destinataire): self
    {
        $this->formation_destinataire = $formation_destinataire;

        return $this;
    }

    public function getDateRedactionn(): ?\DateTimeInterface
    {
        return $this->date_redactionn;
    }

    public function setDateRedactionn(\DateTimeInterface $date_redactionn): self
    {
        $this->date_redactionn = $date_redactionn;

        return $this;
    }

    public function getDateModeration(): ?\DateTimeInterface
    {
        return $this->date_moderation;
    }

    public function setDateModeration(?\DateTimeInterface $date_moderation): self
    {
        $this->date_moderation = $date_moderation;

        return $this;
    }

    public function getTitreAvantModeration(): ?string
    {
        return $this->titre_avant_moderation;
    }

    public function setTitreAvantModeration(string $titre_avant_moderation): self
    {
        $this->titre_avant_moderation = $titre_avant_moderation;

        return $this;
    }

    public function getTexteAvantModeration(): ?string
    {
        return $this->texte_avant_moderation;
    }

    public function setTexteAvantModeration(string $texte_avant_moderation): self
    {
        $this->texte_avant_moderation = $texte_avant_moderation;

        return $this;
    }

    public function getTitreApresModeration(): ?string
    {
        return $this->titre_apres_moderation;
    }

    public function setTitreApresModeration(?string $titre_apres_moderation): self
    {
        $this->titre_apres_moderation = $titre_apres_moderation;

        return $this;
    }

    public function getTexteApresModeration(): ?string
    {
        return $this->texte_apres_moderation;
    }

    public function setTexteApresModeration(?string $texte_apres_moderation): self
    {
        $this->texte_apres_moderation = $texte_apres_moderation;

        return $this;
    }

    public function getAccordModeration(): ?string
    {
        return $this->accord_moderation;
    }

    public function setAccordModeration(?string $accord_moderation): self
    {
        $this->accord_moderation = $accord_moderation;

        return $this;
    }

    public function getDateSouhaiteDebutPublication(): ?\DateTimeInterface
    {
        return $this->date_souhaite_debut_publication;
    }

    public function setDateSouhaiteDebutPublication(\DateTimeInterface $date_souhaite_debut_publication): self
    {
        $this->date_souhaite_debut_publication = $date_souhaite_debut_publication;

        return $this;
    }

    public function getDateEffectiveDebutPublication(): ?\DateTimeInterface
    {
        return $this->date_effective_debut_publication;
    }

    public function setDateEffectiveDebutPublication(?\DateTimeInterface $date_effective_debut_publication): self
    {
        $this->date_effective_debut_publication = $date_effective_debut_publication;

        return $this;
    }

    public function getDateSouhaiteFinPublication(): ?\DateTimeInterface
    {
        return $this->date_souhaite_fin_publication;
    }

    public function setDateSouhaiteFinPublication(\DateTimeInterface $date_souhaite_fin_publication): self
    {
        $this->date_souhaite_fin_publication = $date_souhaite_fin_publication;

        return $this;
    }

    public function getDateEffectiveFinPublication(): ?\DateTimeInterface
    {
        return $this->date_effective_fin_publication;
    }

    public function setDateEffectiveFinPublication(?\DateTimeInterface $date_effective_fin_publication): self
    {
        $this->date_effective_fin_publication = $date_effective_fin_publication;

        return $this;
    }

    public function getMotivationInvalidation(): ?string
    {
        return $this->motivation_invalidation;
    }

    public function setMotivationInvalidation(?string $motivation_invalidation): self
    {
        $this->motivation_invalidation = $motivation_invalidation;

        return $this;
    }

    public function getImportanceNews(): ?string
    {
        return $this->importance_news;
    }

    public function setImportanceNews(?string $importance_news): self
    {
        $this->importance_news = $importance_news;

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

    public function getModerateurs(): ?Moderateurs
    {
        return $this->moderateurs;
    }

    public function setModerateurs(?Moderateurs $moderateurs): self
    {
        $this->moderateurs = $moderateurs;

        return $this;
    }

}
