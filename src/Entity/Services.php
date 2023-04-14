<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
class Services
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $mtCmd = null;

    #[ORM\Column]
    private ?float $MontantM = null;

    #[ORM\ManyToOne(inversedBy: 'Ctype')]
    private ?Category $category = null;

    #[ORM\ManyToMany(targetEntity: Dossiers::class, mappedBy: 'services')]
    private Collection $dossiers;

    public function __construct()
    {
        $this->dossiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMtCmd(): ?float
    {
        return $this->mtCmd;
    }

    public function setMtCmd(float $mtCmd): self
    {
        $this->mtCmd = $mtCmd;

        return $this;
    }

    public function getMontantM(): ?float
    {
        return $this->MontantM;
    }

    public function setMontantM(float $MontantM): self
    {
        $this->MontantM = $MontantM;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Dossiers>
     */
    public function getDossiers(): Collection
    {
        return $this->dossiers;
    }

    public function addDossier(Dossiers $dossier): self
    {
        if (!$this->dossiers->contains($dossier)) {
            $this->dossiers->add($dossier);
            $dossier->addService($this);
        }

        return $this;
    }

    public function removeDossier(Dossiers $dossier): self
    {
        if ($this->dossiers->removeElement($dossier)) {
            $dossier->removeService($this);
        }

        return $this;
    }
}
