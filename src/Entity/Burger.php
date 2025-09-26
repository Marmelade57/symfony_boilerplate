<?php

namespace App\Entity;

use App\Repository\BurgerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BurgerRepository::class)]
class Burger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(targetEntity: Image::class)]
    private $image;
    #[ORM\ManyToOne(targetEntity: Pain::class)]
    private $pain;

    #[ORM\ManyToMany(targetEntity: Oignon::class)]
    private $oignon;

    #[ORM\ManyToMany(targetEntity: Sauce::class)]
    private $sauce;

    #[ORM\ManyToOne(targetEntity: Commentaire::class)]
    private $commentaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
