<?php

namespace App\Entity;

use App\Repository\SediRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SediRepository::class)
 */
class Sedi
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
    private $codice_sede;

    /**
     * @ORM\Column(type="integer")
     */
    private $cap;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $citta;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $prov;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $indirizzo;

    /**
     * @ORM\Column(type="integer")
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Veicoli::class, mappedBy="sede")
     */
    private $veicolis;

    public function __construct()
    {
        $this->veicolis = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->codice_sede;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodiceSede(): ?string
    {
        return $this->codice_sede;
    }

    public function setCodiceSede(string $codice_sede): self
    {
        $this->codice_sede = $codice_sede;

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

    public function getTelefono(): ?int
    {
        return $this->telefono;
    }

    public function setTelefono(int $telefono): self
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
     * @return Collection<int, Veicoli>
     */
    public function getVeicolis(): Collection
    {
        return $this->veicolis;
    }

    public function addVeicoli(Veicoli $veicoli): self
    {
        if (!$this->veicolis->contains($veicoli)) {
            $this->veicolis[] = $veicoli;
            $veicoli->setIdSede($this);
        }

        return $this;
    }

    public function removeVeicoli(Veicoli $veicoli): self
    {
        if ($this->veicolis->removeElement($veicoli)) {
            // set the owning side to null (unless already changed)
            if ($veicoli->getIdSede() === $this) {
                $veicoli->setIdSede(null);
            }
        }

        return $this;
    }

}
