<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ApiResource(normalizationContext:['groups' => ['read']],
itemOperations: ["get", "patch"=>["security"=>"is_granted('ROLE_ADMIN') or object == user"]]  
)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $rue = null;
    #[Groups(["read"])]
    #[ORM\Column(length: 255)]
    private ?string $ville = null;
    #[Groups(["read"])]
    #[ORM\Column]
    private ?int $codepostal = null;
 #[Groups(["read"])]
    #[ORM\ManyToOne(inversedBy: 'secteur')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SecteurActivite $secteur = null;

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

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodepostal(): ?int
    {
        return $this->codepostal;
    }

    public function setCodepostal(int $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getSecteur(): ?SecteurActivite
    {
        return $this->secteur;
    }

    public function setSecteur(?SecteurActivite $secteur): self
    {
        $this->secteur = $secteur;

        return $this;
    }
}
