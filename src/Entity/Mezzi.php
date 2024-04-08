<?php

namespace App\Entity;

use App\Repository\MezziRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MezziRepository::class)
 */
class Mezzi
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Filiari::class, inversedBy="mezzis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $filiare;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $codiceMezzo;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $targa;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $marca;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $modello;

    /**
     * @ORM\Column(type="date")
     */
    private $dataImm;

    /**
     * @ORM\Column(type="date")
     */
    private $dataRev;

    /**
     * @ORM\Column(type="smallint")
     */
    private $classeEmiss;

    /**
     * @ORM\Column(type="smallint")
     */
    private $nSerbatoi;

    /**
     * @ORM\ManyToMany(targetEntity=Rimorchi::class)
     */
    private $rimorchio;

    /**
     * @ORM\ManyToOne(targetEntity=TipoMezzi::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipoMezzo;

    public function __construct()
    {
        $this->rimorchio = new ArrayCollection();
    }

    /*public function __toString()
    {
        return $this->marca ." | ".$this->modello." | ".$this->targa." | ".$this->getFiliare();
    }*/

    public function __toString()
    {
        return $this->codiceMezzo."-".$this->tipoMezzo;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFiliare(): ?Filiari
    {
        return $this->filiare;
    }

    public function setFiliare(?Filiari $filiare): self
    {
        $this->filiare = $filiare;

        return $this;
    }

    public function getCodiceMezzo(): ?string
    {
        return $this->codiceMezzo;
    }

    public function setCodiceMezzo(?string $codiceMezzo): self
    {
        $this->codiceMezzo = $codiceMezzo;

        return $this;
    }

    public function getTarga(): ?string
    {
        return $this->targa;
    }

    public function setTarga(string $targa): self
    {
        $this->targa = $targa;

        return $this;
    }

    public function getMarca(): ?string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    public function getModello(): ?string
    {
        return $this->modello;
    }

    public function setModello(string $modello): self
    {
        $this->modello = $modello;

        return $this;
    }

    public function getDataImm(): ?\DateTimeInterface
    {
        return $this->dataImm;
    }

    public function setDataImm(\DateTimeInterface $dataImm): self
    {
        $this->dataImm = $dataImm;

        return $this;
    }

    public function getDataRev(): ?\DateTimeInterface
    {
        return $this->dataRev;
    }

    public function setDataRev(\DateTimeInterface $dataRev): self
    {
        $this->dataRev = $dataRev;

        return $this;
    }

    public function getClasseEmiss(): ?int
    {
        return $this->classeEmiss;
    }

    public function setClasseEmiss(int $classeEmiss): self
    {
        $this->classeEmiss = $classeEmiss;

        return $this;
    }

    public function getNSerbatoi(): ?int
    {
        return $this->nSerbatoi;
    }

    public function setNSerbatoi(int $nSerbatoi): self
    {
        $this->nSerbatoi = $nSerbatoi;

        return $this;
    }

    /**
     * @return Collection<int, Rimorchi>
     */
    public function getRimorchio(): Collection
    {
        return $this->rimorchio;
    }

    public function addRimorchio(Rimorchi $rimorchio): self
    {
        if (!$this->rimorchio->contains($rimorchio)) {
            $this->rimorchio[] = $rimorchio;
        }

        return $this;
    }

    public function removeRimorchio(Rimorchi $rimorchio): self
    {
        $this->rimorchio->removeElement($rimorchio);

        return $this;
    }

    public function getTipoMezzo(): ?TipoMezzi
    {
        return $this->tipoMezzo;
    }

    public function setTipoMezzo(?TipoMezzi $tipoMezzo): self
    {
        $this->tipoMezzo = $tipoMezzo;

        return $this;
    }
}
