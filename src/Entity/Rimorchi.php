<?php

namespace App\Entity;

use App\Repository\RimorchiRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RimorchiRepository::class)
 */
class Rimorchi
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Filiari::class, inversedBy="rimorchis")
     */
    private $filiare;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $codiceMezzo;

    /**
     * @ORM\ManyToOne(targetEntity=TipoMezzi::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipoMezzo;

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
    private $nAssi;

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

    public function getTipoMezzo(): ?TipoMezzi
    {
        return $this->tipoMezzo;
    }

    public function setTipoMezzo(?TipoMezzi $tipoMezzo): self
    {
        $this->tipoMezzo = $tipoMezzo;

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

    public function getNAssi(): ?int
    {
        return $this->nAssi;
    }

    public function setNAssi(int $nAssi): self
    {
        $this->nAssi = $nAssi;

        return $this;
    }
}
