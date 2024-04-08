<?php

namespace App\Entity;

use App\Repository\FiliariRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FiliariRepository::class)
 */
class Filiari
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $codiceFiliare;

    /**
     * @ORM\Column(type="integer")
     */
    private $cap;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $citta;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $prov;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $indirizzo;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Rimorchi::class, mappedBy="filiare")
     */
    private $rimorchis;

    /**
     * @ORM\OneToMany(targetEntity=Mezzi::class, mappedBy="filiare")
     */
    private $mezzis;

    public function __construct()
    {
        $this->rimorchis = new ArrayCollection();
        $this->mezzis = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->codiceFiliare;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodiceFiliare(): ?string
    {
        return $this->codiceFiliare;
    }

    public function setCodiceFiliare(string $codiceFiliare): self
    {
        $this->codiceFiliare = $codiceFiliare;

        return $this;
    }

    public function getCap(): ?int
    {
        return $this->cap;
    }

    public function setCap(int $cap): self
    {
        $this->cap = $cap;

        return $this;
    }

    public function getCitta(): ?string
    {
        return $this->citta;
    }

    public function setCitta(string $citta): self
    {
        $this->citta = $citta;

        return $this;
    }

    public function getProv(): ?string
    {
        return $this->prov;
    }

    public function setProv(string $prov): self
    {
        $this->prov = $prov;

        return $this;
    }

    public function getIndirizzo(): ?string
    {
        return $this->indirizzo;
    }

    public function setIndirizzo(string $indirizzo): self
    {
        $this->indirizzo = $indirizzo;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

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

    /**
     * @return Collection<int, Rimorchi>
     */
    public function getRimorchis(): Collection
    {
        return $this->rimorchis;
    }

    public function addRimorchi(Rimorchi $rimorchi): self
    {
        if (!$this->rimorchis->contains($rimorchi)) {
            $this->rimorchis[] = $rimorchi;
            $rimorchi->setFiliare($this);
        }

        return $this;
    }

    public function removeRimorchi(Rimorchi $rimorchi): self
    {
        if ($this->rimorchis->removeElement($rimorchi)) {
            // set the owning side to null (unless already changed)
            if ($rimorchi->getFiliare() === $this) {
                $rimorchi->setFiliare(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Mezzi>
     */
    public function getMezzis(): Collection
    {
        return $this->mezzis;
    }

    public function addMezzi(Mezzi $mezzi): self
    {
        if (!$this->mezzis->contains($mezzi)) {
            $this->mezzis[] = $mezzi;
            $mezzi->setFiliare($this);
        }

        return $this;
    }

    public function removeMezzi(Mezzi $mezzi): self
    {
        if ($this->mezzis->removeElement($mezzi)) {
            // set the owning side to null (unless already changed)
            if ($mezzi->getFiliare() === $this) {
                $mezzi->setFiliare(null);
            }
        }

        return $this;
    }
}
