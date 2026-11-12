<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
#[ORM\Table(name: 'tbl_image')]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $path = null;

    /**
     * @var Collection<int, Credit>
     */
    #[ORM\ManyToMany(targetEntity: Credit::class, inversedBy: 'images')]
    private Collection $credits;

    /**
     * @var Collection<int, SlideShow>
     */
    #[ORM\OneToMany(targetEntity: SlideShow::class, mappedBy: 'image')]
    private Collection $slideShows;

    /**
     * @var Collection<int, Slide>
     */
    #[ORM\ManyToMany(targetEntity: Slide::class, mappedBy: 'image')]
    private Collection $slides;

    public function __construct()
    {
        $this->credits = new ArrayCollection();
        $this->slideShows = new ArrayCollection();
        $this->slides = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return Collection<int, Credit>
     */
    public function getCredits(): Collection
    {
        return $this->credits;
    }

    public function addCredit(Credit $credit): static
    {
        if (!$this->credits->contains($credit)) {
            $this->credits->add($credit);
        }

        return $this;
    }

    public function removeCredit(Credit $credit): static
    {
        $this->credits->removeElement($credit);

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
            $slideShow->setImage($this);
        }

        return $this;
    }

    public function removeSlideShow(SlideShow $slideShow): static
    {
        if ($this->slideShows->removeElement($slideShow)) {
            // set the owning side to null (unless already changed)
            if ($slideShow->getImage() === $this) {
                $slideShow->setImage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Slide>
     */
    public function getSlides(): Collection
    {
        return $this->slides;
    }

    public function addSlide(Slide $slide): static
    {
        if (!$this->slides->contains($slide)) {
            $this->slides->add($slide);
            $slide->addImage($this);
        }

        return $this;
    }

    public function removeSlide(Slide $slide): static
    {
        if ($this->slides->removeElement($slide)) {
            $slide->removeImage($this);
        }

        return $this;
    }
}
