<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'tbl_theme')]
#[ORM\Entity(repositoryClass: ThemeRepository::class)]
class Theme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $step = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    /**
     * @var Collection<int, SlideShow>
     */
    #[ORM\OneToMany(targetEntity: SlideShow::class, mappedBy: 'Theme')]
    private Collection $slideShows;

    public function __construct()
    {
        $this->slideShows = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getStep(): ?int
    {
        return $this->step;
    }

    public function setStep(int $step): static
    {
        $this->step = $step;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, SlideShow>
     */
    public function getSlideShows(): Collection
    {
        return $this->slideShows;
    }

    public function addSlideShow(SlideShow $slideShow): static
    {
        if (!$this->slideShows->contains($slideShow)) {
            $this->slideShows->add($slideShow);
            $slideShow->setTheme($this);
        }

        return $this;
    }

    public function removeSlideShow(SlideShow $slideShow): static
    {
        if ($this->slideShows->removeElement($slideShow)) {
            // set the owning side to null (unless already changed)
            if ($slideShow->getTheme() === $this) {
                $slideShow->setTheme(null);
            }
        }

        return $this;
    }
}
