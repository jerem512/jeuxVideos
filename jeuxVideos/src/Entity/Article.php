<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $descritpion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Publisher", inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $editor;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\DevellopementStudio", inversedBy="articles")
     */
    private $development_studio;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Platform", inversedBy="articles")
     */
    private $platform;

    public function __construct()
    {
        $this->development_studio = new ArrayCollection();
        $this->platform = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescritpion(): ?string
    {
        return $this->descritpion;
    }

    public function setDescritpion(string $descritpion): self
    {
        $this->descritpion = $descritpion;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getEditor(): ?Publisher
    {
        return $this->editor;
    }

    public function setEditor(?Publisher $editor): self
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * @return Collection|DevellopementStudio[]
     */
    public function getDevelopmentStudio(): Collection
    {
        return $this->development_studio;
    }

    public function addDevelopmentStudio(DevellopementStudio $developmentStudio): self
    {
        if (!$this->development_studio->contains($developmentStudio)) {
            $this->development_studio[] = $developmentStudio;
        }

        return $this;
    }

    public function removeDevelopmentStudio(DevellopementStudio $developmentStudio): self
    {
        if ($this->development_studio->contains($developmentStudio)) {
            $this->development_studio->removeElement($developmentStudio);
        }

        return $this;
    }

    /**
     * @return Collection|Platform[]
     */
    public function getPlatform(): Collection
    {
        return $this->platform;
    }

    public function addPlatform(Platform $platform): self
    {
        if (!$this->platform->contains($platform)) {
            $this->platform[] = $platform;
        }

        return $this;
    }

    public function removePlatform(Platform $platform): self
    {
        if ($this->platform->contains($platform)) {
            $this->platform->removeElement($platform);
        }

        return $this;
    }
}
