<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read']],
)]

class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['read', 'write'])]
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[Groups(['read', 'write'])]
    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[Groups(['read', 'write'])]
    #[ORM\Column(length: 255)]
    private ?string $first_name = null;

    #[Groups(['read', 'write'])]
    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[Groups(['read', 'write'])]
    #[ORM\Column(length: 255)]
    private ?string $country = null;
    
    #[Groups(['read', 'write'])]
    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[Groups(['read', 'write'])]
    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\ManyToMany(targetEntity: Verse::class, inversedBy: 'users')]
    private Collection $verse;

    public function __construct()
    {
        $this->verse = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection<int, Verse>
     */
    public function getVerse(): Collection
    {
        return $this->verse;
    }

    public function addVerse(Verse $verse): self
    {
        if (!$this->verse->contains($verse)) {
            $this->verse->add($verse);
        }

        return $this;
    }

    public function removeVerse(Verse $verse): self
    {
        $this->verse->removeElement($verse);

        return $this;
    }
}
