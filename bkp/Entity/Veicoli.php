<?php

namespace App\Entity;

use App\Repository\VeicoliRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VeicoliRepository::class)
 */
class Veicoli
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
    private $codice_veicolo;

    /**
     * @ORM\Column(type="integer")
    */
    private $sede_id;


    /**
     * @ORM\Column(type="string", length=45)
     */
    private $targa;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $marca;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $modello;

    /**
     * @ORM\Column(type="integer")
     */
    private $tipo;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_rimorchio;

    /**
     * @ORM\Column(type="date")
     */
    private $data_revisione;

    /**
     * @ORM\Column(type="date")
     */
    private $data_imm;

    /**
     * @ORM\Column(type="integer")
     */
    private $cavalli_vapore;

    /**
     * @ORM\Column(type="smallint")
     */
    private $classe_emiss;

    /**
     * @ORM\Column(type="smallint")
     */
    private $n_serbatoi;

    /**
     * @ORM\ManyToOne(targetEntity=Sedi::class, inversedBy="veicolis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sede;

    public function __toString()
    {
        return $this->marca ." | ".$this->modello." | ".$this->targa." | ".$this->getSedi();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function setIdVeicoli(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getCodiceVeicolo(): ?string
    {
        return $this->codice_veicolo;
    }

    public function setCodiceVeicolo(string $codice_veicolo): self
    {
        $this->codice_veicolo = $codice_veicolo;

        return $this;
    }

    public function getIdSede(): ?string
    {
        return $this->sede_id;
    }

    public function setIdSede(int $sede_id): self
    {
        $this->sede = $sede_id;

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

    public function getTipo(): ?int
    {
        return $this->tipo;
    }

    public function setTipo(int $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getIdRimorchio(): ?int
    {
        return $this->id_rimorchio;
    }

    public function setIdRimorchio(int $id_rimorchio): self
    {
        $this->id_rimorchio = $id_rimorchio;

        return $this;
    }

    public function getDataRevisione(): ?\DateTimeInterface
    {
        return $this->data_revisione;
    }

    public function setDataRevisione(\DateTimeInterface $data_revisione): self
    {
        $this->data_revisione = $data_revisione;

        return $this;
    }

    public function getDataImm(): ?\DateTimeInterface
    {
        return $this->data_imm;
    }

    public function setDataImm(\DateTimeInterface $data_imm): self
    {
        $this->data_imm = $data_imm;

        return $this;
    }

    public function getCavalliVapore(): ?int
    {
        return $this->cavalli_vapore;
    }

    public function setCavalliVapore(int $cavalli_vapore): self
    {
        $this->cavalli_vapore = $cavalli_vapore;

        return $this;
    }

    public function getClasseEmiss(): ?int
    {
        return $this->classe_emiss;
    }

    public function setClasseEmiss(int $classe_emiss): self
    {
        $this->classe_emiss = $classe_emiss;

        return $this;
    }

    public function getNSerbatoi(): ?int
    {
        return $this->n_serbatoi;
    }

    public function setNSerbatoi(int $n_serbatoi): self
    {
        $this->n_serbatoi = $n_serbatoi;

        return $this;
    }

    public function getSedi(): ?Sedi
    {
        return $this->sede;
    }

    public function setSedi(?Sedi $sedi): self
    {
        $this->sede = $sedi;

        return $this;
    }

}
