<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Services::class)]
    private Collection $Ctype;

    public function __construct()
    {
        $this->Ctype = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Services>
     */
    public function getCtype(): Collection
    {
        return $this->Ctype;
    }

    public function addCtype(Services $ctype): self
    {
        if (!$this->Ctype->contains($ctype)) {
            $this->Ctype->add($ctype);
            $ctype->setCategory($this);
        }

        return $this;
    }

    public function removeCtype(Services $ctype): self
    {
        if ($this->Ctype->removeElement($ctype)) {
            // set the owning side to null (unless already changed)
            if ($ctype->getCategory() === $this) {
                $ctype->setCategory(null);
            }
        }

        return $this;
    }
}
