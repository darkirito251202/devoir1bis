<?php

namespace App\Entity;

use App\Repository\SecteurActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: SecteurActiviteRepository::class)]
#[ApiResource(normalizationContext:['groups' => ['read']])]
class SecteurActivite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $intitule = null;

    #[ORM\OneToMany(mappedBy: 'secteur', targetEntity: Client::class)]
    private Collection $secteur;

    public function __construct()
    {
        $this->secteur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(?string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getSecteur(): Collection
    {
        return $this->secteur;
    }

    public function addSecteur(Client $secteur): self
    {
        if (!$this->secteur->contains($secteur)) {
            $this->secteur->add($secteur);
            $secteur->setSecteur($this);
        }

        return $this;
    }

    public function removeSecteur(Client $secteur): self
    {
        if ($this->secteur->removeElement($secteur)) {
            // set the owning side to null (unless already changed)
            if ($secteur->getSecteur() === $this) {
                $secteur->setSecteur(null);
            }
        }

        return $this;
    }
}
